@extends('layouts.main')
@section('menu', 'active')
@section('container')

    @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif
    @if (Auth::user()->role == 'admin')
        <a href="/matakuliah/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
    @endif
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Mata Kuliah</h5>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matkul</th>
                                    <th>Mata Kuliah</th>
                                    <th>Jurusan</th>
                                    <th>Prodi</th>
                                    <th>Dosen</th>
                                    <th>Semester</th>
                                    <th>Sks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matakuliah as $matkull)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $matkull->kode_mk }}</td>
                                        <td>{{ $matkull->matkul }}</td>
                                        <td>{{ $matkull->jurusan->nama_jurusan ?? '-' }}</td>
                                        <td>{{ $matkull->prodi->nama_prodi ?? '-' }}</td>
                                        <td>{{ $matkull->dosen->user->nama ?? '-' }}</td>
                                        <td>{{ $matkull->semester }}</td>
                                        <td>{{ $matkull->sks }}</td>

                                        <td class="text-center">
                                            @if (Auth::user()->role == 'admin')
                                                <a href="/matakuliah/{{ $matkull->id }}/edit"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>
                                                    Update</a>

                                                <form action="/matakuliah/{{ $matkull->id }}" method="post"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin akan menghapus data')"><i
                                                            class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
