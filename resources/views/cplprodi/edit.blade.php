@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT CP PRODI</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/cplprodi/{{$cpl_prodis->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Judul</label>
                        <input type="text" class="form-control  @error('judul') is-invalid @enderror" value="{{old('judul',$cpl_prodis->judul)}}" name="judul" required >
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Isi</label>
                        <input type="text" class="form-control  @error('isijudul') is-invalid @enderror" value="{{old('isijudul',$cpl_prodis->isijudul)}}" name="isijudul" required >
                        @error('isijudul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror






                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/cplprodi" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
