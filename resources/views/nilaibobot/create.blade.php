@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM nilaibobots</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/nilaibobot" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">


                            <label for="validationCustom01">Bobot tugas</label>
                            <input type="number" class="form-control  @error('bobottugas') is-invalid @enderror" value="{{old('bobottugas')}}" name="bobottugas" required>
                            @error('bobottugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Bobot Tugas</label>
                            <input type="number" class="form-control  @error('bobotkuis') is-invalid @enderror" value="{{old('bobotkuis')}}" name="bobotkuis" required>
                            @error('bobotkuis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Bobot Uts</label>
                            <input type="number" class="form-control  @error('bobotuts') is-invalid @enderror" value="{{old('bobotuts')}}" name="bobotuts" required>
                            @error('bobotuts')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">Bobot Uas</label>
                            <input type="number" class="form-control  @error('bobotuas') is-invalid @enderror" value="{{old('bobotuas')}}" name="bobotuas" required>
                            @error('bobotuas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/nilaibobot" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
