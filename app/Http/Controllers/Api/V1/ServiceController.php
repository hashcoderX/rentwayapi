<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\ServiceRequest;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Add;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * @OA\Tag(name="Services", description="Service catalog & requests")
 */
class ServiceController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/services",
     *   tags={"Services"},
     *   summary="List services (ads categorized)",
     *   @OA\Parameter(name="category", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Add::query();
        if ($category) {
            $query->where('category', $category);
        }
        $services = $query->orderByDesc('id')->paginate(20);
        return $this->success('Service list', [
            'items' => ServiceResource::collection($services),
            'pagination' => [
                'current_page' => $services->currentPage(),
                'last_page' => $services->lastPage(),
                'total' => $services->total(),
            ]
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/services/request",
     *   tags={"Services"},
     *   security={{"bearerAuth":{}}},
     *   summary="Request a service",
    *   @OA\Response(response=200, description="Accepted"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function requestService(ServiceRequest $request)
    {
        // Placeholder for service request workflow (e.g. create BookingRequest)
        $data = $request->validated();
        return $this->success('Service request accepted', ['service_id' => $data['service_id']]);
    }
}
