<?php

namespace App\Http\Controllers;

use App\Models\SewaTenda;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DataSewaController extends Controller
{
    public function index()
    {
        $dataSewa = SewaTenda::paginate(5);
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
            case 'management':
                return view('dataSewa.main', compact('dataSewa'));
            default:
            Log::error('DashboardController: Unknown role ' . $user->role . ' for user ' . $user->id);
                return redirect('/')->with('error', 'Role tidak dikenal.');
        }
    }

    public function edit($id)
    {
        $sewaTenda = SewaTenda::findOrFail($id);
        return view('dataSewa.edit', compact('sewaTenda'));
    }

    public function update(Request $request, $id)
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

        $sewaTenda = SewaTenda::findOrFail($id);
        $sewaTenda->update($request->all());

        return redirect()->route('dataSewa.index')->with('success', 'Data sewa berhasil diupdate');
    }

    public function destroy($id)
    {
        $sewaTenda = SewaTenda::findOrFail($id);
        $sewaTenda->delete();

        return redirect()->route('dataSewa.index')->with('success', 'Data sewa berhasil dihapus');
    }

    public function exportDoc()
    {
        $dataSewa = SewaTenda::all();
    
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle('Data Sewa Tenda', 1);
    
        $table = $section->addTable();
        $table->addRow();
        $table->addCell()->addText('ID');
        $table->addCell()->addText('Nama Penyewa');
        $table->addCell()->addText('No HP');
        $table->addCell()->addText('Kota/Kabupaten');
        $table->addCell()->addText('Alamat');
        $table->addCell()->addText('Tanggal Sewa');
        $table->addCell()->addText('Tanggal Kembali');
        $table->addCell()->addText('Jumlah Sewa');
    
        foreach ($dataSewa as $sewa) {
            $table->addRow();
            $table->addCell()->addText($sewa->id);
            $table->addCell()->addText($sewa->nama_penyewa);
            $table->addCell()->addText($sewa->no_hp);
            $table->addCell()->addText($sewa->kota_kabupaten);
            $table->addCell()->addText($sewa->alamat);
            $table->addCell()->addText($sewa->tgl_sewa);
            $table->addCell()->addText($sewa->tgl_kembali);
            $table->addCell()->addText($sewa->jumlah_sewa);
        }
    
        $filename = 'data-sewa.docx';
        $path = storage_path($filename);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($path);
    
        return response()->download($path)->deleteFileAfterSend(true);
    }
}
