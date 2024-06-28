@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Mahasiswa</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/mahasiswa" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                            <label for="validationCustom01">Nama</label>
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{old('nama')}}" name="nama" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">NoBP</label>
                            <input type="text" class="form-control  @error('nobp') is-invalid @enderror" value="{{old('nobp')}}" name="nobp" required>
                            @error('nobp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kelas</label>
                            <select  class="form-control  @error('kelas_id') is-invalid @enderror" value="{{old('kelas_id')}}" name="kelas_id" required>
                                @foreach ($kelas_mahasiswas as $kelas_mahasiswa )
                                <option value="{{ $kelas_mahasiswa->id }}">{{ $kelas_mahasiswa->kode_kelasmk }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Mata Kuliah</label>
                            <select  class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id')}}" name="mata_kuliah_id" required>
                                @foreach ($matakuliah as $matakuliahs )
                                <option value="{{ $matakuliahs->id }}">{{ $matakuliahs->matkul }}</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/mahasiswa" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
