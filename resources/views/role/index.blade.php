@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif
{{-- @if (auth()->user()->can('create role '))

<a href="/rp/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
@endif --}}
@can('create role')
<a href="/rp/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
@endcan

<a href="{{ route('cetak_pdf') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>

<div class="row mt-4">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">SKS</h5>

            <!-- Add the search form -->
            {{-- <form action="{{ route('rps.search') }}"method="get" class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4 px-4">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name">
                    <div class="input-group-append px-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form> --}}

            {{-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>Otorisasi</th>
                                <th>Capai Pembelajaran</th>
                                <th>Deskripsi Matkul</th>
                                <th>Deskripsi Bahan Kajian</th>
                                <th>Pustaka</th>
                                <th>Team Teaching</th>
                                <th>Tanggal Penyusunan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rps as $rp) --}}
                            {{-- @php
                                dd($rp->mata_kuliah_id->matkul)
                            @endphp --}}
                            {{-- <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>

                                <td>{{ $rp->matakuliah->matkul}}</td>
                                <td>{{ $rp->otorisasi->pe_rps}}</td>
                                <td>{{ $rp->cplprodi->judul}}</td>
                                <td>{{ $rp->desc_matkul}}</td>
                                <td>{{ $rp->desc_bk}}</td>
                                <td>{{ $rp->pustaka->utama}}</td>
                                <td>{{ $rp->team->nama}}</td>
                                <td>{{ $rp->tgl_penyusunan}}</td> --}}

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
                                {{-- <td class="text-center">
                                    <a href="/rp/{{ $rp->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>
                                    <a href="{{ route('rp.cetakrp', $rp->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Pratinjau PDF</a>

                                    <form action="/rp/{{ $rp->id }}" method="post" class="d-inline">
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
            </div> --}}

            <!-- Use the correct variable for pagination -->
            {{-- <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($rps) && $rps instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $rps->links('pagination::bootstrap-5') }}
                @endif
            </div> --}}
        </div>
    </div>
</div>
@endsection
