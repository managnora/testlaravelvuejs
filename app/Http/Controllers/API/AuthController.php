<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use Core\UseCase\Auth\CreateUser;
use Core\UseCase\Auth\Login;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{

    /**
     * @param StoreUserRequest $request
     * @param CreateUser $createUser
     * @return JsonResponse
     */
    public function register(StoreUserRequest $request, CreateUser $createUser): JsonResponse
    {
        try {
            $input = new CreateUser\InputDTO(
                $request->name,
                $request->email,
                $request->password
            );
            $output = $createUser->execute($input);
            $success['token'] =  $output->token;
            $response = $this->sendResponse($success, 'User register successfully.');
        } catch (\Exception $exception) {
            $response = $this->sendError($exception->getMessage(), [$exception], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return $response;
    }

    /**
     * Login Req
     *
     * @param LoginRequest $request
     * @param Login $login
     * @return JsonResponse
     */
    public function login(LoginRequest $request, Login $login): JsonResponse
    {
        try {
            $output = $login->execute(
                $request->email,
                $request->password
            );
            if ($output->success) {
                $response = $this->sendResponse(['token' => $output->token], 'User login successfully.');
            } else {
                $response = $this->sendError('Unauthorised.', ['error' => $output->message], Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $exception) {
            $response = $this->sendError('Unauthorised.', ['error' => $exception->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
        return $response;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function userInfo(Request $request): JsonResponse
    {
        return $this->sendResponse(['user' => $request->user()]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $token = $request->user()->token();
        $token->revoke();
        return $this->sendResponse([], 'You have been successfully logged out!');
    }
}
