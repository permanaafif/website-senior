@extends('layouts.main')
@section('menuSurat', 'active')
@section('container')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header text-center">EDIT MATA KULIAH</h5>
                <div class="card-body">
                    <form class="needs-validation" action ="/matakuliah/{{ $mata_kuliahs->id }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                <label for="validationCustom01">Kode Mata Kuliah</label>
                                <input type="text" class="form-control  @error('kode_mk') is-invalid @enderror"
                                    value="{{ old('kode_mk', $mata_kuliahs->kode_mk) }}" name="kode_mk" required>
                                @error('kode_mk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="validationCustom01">Mata Kuliah</label>
                                <input type="text" class="form-control  @error('matkul') is-invalid @enderror"
                                    value="{{ old('matkul', $mata_kuliahs->matkul) }}" name="matkul" required>
                                @error('matkul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="validationCustom01">Jurusan</label>
                                <select name="jurusan_id" class="form-control">
                                    <option value="" selected>Pilih Jurusan</option>
                                    @foreach ($jurusans as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $mata_kuliahs->jurusan_id ? 'selected' : '' }}>
                                            {{ $data->nama_jurusan }}</option>
                                    @endforeach
                                </select>

                                <label for="validationCustom01">Program Studi</label>
                                <select name="prodi_id" class="form-control">
                                    <option value="" selected>Pilih Prodi</option>
                                    @foreach ($prodis as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $mata_kuliahs->prodi_id ? 'selected' : '' }}>
                                            {{ $data->nama_prodi }}</option>
                                    @endforeach
                                </select>

                                <div class="mb-3">
                                    <label for="validationCustom01">Dosen</label>
                                    <select name="dosen_id" class="form-control">
                                        <option value="" selected>Pilih Prodi</option>
                                        @foreach ($dosens as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $mata_kuliahs->dosen_id ? 'selected' : '' }}>
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="validationCustom01">Semester</label>
                                <input type="text" class="form-control  @error('semester') is-invalid @enderror"
                                    value="{{ old('semester', $mata_kuliahs->semester) }}" name="semester" required>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="validationCustom01">SKS</label>
                                <input type="text" class="form-control  @error('sks') is-invalid @enderror"
                                    value="{{ old('sks', $mata_kuliahs->sks) }}" name="sks" required>
                                @error('sks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror




                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                                <button class="btn btn-primary btn-sm" type="submit" name="submit"><i
                                        class=" fas fa-edit"> Update</i></button>
                                <a href="/matakuliah" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
