<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\Struktur_desa;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $residents = Resident::count();
        $headFamilies = Resident::distinct('card_family_id')->count('card_family_id');
        $male = Resident::where('gender', 'male')->count();
        $female = Resident::where('gender', 'female')->count();

        $belumKawin = Resident::where('marital_status', 'single')->count();
        $kawin = Resident::where('marital_status', 'married')->count();
        $ceraiMati = Resident::where('marital_status', 'divorced')->count();
        $ceraiHidup = Resident::where('marital_status', 'widowed')->count();

        // Data agama
        $islam = Resident::where('religion', 'Islam')->count();
        $kristen = Resident::where('religion', 'Kristen')->count();
        $katolik = Resident::where('religion', 'Katolik')->count();
        $hindu = Resident::where('religion', 'Hindu')->count();
        $buddha = Resident::where('religion', 'Buddha')->count();
        $konghucu = Resident::where('religion', 'Konghucu')->count();


        // struktur desa
        $struktur = Struktur_desa::all();


        return view('all.layouts.heroAll', compact(
            'residents',
            'headFamilies',
            'male',
            'female',
            'belumKawin',
            'kawin',
            'ceraiMati',
            'ceraiHidup','islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu', 'struktur'
        ));
    }
}
