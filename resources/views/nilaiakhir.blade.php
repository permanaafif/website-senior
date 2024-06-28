@extends('layouts.main')
@section('menu', 'active')
@section('container')

    @if (session()->has('pesan'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i> {{ session('pesan') }}
        </div>
    @endif

    <form action="/nilaiakhir" method="get">

        <div class="row">
            <div class="col-lg-5">
                <select name="mata_kuliah_id" class="form-control">
                    <option value="">Pilih Matakuliah</option>
                    @foreach ($matakuliah as $matakuliah_data)
                        <option value="{{ $matakuliah_data->id }}">{{ $matakuliah_data->matkul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-">
                <button type="submit" class="btn btn-info">Cari</button>
            </div>
        </div>
    </form>

    <div class="row mt-3">
        <div class="col-lg">
            <a href="{{ route('cetaknilaiakhirpreview') }}" class="btn btn-success"><i class="fas fa-eye"></i>
                Pratinjau
                PDF</a>
            <a href="{{ route('cetaknilaiakhir') }}" class="btn btn-warning" target="_blank">CETAK PDF</a>
            <a href="{{ route('exportnilaiakhir') }}" class="btn btn-primary" target="_blank">CETAK CSV</a>

            {{-- <a href="{{ route('exportnilaiakhir') }}" class="btn btn-primary" target="_blank">CETAK CSV</a> --}}
            {{-- @if (isset($matakuliahId))
            <a href="{{ route('exportnilaiakhir', ['matakuliahId' => $matakuliahId]) }}" class="btn btn-primary" target="_blank">CETAK CSV</a>
        @else
            <span class="btn btn-primary disabled">CETAK CSV</span>
        @endif --}}

        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header text-center">Rata Rata</h5>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Mahasiswa</th>
                                    <th>Kompetensi</th>
                                    <th>Sikap</th>
                                    <th>Tugas</th>
                                    <th>Nilai Akhir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($nilaiakhir as $nilai)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $nilai->mahasiswa->nama }}</td>
                                        <td>{{ $nilai->kompetensi }}</td>
                                        <td>{{ $nilai->sikap }}</td>
                                        <td>{{ $nilai->tugas }}</td>
                                        <td>{{ $nilai->nilaiakhir }}</td>

                                        <td class="text-center">

                                            {{-- <a href="/nilairata/{{ $nilai->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Update</a>  --}}

                                            <form action="/nilaiakhir/{{ $nilai->id }}" method="post" class="d-inline">
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

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form id="form_create_nilaiakhir">
                                            {{-- <input type="hidden" name="mahasiswa_id" id="mahasiswa_id" value="{{ $id }}"> --}}

                                            <label for="validationCustom01">Mahasiswa </label>
                                            <select class="form-control  @error('mahasiswa_id') is-invalid @enderror"
                                                value="{{ old('mahasiswa_id') }}" name="mahasiswa_id" id="mahasiswa_nama"
                                                required>
                                                <option value="" disabled selected>Nama</option>
                                                @foreach ($mahasiswa as $nilai)
                                                    <option value="{{ $nilai->id }}">{{ $nilai->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('mahasiswa_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <label for="validationCustom01">Matakuliah </label>
                                            <select class="form-control  @error('mata_kuliah_id') is-invalid @enderror"
                                                value="{{ old('mata_kuliah_id') }}" name="mata_kuliah_id"
                                                id="mata_kuliah_id" required>
                                                <option value="" disabled selected>Nama</option>
                                                @foreach ($matakuliah as $nilai)
                                                    <option value="{{ $nilai->id }}">{{ $nilai->matkul }}</option>
                                                @endforeach
                                            </select>
                                            @error('mata_kuliah_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror


                                            <label for="validationCustom01">Kompetensi </label>
                                            <select class="form-control  @error('kompetensi') is-invalid @enderror"
                                                value="{{ old('kompetensi') }}" name="kompetensi" id="kompeten" required>
                                                <option value="" disabled selected>Nilai</option>
                                            </select>
                                            @error('kompetensi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="validationCustom01">sikap </label>
                                            <select class="form-control  @error('sikap') is-invalid @enderror"
                                                value="{{ old('sikap') }}" name="sikap" id="sikap" required>
                                                <option value="" disabled selected>Nilai</option>
                                            </select>
                                            @error('sikap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="validationCustom01">tugas </label>
                                            <select class="form-control  @error('tugas') is-invalid @enderror"
                                                value="{{ old('tugas') }}" name="tugas" id="tugas" required>
                                                <option value="" disabled selected>Nilai</option>
                                            </select>
                                            @error('tugas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <label for="validationCustom01">Nilai Akhir</label>

                                            <input type="number"
                                                class="form-control  @error('nilaiakhir') is-invalid @enderror"
                                                value="{{ old('nilaiakhir') }}" name="nilaiakhir" id="nilaiakhir">
                                            @error('nilaiakhir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>



                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @if (Auth::user()->role == 'dosen' || Auth::user()->role == 'admin')
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalLong">
                            Tambah Nilai
                        </button>
                    @endif
                </div>
            </div>

            <!-- Use the correct variable for pagination -->
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-2 px-4">
                @if (isset($nilai) && $nilai instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $nilai->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>

@endsection
