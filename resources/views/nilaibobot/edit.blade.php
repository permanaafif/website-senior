@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT Pustaka</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/nilaibobot/{{$nilai_bobots->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{old('nama',$nilai_bobots->nama)}}" name="nama" required >
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Bobot Sikap</label>
                        <input type="text" class="form-control  @error('bobot_sikap') is-invalid @enderror" value="{{old('bobot_sikap',$nilai_bobots->bobot_sikap)}}" name="bobot_sikap" required >
                        @error('bobot_sikap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Bobot Tugas</label>
                        <input type="text" class="form-control  @error('bobot_tugas') is-invalid @enderror" value="{{old('bobot_tugas',$nilai_bobots->bobot_tugas)}}" name="bobot_tugas" required >
                        @error('bobot_tugas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Bobot Kompetensi</label>
                        <input type="text" class="form-control  @error('bobot_kompetensi') is-invalid @enderror" value="{{old('bobot_kompetensi',$nilai_bobots->bobot_kompetensi)}}" name="bobot_kompetensi" required >
                        @error('bobot_kompetensi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror




                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/nilaibobot" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
