<?php

namespace App\Http\Controllers\Api\Spa\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Spa\Auth\RefreshRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class RefreshController extends Controller
{
    /**
     * Undocumented function
     *
     * @param RefreshRequest $request
     * @return JsonResponse
     */
    public function __invoke(RefreshRequest $request) : JsonResponse
    {
        $response = Http::withOptions([
                'verify' => false,
            ])
            ->post(Config::get('app.url') . '/oauth/token', [
                'grant_type' => 'refresh_token',
                'refresh_token' => $request->input('refresh_token'),
                'client_id' => Config::get('services.passport.client_id'),
                'client_secret' => Config::get('services.passport.client_secret'),
                'scope' => ''
            ]);

        return Response::json($response->json(), $response->getStatusCode());
    }
}
