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
        // $berita = Information::where('jenis', 'berita')->get();
        // return view('all.pages.berita', compact('berita'));

        $berita = [
            [
                'title' => 'Pembersihan Sungai oleh Relawan',
                'content' => 'Relawan melakukan aksi bersih-bersih sungai untuk menjaga kebersihan lingkungan.',
                'img' => 'https://cdn.pixabay.com/photo/2018/09/21/07/07/e-commerce-3692440_1280.jpg',
                'author' => 'Admin',
                'kategori' => 'kebersihan',
            ],
            [
                'title' => 'Pemeriksaan Kesehatan Gratis',
                'content' => 'Puskesmas mengadakan pemeriksaan kesehatan gratis untuk masyarakat sekitar.',
                'img' => 'https://cdn.pixabay.com/photo/2018/09/21/07/07/e-commerce-3692440_1280.jpg',
                'author' => 'Dinas Kesehatan',
                'kategori' => 'kesehatan',
            ],
            [
                'title' => 'Sosialisasi Bahaya Narkoba',
                'content' => 'Acara sosialisasi diadakan oleh polisi terkait bahaya narkoba bagi generasi muda.',
                'img' => 'https://cdn.pixabay.com/photo/2018/09/21/07/07/e-commerce-3692440_1280.jpg',
                'author' => 'Polsek',
                'kategori' => 'keamanan',
            ],
        ];

        return view('all.pages.berita', compact('berita'));
    }

}
