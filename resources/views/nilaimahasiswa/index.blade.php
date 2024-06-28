@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif
<a href="/nilaimahasiswa/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">SKS</h5>

            <!-- Add the search form -->
            {{-- <form action="{{ route('mahasiswa.search') }}"method="get" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4 px-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name">
                    <div class="input-group-append px-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form> --}}

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>nama</th>
                                <th>mata kuliah</th>
                                <th>sikap</th>
                                <th>tugas</th>
                                <th>kompetensi</th>
                                <th>bobot</th>
                                <th>nilai akhir</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai_mahasiswas as $nilai_mahasiswa)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $nilai_mahasiswa->mahasiswa->nama}}</td>
                                <td>{{ $nilai_mahasiswa->nilaibobot->matakuliah->matkul}}</td>
                                <td>{{ $nilai_mahasiswa->sikap}}</td>
                                <td>{{ $nilai_mahasiswa->tugas}}</td>
                                <td>{{ $nilai_mahasiswa->kompetensi}}</td>
                                <td>{{ $nilai_mahasiswa->bobot}}</td>
                                <td>{{ $nilai_mahasiswa->nilai_akhir}}</td>
                                {{-- <td>{{ $pengajuan->nik}}</td>
                                <td>{{ $pengajuan->phone}}</td>
                                <td>
                                    @if ($pengajuan->kategori)
                                        {{ $pengajuan->kategori->nama_kategori_surat }}
                                    @else
                                        Kategori tidak ditemukan
                                    @endif
                                </td>
                                <td>
                                    @if ($pengajuan->surat)
                                        {{ $pengajuan->surat->nama_surat }}
                                    @else
                                        Nama Surat tidak ditemukan
                                    @endif
                                </td> --}}
                                <td class="text-center">
                                    <a href="/nilaimahasiswa/{{ $nilai_mahasiswa->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>

                                    <form action="/nilaimahasiswa/{{ $nilai_mahasiswa->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Use the correct variable for pagination -->
            <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($nilai_mahasiswas) && $nilai_mahasiswas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $nilai_mahasiswas->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
