<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Impulse POST request webhook

Route::post('/v1/auth/login', function (Request $request) {
    $token = $request->header('Authorization');

    \Illuminate\Support\Facades\DB::table('auth_tokens')
        ->insert(['auth_token' => $token]);

    return 1;
});

Route::get('/v1/auth/login', function (Request $request) {
    $session = \Illuminate\Support\Facades\DB::table('sessions')
        ->where('id', $request->query('t'))->first();

    $tokenDb = collect(unserialize(base64_decode($session->payload)))->get('session_id');

    $token = \Illuminate\Support\Facades\DB::table('auth_tokens')
        ->where('auth_token', $tokenDb)->first();

    if ($token) {
        return response()->json(['status' => 'success']);
    }

    return response()->json(['status' => 'error']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
