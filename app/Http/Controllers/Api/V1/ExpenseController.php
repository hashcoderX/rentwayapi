<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\ExpenseResource;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Expenses", description="Expenses management")
 */
class ExpenseController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/expenses",
     *   tags={"Expenses"},
     *   security={{"bearerAuth":{}}},
     *   summary="List expenses",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="expenses_type", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Expenses::query()->latest('date_time');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        } elseif (Auth::check() && Auth::user()->company_id) {
            $query->where('company_id', Auth::user()->company_id);
        }

        if ($request->filled('expenses_type')) {
            $query->where('expenses_type', $request->get('expenses_type'));
        }

        $expenses = $query->paginate($request->get('per_page', 15));
        return $this->success('Expenses fetched successfully', [
            'items' => ExpenseResource::collection($expenses),
            'pagination' => [
                'current_page' => $expenses->currentPage(),
                'last_page' => $expenses->lastPage(),
                'per_page' => $expenses->perPage(),
                'total' => $expenses->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/expenses",
     *   tags={"Expenses"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create expense",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'expenses_type' => 'required|string',
            'amount' => 'required|numeric',
            'date_time' => 'required|date',
            'reference' => 'nullable|string',
            'company_id' => 'nullable|integer',
        ]);
        $data['company_id'] = $data['company_id'] ?? (Auth::user()->company_id ?? null);
        $expense = Expenses::create($data);
        return $this->success('Expense created successfully', new ExpenseResource($expense), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/expenses/{id}",
     *   tags={"Expenses"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show expense",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Expenses $expense)
    {
        return $this->success('Expense fetched successfully', new ExpenseResource($expense));
    }

    /**
     * @OA\Put(
     *   path="/v1/expenses/{id}",
     *   tags={"Expenses"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update expense",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Updated"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function update(Request $request, Expenses $expense)
    {
        $data = $request->validate([
            'expenses_type' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
            'date_time' => 'sometimes|date',
            'reference' => 'sometimes|string',
        ]);
        $expense->update($data);
        return $this->success('Expense updated successfully', new ExpenseResource($expense));
    }

    /**
     * @OA\Delete(
     *   path="/v1/expenses/{id}",
     *   tags={"Expenses"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete expense",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Expenses $expense)
    {
        $expense->delete();
        return $this->success('Expense deleted successfully');
    }
}
