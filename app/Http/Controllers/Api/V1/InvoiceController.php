<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Invoices", description="Invoices management")
 */
class InvoiceController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/invoices",
     *   tags={"Invoices"},
     *   security={{"bearerAuth":{}}},
     *   summary="List invoices",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="invoice_status", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="customer_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Invoice::query()->latest('invoice_date');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        } elseif (Auth::check() && Auth::user()->company_id) {
            $query->where('company_id', Auth::user()->company_id);
        }

        if ($request->filled('invoice_status')) {
            $query->where('invoice_status', $request->get('invoice_status'));
        }

        if ($request->filled('customer_id')) {
            $query->where('customer_id', $request->integer('customer_id'));
        }

        $invoices = $query->paginate($request->get('per_page', 15));
        return $this->success('Invoices fetched successfully', [
            'items' => InvoiceResource::collection($invoices),
            'pagination' => [
                'current_page' => $invoices->currentPage(),
                'last_page' => $invoices->lastPage(),
                'per_page' => $invoices->perPage(),
                'total' => $invoices->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/invoices",
     *   tags={"Invoices"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create invoice",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|integer',
            'vehicle_no' => 'required|string',
            'starting_meeter' => 'required|numeric',
            'endmeeter' => 'nullable|numeric',
            'type_of_rent' => 'nullable|string',
            'addtional_mile_chargers' => 'nullable|numeric',
            'extra_charges' => 'nullable|numeric',
            'extra_for_description' => 'nullable|string',
            'description' => 'nullable|string',
            'advance_charge' => 'nullable|numeric',
            'total_bill' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'net_total' => 'nullable|numeric',
            'invoice_date' => 'required|date',
            'invoice_status' => 'nullable|string',
            'issue_type' => 'nullable|string',
        ]);
        $data['company_id'] = Auth::user()->company_id ?? null;
        $data['user_id'] = Auth::id();
        $invoice = Invoice::create($data);
        return $this->success('Invoice created successfully', new InvoiceResource($invoice), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/invoices/{id}",
     *   tags={"Invoices"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show invoice",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Invoice $invoice)
    {
        return $this->success('Invoice fetched successfully', new InvoiceResource($invoice));
    }
}
