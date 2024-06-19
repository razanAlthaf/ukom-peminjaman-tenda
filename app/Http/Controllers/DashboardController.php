<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard.main');
            case 'management':
                return view('management.dashboard.main');
            case 'peminjam':
                return view('peminjam.dashboard.main');
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/home')->with('error', 'Role tidak dikenal.');
        }
    }
}
