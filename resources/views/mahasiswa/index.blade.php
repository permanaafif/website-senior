@extends('layouts.main')
@section('menu', 'active')
@section('container')

    @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif
    <a href="/mahasiswa/create" class="btn btn-sm btn-primary"><i class="fas fa-arrow-down"></i> Insert</a>
    <form action="/mahasiswa" method="get">

        <div class="row my-3">
            <div class="col-lg-3">
                <select name="kelas_id" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->kode_kelasmk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg">
                <select name="mata_kuliah_id" class="form-control">
                    <option value="">Pilih Matakuliah</option>
                    @foreach ($matakuliah as $matakuliah)
                        <option value="{{ $matakuliah->id }}">{{ $matakuliah->matkul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg">
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
        </div>
    </form>


    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Mahasiswa</h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Mata Kuliah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->nobp }}</td>
                                        <td>{{ $mahasiswa->kelas->kode_kelasmk }}</td>
                                        <td>{{ $mahasiswa->matakuliah->matkul }}</td>
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
                                            <a href="/mahasiswa/{{ $mahasiswa->id }}/edit"
                                                class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>

                                            <form action="/mahasiswa/{{ $mahasiswa->id }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin akan menghapus data')"><i
                                                        class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Use the correct variable for pagination -->
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                    @if (isset($mahasiswas) && $mahasiswas instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $mahasiswas->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
