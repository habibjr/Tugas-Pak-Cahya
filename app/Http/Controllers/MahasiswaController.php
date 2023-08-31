<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'matkul' => 'required',
            'file' => 'required|mimes:pdf,docx'
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'matkul' => $request->matkul,
            'file' => $fileName
        ]);

        // dd($request);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->matkul = $request->matkul;

        if ($request->hasFile('file')) {
            
            if ($mahasiswa->file) {
                Storage::delete('public/uploads/' . $mahasiswa->file);
            }

        // Upload file tugas dan simpan ke dalam folder yang diinginkan
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalExtension();
            $file->move('public/tugas', $fileName);
            $mahasiswa->file = $fileName;
    }

    $mahasiswa->save();

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
        
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
