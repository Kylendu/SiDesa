<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village_training;
use Illuminate\Support\Facades\Storage;


 // Assuming you have a model named Village_training

class Village_trainingController extends Controller
{
    public function index()
    {
        // Logic to display the list of village trainings
        $pelatihan = Village_training::all();
        return view('all.pages.pelatihan', compact('pelatihan'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $pelatihan = Village_training::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->get();

        return view('all.pages.pelatihan', compact('pelatihan'));
    }
}
