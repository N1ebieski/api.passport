<?php

namespace App\Http\Controllers\Api\Spa\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Api\Spa\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Undocumented function
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request) : JsonResponse
    {
        $response = Http::withOptions([
                'verify' => false,
            ])
            ->post(Config::get('app.url') . '/oauth/token', [
                'grant_type' => 'password',
                'client_id' => Config::get('services.passport.client_id'),
                'client_secret' => Config::get('services.passport.client_secret'),
                'username' => $request->email,
                'password' => $request->password
            ])
            ->json();

        return Response::json($response);
    }
}
