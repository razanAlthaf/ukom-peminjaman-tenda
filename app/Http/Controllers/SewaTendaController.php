<?php

namespace App\Http\Controllers;

use App\Models\AlatBahan;
use App\Models\SewaTenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SewaTendaController extends Controller
{
    public function index()
    {
        $sewaTendas = SewaTenda::paginate(5);
        $alatBahans = AlatBahan::all();
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
            case 'peminjam':
                return view('sewa_tendas.main', compact('alatBahans'));
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/')->with('error', 'Role tidak dikenal.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'alat_bahan_id' => 'required|exists:alat_bahans,id',
            'jumlah_sewa' => 'required|integer|min:1',
            'nama_penyewa' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'kota_kabupaten' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tgl_sewa' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_sewa',
        ]);

        $alatBahan = AlatBahan::find($request->alat_bahan_id);
        if ($alatBahan->jumlah_barang < $request->jumlah_sewa) {
            return redirect()->back()->withErrors(['Jumlah barang tidak mencukupi']);
        }
        $alatBahan->decrement('jumlah_barang', $request->jumlah_sewa);

        SewaTenda::create($request->all());

        return redirect()->route('sewa_tendas.index')->with('success', 'Sewa tenda berhasil dilakukan.');
    }
}
