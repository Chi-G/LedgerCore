<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SessionController extends Controller
{
    /**
     * Display a listing of the active sessions.
     */
    public function index()
    {
        $currentSessionId = request()->session()->getId();

        $sessions = DB::table('sessions')
            ->where('user_id', Auth::id())
            ->orderBy('last_activity', 'desc')
            ->get()
            ->map(function ($session) use ($currentSessionId) {
                return (object) [
                    'id' => $session->id,
                    'ip_address' => $session->ip_address,
                    'user_agent' => $session->user_agent,
                    'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                    'is_current_device' => $session->id === $currentSessionId,
                ];
            });

        return view('settings.sessions', compact('sessions'));
    }

    /**
     * Revoke a specific active session.
     */
    public function destroy(Request $request, $id)
    {
        // Prevent users from deleting their current session via this endpoint
        // (they should use the regular logout endpoint instead).
        if ($id === $request->session()->getId()) {
            return back()->with('error', 'You cannot revoke your current session here. Please log out instead.');
        }

        DB::table('sessions')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Session revoked successfully.');
    }
}
