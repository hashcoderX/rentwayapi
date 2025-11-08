<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Notifications", description="Notifications management")
 */
class NotificationController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/notifications",
     *   tags={"Notifications"},
     *   security={{"bearerAuth":{}}},
     *   summary="List notifications",
     *   @OA\Parameter(name="company_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Parameter(name="type", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="read_state", in="query", required=false, @OA\Schema(type="string")),
     *   @OA\Parameter(name="per_page", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index(Request $request)
    {
        $query = Notification::query()->latest('notifiaction_date');

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->integer('company_id'));
        } elseif (Auth::check() && Auth::user()->company_id) {
            $query->where('company_id', Auth::user()->company_id);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->get('type'));
        }

        if ($request->filled('read_state')) {
            $query->where('read_state', $request->get('read_state'));
        }

        $notifications = $query->paginate($request->get('per_page', 20));
        return $this->success('Notifications fetched successfully', [
            'items' => NotificationResource::collection($notifications),
            'pagination' => [
                'current_page' => $notifications->currentPage(),
                'last_page' => $notifications->lastPage(),
                'per_page' => $notifications->perPage(),
                'total' => $notifications->total(),
            ],
        ]);
    }

    /**
     * @OA\Get(
     *   path="/v1/notifications/{id}",
     *   tags={"Notifications"},
     *   security={{"bearerAuth":{}}},
     *   summary="Show notification",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function show(Notification $notification)
    {
        return $this->success('Notification fetched successfully', new NotificationResource($notification));
    }

    /**
     * @OA\Delete(
     *   path="/v1/notifications/{id}",
     *   tags={"Notifications"},
     *   security={{"bearerAuth":{}}},
     *   summary="Delete notification",
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="Deleted")
     * )
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return $this->success('Notification deleted successfully');
    }
}
