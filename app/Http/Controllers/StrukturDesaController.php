<?php

namespace App\Http\Controllers;
use App\Models\Struktur_desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StrukturDesaController extends Controller
{
    public function index()
    {
        $struktur = Struktur_desa::all();
        return view('all.layouts.heroAll', compact('struktur'));
    }
}
