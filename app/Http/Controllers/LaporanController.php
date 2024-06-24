<?php

namespace App\Http\Controllers;

use App\Models\SewaTenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $dataSewa = SewaTenda::paginate(5);
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
            case 'management':
                return view('laporan.main', compact('dataSewa'));
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/')->with('error', 'Role tidak dikenal.');
        }
    }
}
