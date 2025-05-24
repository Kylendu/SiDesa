<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service_document;

class ServiceDocumentController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'surat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    
        $path = $request->file('file_path')->store('dokumen', 'public');
    
        $data = new Service_document();
        $data->surat = $request->surat;
        $data->keterangan = $request->keterangan;
        $data->file_path = $path;
        $data->save();
    
        return response()->json(['message' => 'File uploaded successfully']);
    }


}
