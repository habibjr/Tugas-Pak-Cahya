@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h2>Data Tugas Mahasiswa
                </h2>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary ">Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>File Tugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $no => $m)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $m->nim }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>{{ $m->jurusan }}</td>
                            <td>{{ $m->kelas }}</td>
                            <td>{{ $m->matkul }}</td>
                            <td>
                                @if ($m->file)
                                    <a href="{{ asset('uploads/' . $m->file) }}">Download</a>
                                @else
                                    Belum mengumpulkan
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('hapus', $m->id) }}" class="btn btn-danger btn-sm"> Hapus
                                </a>
                                <a href="{{ url('edit', $m->id) }}" class="btn btn-info btn-sm"> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
