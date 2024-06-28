@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT KELAS</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/kelas/{{$kelasmahasiswas->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                            <label for="validationCustom01">Dosen</label>
                            <select  class="form-control  @error('user_id') is-invalid @enderror" value="{{old('user_id',$kelasmahasiswas->user)}}" name="user_id" required>
                                @foreach ($users as $user )
                                <option value="{{ $user->id }}">{{ $user->nama}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kode MK</label>
                            <input type="text" class="form-control  @error('kode_kelasmk') is-invalid @enderror" value="{{old('kode_kelasmk',$kelasmahasiswas->kode_kelasmk)}}" name="kode_kelasmk" required>
                            @error('kode_kelasmk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Prodi</label>
                            <input type="text" class="form-control  @error('prodi') is-invalid @enderror" value="{{old('prodi',$kelasmahasiswas->prodi)}}" name="prodi" required>
                            @error('prodi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kelas</label>
                            <input type="text" class="form-control  @error('kelas') is-invalid @enderror" value="{{old('kelas',$kelasmahasiswas->kelas)}}" name="kelas" required>
                            @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Mata Kuliah</label>
                            <select  class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id',$kelasmahasiswas->matakuilah)}}" name="mata_kuliah_id" required>
                                @foreach ($matakuliahs as $matakuliah )
                                <option value="{{ $matakuliah->id }}">{{ $matakuliah->matkul }}</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Kode MK</label>
                            <input type="text" class="form-control  @error('kodemk') is-invalid @enderror" value="{{old('kodemk',$kelasmahasiswas->kodemk)}}" name="kodemk" required>
                            @error('kodemk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">SKS MK</label>
                            <input type="text" class="form-control  @error('sksmk') is-invalid @enderror" value="{{old('sksmk',$kelasmahasiswas->sksmk)}}" name="sksmk" required>
                            @error('sksmk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror




                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/kelas" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
