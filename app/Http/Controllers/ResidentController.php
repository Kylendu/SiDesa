<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    function count()
    {
        $residents = Resident::count();
        $headFamilies = Resident::distinct('card_family_id')->count('card_family_id');
        $ketikan = implode(['Ketik1 ', 'Ketik2 ', 'Ketik3 ']);
        return view('all.layouts.appAll', compact('residents', 'headFamilies', 'ketikan'));
    }
    
}
