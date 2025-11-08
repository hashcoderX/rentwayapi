<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\BlacklistStoreRequest;
use App\Http\Resources\V1\BlacklistResource;
use App\Models\Backlister;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Blacklist", description="Blacklist management")
 */
class BlacklistController extends ApiController
{
    /**
     * @OA\Get(
     *   path="/v1/blacklist",
     *   tags={"Blacklist"},
     *   security={{"bearerAuth":{}}},
     *   summary="List blacklist entries",
     *   @OA\Response(response=200, description="OK")
     * )
     */
    public function index()
    {
        $items = Backlister::orderByDesc('id')->paginate(20);
        return $this->success('Blacklist', [
            'items' => BlacklistResource::collection($items),
            'pagination' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'total' => $items->total(),
            ]
        ]);
    }

    /**
     * @OA\Post(
     *   path="/v1/blacklist",
     *   tags={"Blacklist"},
     *   security={{"bearerAuth":{}}},
     *   summary="Add to blacklist",
    *   @OA\Response(response=201, description="Created"),
    *   @OA\Response(response=401, ref="#/components/responses/Unauthorized"),
    *   @OA\Response(response=403, ref="#/components/responses/Forbidden"),
    *   @OA\Response(response=422, ref="#/components/responses/ValidationError")
     * )
     */
    public function store(BlacklistStoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['company_id'] = Auth::user()->company_id ?? null;
        $item = Backlister::create($data);
        return $this->success('Blacklisted', new BlacklistResource($item), 201);
    }
}
