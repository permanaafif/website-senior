@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT Pustaka</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/pustaka/{{$pustakas->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Utama</label>
                        <input type="text" class="form-control  @error('utama') is-invalid @enderror" value="{{old('utama',$pustakas->utama)}}" name="utama" required >
                        @error('utama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Pendukung</label>
                        <input type="text" class="form-control  @error('pendukung') is-invalid @enderror" value="{{old('pendukung',$pustakas->pendukung)}}" name="pendukung" required >
                        @error('pendukung')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror




                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/pustaka" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
