<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Payments", description="Payments management")
 */
class PaymentController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/payments",
     *   tags={"Payments"},
     *   security={{"bearerAuth":{}}},
     *   summary="List payments",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="payment_type", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="month", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Payment::query()->latest('date_time');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        } elseif (Auth::check() && Auth::user()->company_id) {
            $query->where('company_id', Auth::user()->company_id);
        }

        if ($request->filled('payment_type')) {
            $query->where('payment_type', $request->get('payment_type'));
        }

        if ($request->filled('month')) {
            $query->where('month', $request->get('month'));
        }

        $payments = $query->paginate($request->get('per_page', 15));
        return $this->success('Payments fetched successfully', [
            'items' => PaymentResource::collection($payments),
            'pagination' => [
                'current_page' => $payments->currentPage(),
                'last_page' => $payments->lastPage(),
                'per_page' => $payments->perPage(),
                'total' => $payments->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/payments",
     *   tags={"Payments"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create payment",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date_time' => 'required|date',
            'paytype' => 'nullable|string',
            'payment_type' => 'nullable|string',
            'month' => 'nullable|string',
            'invoiceid' => 'nullable|integer',
            'paystatus' => 'nullable|string',
            'company_id' => 'nullable|integer',
        ]);
        $data['user_id'] = Auth::id();
        $data['company_id'] = $data['company_id'] ?? (Auth::user()->company_id ?? null);

        $payment = Payment::create($data);
        return $this->success('Payment created successfully', new PaymentResource($payment), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/payments/{id}",
     *   tags={"Payments"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show payment",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Payment $payment)
    {
        return $this->success('Payment fetched successfully', new PaymentResource($payment));
    }

    /**
     * @OA\Delete(
     *   path="/v1/payments/{id}",
     *   tags={"Payments"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete payment",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return $this->success('Payment deleted successfully');
    }
}
