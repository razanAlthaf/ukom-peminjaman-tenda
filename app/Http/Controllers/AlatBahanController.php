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
        $alatBahans = AlatBahan::paginate(10);
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return view('alatBahan.main', compact('alatBahans'));
            case 'management':
                return view('alatBahan.main', compact('alatBahans'));
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/')->with('error', 'Role tidak dikenal.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'merk' => 'required',
            'spek' => 'required',
            'kondisi' => 'required',
            'jumlah_barang' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        AlatBahan::create($request->all());
        return redirect()->route('alatBahans.index')->with('success', 'Alat Bahan berhasil ditambahkan.');
    }

    public function edit(AlatBahan $alatBahan)
    {
        return view('alatBahan.edit', compact('alatBahan'));
    }

    public function update(Request $request, AlatBahan $alatBahan)
    {
        $request->validate([
            'nama_barang' => 'required',
            'merk' => 'required',
            'spek' => 'required',
            'kondisi' => 'required',
            'jumlah_barang' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $alatBahan->update($request->all());
        return redirect()->route('alatBahans.index')->with('success', 'Alat Bahan berhasil diperbarui.');
    }

    public function destroy(AlatBahan $alatBahan)
    {
        $alatBahan->delete();
        return redirect()->route('alatBahans.index')->with('success', 'Alat Bahan berhasil dihapus.');
    }

}
