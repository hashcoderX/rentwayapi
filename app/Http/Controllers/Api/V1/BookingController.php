<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\BookingStoreRequest;
use App\Http\Requests\Api\V1\BookingUpdateRequest;
use App\Http\Resources\V1\BookingResource;
use App\Models\Vehicle_has_booking;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Bookings", description="Bookings management")
 */
class BookingController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/bookings",
     *   tags={"Bookings"},
     *   security={{"bearerAuth":{}}},
     *   summary="List bookings",
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $bookings = Vehicle_has_booking::orderByDesc('id')->paginate(15);
        return $this->success('Booking list', [
            'items' => BookingResource::collection($bookings),
            'pagination' => [
                'current_page' => $bookings->currentPage(),
                'last_page' => $bookings->lastPage(),
                'total' => $bookings->total(),
            ]
        ]);
    }

    /**
     * @OA\Get(
     *   path="/v1/bookings/{id}",
     *   tags={"Bookings"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show booking",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Vehicle_has_booking $booking)
    {
        return $this->success('Booking details', new BookingResource($booking));
    }

    /**
     * @OA\Post(
     *   path="/v1/bookings",
     *   tags={"Bookings"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create booking",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(BookingStoreRequest $request)
    {
        $data = $request->validated();

        // Overlap check: active/pending bookings for same vehicle where date ranges intersect
        $overlap = Vehicle_has_booking::query()
            ->where('vehicle_no', $data['vehicle_no'])
            ->whereIn('status', ['pending','confirmed'])
            ->where(function ($q) use ($data) {
                $q->whereBetween('book_start_date', [$data['book_start_date'], $data['return_date']])
                  ->orWhereBetween('return_date', [$data['book_start_date'], $data['return_date']])
                  ->orWhere(function ($qq) use ($data) {
                        $qq->where('book_start_date', '<=', $data['book_start_date'])
                           ->where('return_date', '>=', $data['return_date']);
                  });
            })
            ->exists();

        if ($overlap) {
            return $this->error('Vehicle already booked for selected period', null, 422);
        }

        $data['user_id'] = Auth::id();
        $data['company_id'] = Auth::user()->company_id ?? null;
        $data['status'] = 'pending';
        $data['book_time'] = now();

        $booking = Vehicle_has_booking::create($data);
        return $this->success('Booking created', new BookingResource($booking), 201);
    }

    /**
     * @OA\Put(
     *   path="/v1/bookings/{id}",
     *   tags={"Bookings"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update booking",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Updated"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function update(BookingUpdateRequest $request, Vehicle_has_booking $booking)
    {
        $data = $request->validated();

        // If date range changed, re-check overlap
        if (isset($data['book_start_date']) || isset($data['return_date'])) {
            $start = $data['book_start_date'] ?? $booking->book_start_date;
            $end = $data['return_date'] ?? $booking->return_date;
            $overlap = Vehicle_has_booking::query()
                ->where('vehicle_no', $booking->vehicle_no)
                ->where('id', '!=', $booking->id)
                ->whereIn('status', ['pending','confirmed'])
                ->where(function ($q) use ($start, $end) {
                    $q->whereBetween('book_start_date', [$start, $end])
                      ->orWhereBetween('return_date', [$start, $end])
                      ->orWhere(function ($qq) use ($start, $end) {
                            $qq->where('book_start_date', '<=', $start)
                               ->where('return_date', '>=', $end);
                      });
                })
                ->exists();
            if ($overlap) {
                return $this->error('Updated dates overlap existing booking', null, 422);
            }
        }

        // Status transitions: pending -> confirmed -> completed/canceled
        if (isset($data['status'])) {
            $allowed = ['pending','confirmed','completed','canceled'];
            if (!in_array($data['status'], $allowed, true)) {
                return $this->error('Invalid status transition', null, 422);
            }
            // Auto-create invoice on completion if not existing
            if ($data['status'] === 'completed') {
                $hasInvoice = Invoice::query()->where('booking_id', $booking->id)->exists();
                if (!$hasInvoice) {
                    Invoice::create([
                        'booking_id' => $booking->id,
                        'company_id' => $booking->company_id,
                        'customer_id' => $booking->customer_id,
                        'user_id' => $booking->user_id,
                        'vehicle_no' => $booking->vehicle_no,
                        'starting_meeter' => 0,
                        'endmeeter' => 0,
                        'invoice_date' => now()->toDateString(),
                        'invoice_status' => 'open',
                        'total_bill' => 0,
                        'net_total' => 0,
                        'discount' => 0,
                    ]);
                }
            }
        }

        $booking->update($data);
        return $this->success('Booking updated', new BookingResource($booking));
    }

    /**
     * @OA\Delete(
     *   path="/v1/bookings/{id}",
     *   tags={"Bookings"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete booking",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Vehicle_has_booking $booking)
    {
        if (in_array($booking->status, ['confirmed','completed'])) {
            return $this->error('Cannot delete confirmed/completed booking', null, 422);
        }
        $booking->delete();
        return $this->success('Booking deleted');
    }
}
