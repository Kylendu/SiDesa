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
        return view('all.layouts.appAll', compact('residents', 'headFamilies'));
    }
    
}
