<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service_document;

class ServiceDocumentController extends Controller
{

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

    public function index()
    {
        $documents = Service_document::all();
        return view('all.pages.layananDokumen', compact('documents'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $documents = Service_document::where('surat', 'like', '%' . $request->search . '%')
            ->orWhere('keterangan', 'like', '%' . $request->search . '%')
            ->get();

        return view('all.pages.layananDokumen', compact('documents'));
    }
    public function download($id)
    {
        $document = Service_document::findOrFail($id);
        return response()->download(storage_path('app/public/' . $document->file_path));
    }


}
