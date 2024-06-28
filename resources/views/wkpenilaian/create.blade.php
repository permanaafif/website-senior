@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM wkpenilaian Teaching</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/wksk" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">TM</label>
                            <input type="text" class="form-control  @error('tm') is-invalid @enderror" value="{{old('tm')}}" name="tm" required>
                            @error('tm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">TT&BM</label>
                            <input type="text" class="form-control  @error('tb') is-invalid @enderror" value="{{old('tb')}}" name="tb" required>
                            @error('tb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">PTK</label>
                            <input type="text" class="form-control  @error('ptk') is-invalid @enderror" value="{{old('ptk')}}" name="ptk" required>
                            @error('ptk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror







                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/wksk" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
