<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Requests\Api\V1\CustomerStoreRequest;
use App\Http\Requests\Api\V1\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Customers", description="Customers management")
 */
class CustomerController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/customers",
     *   tags={"Customers"},
     *   security={{"bearerAuth":{}}},
     *   summary="List customers",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="search", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Customer::query()->latest('reg_date');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        }

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%$search%")
                  ->orWhere('nic', 'like', "%$search%")
                  ->orWhere('drivinglicenseno', 'like', "%$search%")
                  ->orWhere('telephone_no', 'like', "%$search%")
                  ->orWhere('telephone_number_two', 'like', "%$search%")
                  ->orWhere('telephone_number_three', 'like', "%$search%")
                  ->orWhere('telephone_number_four', 'like', "%$search%")
                  ->orWhere('city', 'like', "%$search%")
                  ->orWhere('street', 'like', "%$search%")
                  ->orWhere('address_line_one', 'like', "%$search%");
            });
        }

        $customers = $query->paginate($request->get('per_page', 15));
        return $this->success('Customers list fetched successfully', [
            'items' => CustomerResource::collection($customers),
            'pagination' => [
                'current_page' => $customers->currentPage(),
                'last_page' => $customers->lastPage(),
                'per_page' => $customers->perPage(),
                'total' => $customers->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/customers",
     *   tags={"Customers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create customer",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(CustomerStoreRequest $request)
    {
        $data = $request->validated();
    $data['company_id'] = $data['company_id'] ?? (Auth::user()->company_id ?? null);
    $customer = Customer::create($data);

        return $this->success('Customer created successfully', new CustomerResource($customer), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/customers/{id}",
     *   tags={"Customers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show customer",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Customer $customer)
    {
        return $this->success('Customer fetched successfully', new CustomerResource($customer));
    }

    /**
     * @OA\Put(
     *   path="/v1/customers/{id}",
     *   tags={"Customers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update customer",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Updated"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return $this->success('Customer updated successfully', new CustomerResource($customer));
    }

    /**
     * @OA\Delete(
     *   path="/v1/customers/{id}",
     *   tags={"Customers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete customer",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return $this->success('Customer deleted successfully');
    }
}
