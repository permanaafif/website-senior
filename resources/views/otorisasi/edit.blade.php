@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT OTORISASI</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/otorisasi/{{$otorisasis->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Pengembang RPS</label>
                        <textarea type="textarea" class="form-control  @error('pe_rps') is-invalid @enderror" value="{{old('pe_rps',$otorisasis->pe_rps)}}" name="pe_rps" required ></textarea>
                        @error('pe_rps')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                        <label for="validationCustom01">Koordinator Program Studi</label>
                        <input type="text" class="form-control  @error('koprodi') is-invalid @enderror" value="{{old('koprodi',$otorisasis->koprodi)}}" name="koprodi" required >
                        @error('koprodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Ketua Jurusan</label>
                        <input type="text" class="form-control  @error('kajur') is-invalid @enderror" value="{{old('kajur',$otorisasis->kajur)}}" name="kajur" required >
                        @error('kajur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror


                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/otorisasi" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
