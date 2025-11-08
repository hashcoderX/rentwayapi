<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\VehicleStoreRequest;
use App\Http\Requests\Api\V1\VehicleUpdateRequest;
use App\Http\Resources\V1\VehicleResource;
use App\Models\Vehical;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Vehicles", description="Vehicle catalog management")
 */
class VehicleController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/vehicles",
     *   tags={"Vehicles"},
     *   summary="List vehicles",
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $vehicles = Vehical::with(['latestImage','company'])->paginate(15);
        return $this->success('Vehicle list', [
            'items' => VehicleResource::collection($vehicles),
            'pagination' => [
                'current_page' => $vehicles->currentPage(),
                'last_page' => $vehicles->lastPage(),
                'total' => $vehicles->total(),
            ]
        ]);
    }

    /**
     * @OA\Get(
     *   path="/v1/vehicle/{id}",
     *   tags={"Vehicles"},
     *   summary="Show vehicle",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Vehical $vehical)
    {
        $vehical->load(['latestImage','company']);
        return $this->success('Vehicle details', new VehicleResource($vehical));
    }

    /**
     * @OA\Post(
     *   path="/v1/vehicles",
     *   tags={"Vehicles"},
     *   security={{"bearerAuth":{}}},
     *   summary="Create vehicle",
     *   @OA\Response(response=201, description="Created")
     * )
     */
    public function store(VehicleStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['company_id'] = Auth::user()->company_id ?? null;
        $vehical = Vehical::create($data);
        return $this->success('Vehicle created', new VehicleResource($vehical), 201);
    }

    /**
     * @OA\Put(
     *   path="/v1/vehicles/{id}",
     *   tags={"Vehicles"},
     *   security={{"bearerAuth":{}}},
     *   summary="Update vehicle",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="Updated")
     * )
     */
    public function update(VehicleUpdateRequest $request, Vehical $vehical)
    {
        $vehical->update($request->validated());
        return $this->success('Vehicle updated', new VehicleResource($vehical));
    }

    /**
     * @OA\Delete(
     *   path="/v1/vehicles/{id}",
     *   tags={"Vehicles"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete vehicle",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="Deleted")
     * )
     */
    public function destroy(Vehical $vehical)
    {
        $vehical->delete();
        return $this->success('Vehicle deleted');
    }
}
