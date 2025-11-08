<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\V1\AdResource;
use App\Http\Requests\Api\V1\AdsStoreRequest;
use App\Http\Requests\Api\V1\AdsUpdateRequest;
use App\Models\Add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Ads", description="Advertisements management")
 */
class AdController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/ads",
     *   tags={"Ads"},
     *   security={{"bearerAuth":{}}},
     *   summary="List ads",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="status", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Add::query()->latest('date_time');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->get('status'));
        }

        $ads = $query->paginate($request->get('per_page', 15));
        return $this->success('Ads list fetched successfully', [
            'items' => AdResource::collection($ads),
            'pagination' => [
                'current_page' => $ads->currentPage(),
                'last_page' => $ads->lastPage(),
                'per_page' => $ads->perPage(),
                'total' => $ads->total(),
            ],
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/ads",
     *   tags={"Ads"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create ad",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(AdsStoreRequest $request)
    {
        $data = $request->validated();
        $data['company_id'] = $data['company_id'] ?? (Auth::user()->company_id ?? null);
        $ad = Add::create($data);

        return $this->success('Ad created successfully', new AdResource($ad), 201);
    }

    /**
     * @OA\Get(
     *   path="/v1/ads/{id}",
     *   tags={"Ads"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show ad",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Add $ad)
    {
        return $this->success('Ad fetched successfully', new AdResource($ad));
    }

    /**
     * @OA\Put(
     *   path="/v1/ads/{id}",
     *   tags={"Ads"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update ad",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Updated"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function update(AdsUpdateRequest $request, Add $ad)
    {
        $ad->update($request->validated());
        return $this->success('Ad updated successfully', new AdResource($ad));
    }

    /**
     * @OA\Delete(
     *   path="/v1/ads/{id}",
     *   tags={"Ads"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete ad",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
    *   @OA\Response(response=200, description="Deleted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden")
     * )
     */
    public function destroy(Add $ad)
    {
        $ad->delete();
        return $this->success('Ad deleted successfully');
    }
}
