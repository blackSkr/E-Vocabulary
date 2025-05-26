<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
        public function index()
    {
        return view('form-laporan.index'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'evidence' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240',
        ]);

        $filePath = null;
        if ($request->hasFile('evidence')) {
            $filePath = $request->file('evidence')->store('bukti_laporan', 'public');
        }

        Laporan::create([
            'nama_pelapor' => $request->name,
            'email_pelapor' => $request->email,
            'no_hp' => $request->phone,
            'bukti_laporan' => $filePath,
            'status' => 'Ditinjau', 
            'tanggal_selesai' => null,
        ]);

        return redirect()->route('form-laporan.index')->with('success', 'Laporan berhasil dikirim!');
    }
    
}
