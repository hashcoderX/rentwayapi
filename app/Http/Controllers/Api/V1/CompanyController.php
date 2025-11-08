<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\CompanyResource;
use App\Http\Requests\Api\V1\CompanyStoreRequest;
use App\Http\Requests\Api\V1\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Companies", description="Companies management")
 */
class CompanyController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/companies",
     *   tags={"Companies"},
     *   security={{"bearerAuth":{}}},
     *   summary="List companies",
     *   @OA\Parameter(name="search", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Company::query()->orderBy('name');

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('contact_no', 'like', "%$search%")
                  ->orWhere('mobile_number', 'like', "%$search%")
                  ->orWhere('city', 'like', "%$search%")
                  ->orWhere('distric', 'like', "%$search%")
                  ->orWhere('located_province', 'like', "%$search%")
                  ->orWhere('website', 'like', "%$search%");
            });
        }

        $companies = $query->paginate($request->get('per_page', 15));

        return $this->success('Companies list fetched successfully', [
            'items' => CompanyResource::collection($companies),
            'pagination' => [
                'current_page' => $companies->currentPage(),
                'last_page' => $companies->lastPage(),
                'per_page' => $companies->perPage(),
                'total' => $companies->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/companies",
     *   tags={"Companies"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create company",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());
        return $this->success('Company created successfully', new CompanyResource($company), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/companies/{id}",
     *   tags={"Companies"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show company",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Company $company)
    {
        return $this->success('Company fetched successfully', new CompanyResource($company));
    }

    /**
     * @OA\Put(
     *   path="/v1/companies/{id}",
     *   tags={"Companies"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update company",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Updated"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());
        return $this->success('Company updated successfully', new CompanyResource($company));
    }

    /**
     * @OA\Delete(
     *   path="/v1/companies/{id}",
     *   tags={"Companies"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete company",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return $this->success('Company deleted successfully');
    }
}
