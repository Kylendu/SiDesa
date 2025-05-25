<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function storePengaduan(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'kategori' => 'required|in:umum,sosial,kesehatan,keamanan,kebersihan',
            'author' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:6048', // 5MB
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('pengaduan_img', 'public');
        }

        Information::create([
            'title' => $request->title,
            'content' => $request->content,
            'kategori' => $request->kategori,
            'author' => $request->author,
            'jenis' => 'pengaduan',
            'img' => $imgPath,
        ]);

        return response()->json(['message' => 'Pengaduan berhasil disimpan.']);
    }

    public function berita() {
        $berita = Information::where('jenis', 'berita')->get();
        return view('all.pages.berita', compact('berita'));
    }

}
