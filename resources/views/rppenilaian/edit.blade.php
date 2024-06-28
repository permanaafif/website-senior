@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT Team</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rppenilaian/{{$rp_penilaians->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <label for="validationCustom01">teknik</label>
                    <input type="text" class="form-control  @error('teknik') is-invalid @enderror" value="{{old('teknik',$rp_penilaians->teknik)}}" name="teknik" required >
                    @error('teknik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                    <label for="validationCustom01">indikator</label>
                    <input type="text" class="form-control  @error('indikator') is-invalid @enderror" value="{{old('indikator',$rp_penilaians->indikator)}}" name="indikator" required >
                    @error('indikator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                    @enderror
                    <label for="validationCustom01">bobot</label>
                    <input type="text" class="form-control  @error('bobot') is-invalid @enderror" value="{{old('bobot',$rp_penilaians->bobot)}}" name="bobot" required >
                    @error('bobot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror




                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/rppenilaian" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
