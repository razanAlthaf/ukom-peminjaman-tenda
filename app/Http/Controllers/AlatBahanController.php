<?php

namespace App\Http\Controllers;

use App\Models\AlatBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AlatBahanController extends Controller
{
    public function index() 
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return view('alatBahan.main');
            case 'management':
                return view('management.dashboard.main');
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/home')->with('error', 'Role tidak dikenal.');
        }
    }

}
