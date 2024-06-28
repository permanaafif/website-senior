@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Pustakas</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/pustaka" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Utama</label>
                            <input type="text" class="form-control  @error('utama') is-invalid @enderror" value="{{old('utama')}}" name="utama" required>
                            @error('utama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Pendukung</label>
                            <input type="text" class="form-control  @error('pendukung') is-invalid @enderror" value="{{old('pendukung')}}" name="pendukung" required>
                            @error('pendukung')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/pustaka" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
