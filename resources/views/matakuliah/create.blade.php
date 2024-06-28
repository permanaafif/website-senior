@extends('layouts.main')
@section('menuSurat', 'active')
@section('container')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header text-center">FORM MATAKULIAH</h5>
                <div class="card-body">
                    <form class="needs-validation" action ="/matakuliah" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                                <label for="validationCustom01">Kode Mata Kuliah</label>
                                <input type="text" class="form-control  @error('kode_mk') is-invalid @enderror"
                                    value="{{ old('kode_mk') }}" name="kode_mk" required>
                                @error('kode_mk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="validationCustom01">Mata Kuliah</label>
                                <input type="text" class="form-control  @error('matkul') is-invalid @enderror"
                                    value="{{ old('matkul') }}" name="matkul" required>
                                @error('matkul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <label for="validationCustom01">User</label>
                            <select  class="form-control  @error('user') is-invalid @enderror" value="{{old('user')}}" name="user" required>
                                @foreach ($user as $users)
                                <option value="{{ $users->id }}">{{ $users->nama }}</option>
                                @endforeach
                            </select>
                            @error('user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror --}}

                                <label for="validationCustom01">Jurusan</label>
                                <select name="jurusan_id" class="form-control">
                                    <option value="" selected>Pilih Jurusan</option>
                                    @foreach ($jurusans as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jurusan }}</option>
                                    @endforeach
                                </select>

                                <label for="validationCustom01">Program Studi</label>
                                <select name="prodi_id" class="form-control">
                                    <option value="" selected>Pilih Prodi</option>
                                    @foreach ($prodis as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                                    @endforeach
                                </select>

                                <div class="mb-3">
                                    <label for="validationCustom01">Dosen</label>
                                    <select name="dosen_id" class="form-control">
                                        <option value="" selected>Pilih Dosen</option>
                                        @foreach ($dosens as $data)
                                            <option value="{{ $data->id }}">{{ $data->user->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="validationCustom01">Semester</label>
                                <input type="text" class="form-control  @error('semester') is-invalid @enderror"
                                    value="{{ old('semester') }}" name="semester" required>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <label for="validationCustom01">SKS</label>
                                <input type="text" class="form-control  @error('sks') is-invalid @enderror"
                                    value="{{ old('sks') }}" name="sks" required>
                                @error('sks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror







                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit"><i
                                            class=" fas fa-save"></i>Submit</button>
                                    <a href="/matakuliah" class="btn btn-danger btn-sm"><i class=" fas fa-reply">
                                        </i>Back</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
