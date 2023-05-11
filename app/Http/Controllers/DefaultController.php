<?php

namespace App\Http\Controllers;

use App\Providers\ApiServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class DefaultController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login(ApiServiceProvider $apiService, Request $request)
    {
        if ($request->session()->get('session_id')) {
            return redirect()->route('dashboard');
        }

        $result = $apiService->makeGetRequest(config('app.impulse_get_session_url'));

        $r = Str::random(36);

        session()->put('session_id', $r);

        return view('login')->with([
            'qrcode' => QrCode::size(400)->generate($r),
            'deep_link' => $result,
            'r' => $r
        ]);
    }
}
