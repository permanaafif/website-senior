@extends('layouts.main')
@section('menu', 'active')
@section('container')

@if (session()->has('pesan'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif
<a href="/tugas/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
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
                                <th>Tugas</th>
                                <th>Kuis</th>
                                <th>Uts</th>
                                <th>Uas</th>


                                <th>action</th>
                            </tr>
                        </thead>
                        <thead class="text-center">

                        <tbody>
                            @foreach ($tugas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration}}</td>
                                <td>{{ $item->tugas}}</td>
                                <td>{{ $item->kuis}}</td>
                                <td>{{ $item->uts}}</td>
                                <td>{{ $item->uas}}</td>


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
                                    <a href="/tugas/{{ $item->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>

                                    <form action="/tugas/{{ $item->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    <h2>Rata-rata Nilai Tugas:</h2>
                    <p>{{ $rataRataTugas }}</p>
                    <h2>Rata-rata Nilai Kuis:</h2>
                    <p>{{ $rataRataKuis }}</p>
                    <h2>Rata-rata Nilai UTS:</h2>
                    <p>{{ $rataRataUts }}</p>
                    <h2>Rata-rata Nilai UAS:</h2>
                    <p>{{ $rataRataUas }}</p>
                </div>
            </div>

            <!-- Use the correct variable for pagination -->
            <div  class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($nilais) && $nilais instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $nilais->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
