<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ThemeLogController extends Controller
{
    public function logSwitch(Request $request)
    {
        $theme = $request->input('theme');
        $ip = $request->ip();
        Log::info('Theme switched', ['theme' => $theme, 'ip' => $ip]);
        return response()->json(['status' => 'logged']);
    }

    public function logEvent(Request $request)
    {
        $event = $request->input('event', 'unknown');
        $message = $request->input('message', 'No message');
        $data = $request->input('data', []);
        $timestamp = $request->input('timestamp', now());
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        Log::info("Theme Event: {$event}", [
            'event' => $event,
            'message' => $message,
            'data' => $data,
            'timestamp' => $timestamp,
            'ip' => $ip,
            'user_agent' => $userAgent,
            'url' => $request->fullUrl()
        ]);

        return response()->json(['status' => 'logged', 'event' => $event]);
    }
}
