@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif
<a href="/cpmk/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">CP Mata Kuliah</h5>

            <!-- Add the search form -->
            <form action="{{ route('cpmk.search') }}"method="get" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4 px-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by Judul">
                    <div class="input-group-append px-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>CP Prodi</th>
                                <th>Judul</th>
                                <th>Isi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cp_mks as $cp_mk)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $cp_mk->cplprodi->judul}}</td>
                                <td>{{ $cp_mk->judul}}</td>
                                <td>{{ $cp_mk->isijudul}}</td>

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
                                    <a href="/cpmk/{{ $cp_mk->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>

                                    <form action="/cpmk/{{ $cp_mk->id }}" method="post" class="d-inline">
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
                @if (isset($cp_mks) && $cp_mks instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $cp_mks->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
