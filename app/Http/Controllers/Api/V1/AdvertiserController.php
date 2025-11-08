<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\AdvertiserResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Advertisers", description="Advertisers (companies) management")
 */
class AdvertiserController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/advertisers",
     *   tags={"Advertisers"},
     *   security={{"bearerAuth":{}}},
     *   summary="List advertisers",
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $companies = Company::orderBy('name')->paginate(15);
        return $this->success('Advertiser list', [
            'items' => AdvertiserResource::collection($companies),
            'pagination' => [
                'current_page' => $companies->currentPage(),
                'last_page' => $companies->lastPage(),
                'total' => $companies->total(),
            ]
        ]);
    }

    /**
     * @OA\Get(
     *   path="/v1/advertisers/{id}",
     *   tags={"Advertisers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show advertiser",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Company $company)
    {
        return $this->success('Advertiser details', new AdvertiserResource($company));
    }

    /**
     * @OA\Post(
     *   path="/v1/advertisers",
     *   tags={"Advertisers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create advertiser",
     *   @OA\Response(response=201, description="Created"),
     *   @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'contact_no' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'distric' => 'nullable|string',
            'located_province' => 'nullable|string',
            'website' => 'nullable|string',
        ]);
        $company = Company::create($data);
        return $this->success('Advertiser created', new AdvertiserResource($company), 201);
    }

    /**
     * @OA\Put(
     *   path="/v1/advertisers/{id}",
     *   tags={"Advertisers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update advertiser",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="Updated"),
     *   @OA\Response(response=422, description="Validation error")
     * )
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'contact_no' => 'sometimes|string',
            'mobile_number' => 'sometimes|string',
            'address' => 'sometimes|string',
            'city' => 'sometimes|string',
            'distric' => 'sometimes|string',
            'located_province' => 'sometimes|string',
            'website' => 'sometimes|string',
        ]);
        $company->update($data);
        return $this->success('Advertiser updated', new AdvertiserResource($company));
    }

    /**
     * @OA\Delete(
     *   path="/v1/advertisers/{id}",
     *   tags={"Advertisers"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete advertiser",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="Deleted")
     * )
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return $this->success('Advertiser deleted');
    }
}
