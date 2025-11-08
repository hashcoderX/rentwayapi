<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\AuthLoginRequest;
use App\Http\Requests\Api\V1\AuthRegisterRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @OA\Tag(name="Auth", description="Authentication endpoints")
 */
class AuthController extends ApiController
{
    /**
     * Register a new user.
     * @OA\Post(
     *   path="/v1/auth/register",
     *   tags={"Auth"},
     *   summary="Register",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(required={"name","email","password"},
     *       @OA\Property(property="name", type="string", example="Jane Doe"),
     *       @OA\Property(property="email", type="string", example="jane@example.com"),
     *       @OA\Property(property="password", type="string", example="secret123"),
     *       @OA\Property(property="usertype", type="string", example="customer")
     *     )
     *   ),
     *   @OA\Response(response=201, description="Registered",
     *     @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example=true),
     *       @OA\Property(property="message", type="string", example="Registered"),
     *       @OA\Property(property="data", type="object",
     *         @OA\Property(property="token", type="string"),
     *         @OA\Property(property="user", type="object",
     *           @OA\Property(property="id", type="integer", example=1),
     *           @OA\Property(property="name", type="string", example="Jane Doe"),
     *           @OA\Property(property="email", type="string", example="jane@example.com")
     *         )
     *       )
     *     )
     *   )
     * )
     */
    public function register(AuthRegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype'] ?? 'customer',
        ]);
        /** @var User $user */
        $token = $user->createToken('api')->plainTextToken;
        return $this->success('Registered', [
            'user' => new UserResource($user),
            'token' => $token,
        ], 201);
    }

    /**
     * Login with credentials.
     * @OA\Post(
     *   path="/v1/auth/login",
     *   tags={"Auth"},
     *   summary="Login",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(required={"email","password"},
     *       @OA\Property(property="email", type="string", example="jane@example.com"),
     *       @OA\Property(property="password", type="string", example="secret123")
     *     )
     *   ),
     *   @OA\Response(response=200, description="Logged in"),
     *   @OA\Response(response=401, description="Invalid credentials")
     * )
     */
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return $this->error('Invalid credentials', null, 401);
        }
        /** @var User $user */
        $user = User::query()->where('id', Auth::id())->first();
        $token = $user->createToken('api')->plainTextToken;
        return $this->success('Logged in', [
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    /**
     * Logout current user (invalidate tokens).
     * @OA\Post(
     *   path="/v1/auth/logout",
     *   tags={"Auth"},
     *   security={{"bearerAuth":{}}},
     *   summary="Logout",
     *   @OA\Response(response=200, description="Logged out")
     * )
     */
    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            PersonalAccessToken::where('tokenable_id', $user->id)
                ->where('tokenable_type', get_class($user))
                ->delete();
        }
        return $this->success('Logged out');
    }

    /**
     * Get authenticated user.
     * @OA\Get(
     *   path="/v1/auth/me",
     *   tags={"Auth"},
     *   security={{"bearerAuth":{}}},
     *   summary="Me",
     *   @OA\Response(response=200, description="User data")
     * )
     */
    public function me()
    {
        return $this->success('Authenticated user', new UserResource(Auth::user()));
    }
}
