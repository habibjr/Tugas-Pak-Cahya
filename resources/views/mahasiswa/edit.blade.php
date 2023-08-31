@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Data Mahasiswa</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" value="{{ $mahasiswa->nim }}" id="nim" class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="{{ $mahasiswa->nama }}" id="nama" class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" id="jurusan"
                        class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" value="{{ $mahasiswa->kelas }}" id="kelas" class="form-control"
                        required>
                </div>

                <div class="form-group">
                    <label for="matkul">Mata Kuliah</label>
                    <input type="text" name="matkul" value="{{ $mahasiswa->matkul }}" id="matkul"
                        class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="file">Tugas</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
