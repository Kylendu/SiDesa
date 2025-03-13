<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('admin.pages.resident.index', [
            'residents' => $residents
        ]);
    }

    public function create()
    {
        return view('admin.pages.resident.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required', 'min:16' , 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:255'],
            'religion' => ['required', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'accupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::create($validated);
        return redirect('/resident')->with('success', 'Berhasil menambahkan data');

    }

    public function update(Request $request, $id)
    {
        $ValidatedData = $request->validate([
            'nik' => ['required', 'min:16' , 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:255'],
            'religion' => ['required', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'accupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::findOrFail($id)->update($ValidatedData);
        return redirect('/resident')->with('success', 'Berhasil mengubah data');

    }
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('admin.pages.resident.edit', [
            'resident' => $resident,
        ]);
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }

    public function confirmDelete($id)
    {   
        $resident = Resident::findOrFail($id);
        return view('admin.pages.resident.confirmation-delete', compact('resident'));
    }

}
