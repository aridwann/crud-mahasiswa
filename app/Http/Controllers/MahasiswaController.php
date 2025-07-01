<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function get() {
        $mahasiswa = Mahasiswa::orderBy('nim');

        if(request('search')){
            $mahasiswa->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('data-mahasiswa', ['mahasiswa' => $mahasiswa->get()]);
    }

    public function add(Request $request) {
        $fields = $request->validate([
            'nama' => ['required'],
            'nim' => ['required'],
            'kelas' => ['required'],
        ]);

        Mahasiswa::create($fields);

        return redirect('/')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function delete(Mahasiswa $mahasiswa){
        $mahasiswa->delete();

        return redirect('/')->with('success', 'Data mahasiswa berhasil dihapus');
    }

    public function setEdit(Mahasiswa $mahasiswa){
        return view('data-mahasiswa', ['isEdit' => true, 'emhs' => $mahasiswa, 'mahasiswa' => Mahasiswa::all()]);
    }

    public function edit(Mahasiswa $mahasiswa, Request $request) {
        $fields = $request->validate([
            'nama' => ['required'],
            'nim' => ['required'],
            'kelas' => ['required'],
        ]);

        $mahasiswa->update($fields);

        return redirect('/')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
}
