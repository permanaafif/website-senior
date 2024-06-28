@extends('layouts.main')
@section('menu', 'active')
@section('container')

    @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif
    @if (Auth::user()->role == 'admin')
        <a href="/kelas/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
    @endif
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">KELAS</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Dosen</th>
                                    <th>Kode Kelas</th>
                                    <th>Prodi</th>
                                    <th>Kelas</th>
                                    <th>Mata Kuliah</th>
                                    <th>Kode MK</th>
                                    <th>SKS MK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelasmahasiswas as $kelas_mahasiswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $kelas_mahasiswa->user->nama }}</td>
                                        <td>{{ $kelas_mahasiswa->kode_kelasmk }}</td>
                                        <td>{{ $kelas_mahasiswa->prodi }}</td>
                                        <td>{{ $kelas_mahasiswa->kelas }}</td>
                                        <td>{{ $kelas_mahasiswa->matakuliah->matkul }}</td>
                                        <td>{{ $kelas_mahasiswa->kodemk }}</td>
                                        <td>{{ $kelas_mahasiswa->sksmk }}</td>
                                        <td class="text-center">
                                            @if (Auth::user()->role == 'admin')
                                                <a href="/kelas/{{ $kelas_mahasiswa->id }}/edit"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>
                                                    Update</a>

                                                <form action="/kelas/{{ $kelas_mahasiswa->id }}" method="post"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm my-1"
                                                        onclick="return confirm('Yakin akan menghapus data')"><i
                                                            class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('kelas.show', [$kelas_mahasiswa->id, 'matakuliah' => $kelas_mahasiswa->matakuliah->id]) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-info-circle"></i> Detail
                                            </a>
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
