<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::orderBy('nim');
        
        if(request('search')){
            $mahasiswa->where('nama', 'like', '%' . request('search') . '%');
        }
        
        return view('index', ['mahasiswa' => $mahasiswa->paginate(5)->withQueryString()]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'nama' => 'required|',
            'nim' => 'required|numeric',
            'kelas' => 'required|uppercase',
        ]);

        Mahasiswa::create($fields);

        return redirect('/')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function destroy(Mahasiswa $mahasiswa){
        $mahasiswa->delete();

        return redirect('/')->with('success', 'Data mahasiswa berhasil dihapus');
    }

    public function edit(Mahasiswa $mahasiswa){
        return view('edit', ['mhs' => $mahasiswa]);
    }

    public function update(Mahasiswa $mahasiswa, Request $request) {
        $fields = $request->validate([
            'nama' => 'required|',
            'nim' => 'required|numeric',
            'kelas' => 'required|uppercase',
        ]);

        $mahasiswa->update($fields);

        return redirect('/')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
}
