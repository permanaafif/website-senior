@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT Mahasiswa</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/mahasiswa/{{$mahasiswas->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{old('nama',$mahasiswas->nama)}}" name="nama" required >
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">NoBP</label>
                        <input type="text" class="form-control  @error('nobp') is-invalid @enderror" value="{{old('nobp',$mahasiswas->nobp)}}" name="nobp" required >
                        @error('nobp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        <label for="validationCustom01">Kelas</label>
                        <select  class="form-control  @error('kelas_id') is-invalid @enderror" value="{{old('kelas_id',$mahasiswas->kelasmahasiswa)}}" name="kelas_id" required>
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
                        <select  class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id',$mahasiswas->kelasmahasiswa)}}" name="mata_kuliah_id" required>
                            @foreach ($matakuliah as $kelas_mahasiswa )
                            <option value="{{ $kelas_mahasiswa->id }}">{{ $kelas_mahasiswa->matkul }}</option>
                            @endforeach
                        </select>
                        @error('mata_kuliah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        {{-- <label for="validationCustom01">Mata Kuliah</label>
                        <input type="text" class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id',$mahasiswas->mata_kuliah_id)}}" name="mata_kuliah_id" required >
                        @error('mata_kuliah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror --}}





                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/mahasiswa" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
