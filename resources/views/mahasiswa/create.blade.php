@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <h2>Tambah Data Mahasiswa</h2>
    </div>
    <div class="card-body">
      <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="text" name="nim" id="nim" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" name="jurusan" id="jurusan" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="kelas">Kelas</label>
          <input type="text" name="kelas" id="kelas" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="matkul">Mata Kuliah</label>
          <input type="text" name="matkul" id="matkul" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="file">Tugas</label>
          <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
@endsection
