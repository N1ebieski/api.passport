<?php

namespace App\Http\Controllers\Api\Spa\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Api\Spa\Auth\LoginRequest;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Undocumented function
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(Request $request) : JsonResponse
    {
        $request->user()->token()->revoke();

        return Response::json(['success' => '']);
    }
}
