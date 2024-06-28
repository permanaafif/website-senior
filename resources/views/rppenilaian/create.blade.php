@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM Team Teaching</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rppenilaian" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Teknik</label>
                            <input type="text" class="form-control  @error('teknik') is-invalid @enderror" value="{{old('teknik')}}" name="teknik" required>
                            @error('teknik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Indikator</label>
                            <input type="text" class="form-control  @error('indikator') is-invalid @enderror" value="{{old('indikator')}}" name="indikator" required>
                            @error('indikator')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Bobot</label>
                            <input type="text" class="form-control  @error('bobot') is-invalid @enderror" value="{{old('bobot')}}" name="bobot" required>
                            @error('bobot')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/rppenilaian" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
