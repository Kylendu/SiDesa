<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Auth;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:inventories,id',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Inventory::findOrFail($request->barang_id);

        if ($barang->jumlah < $request->jumlah) {
            return back()->with('error', 'Jumlah barang tidak mencukupi.');
        }

        // Buat peminjaman
        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'user_id' => auth()->id(),
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan,
            'jumlah' => $request->jumlah,
            'status' => 'pending',
        ]);

        // Kurangi stok
        if('status'=='disetujui'){
            $barang->jumlah -= $request->jumlah;
            $barang->save();
        }

        return back()->with('success', 'Permohonan peminjaman telah dikirim.');
    }

    public function profil()
    {
        $peminjaman = Peminjaman::with('barang')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('all.pages.profil', compact('peminjaman'));
    }

    public function download($id)
    {
        $peminjaman = Peminjaman::with('barang')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        if ($peminjaman->status !== 'disetujui') {
            return back()->with('error', 'Peminjaman belum disetujui.');
        }

        $pdf = Pdf::loadView('pages.peminjaman_surat', compact('peminjaman'));
        return $pdf->download('Surat-Peminjaman-' . $peminjaman->id . '.pdf');
    }
}
