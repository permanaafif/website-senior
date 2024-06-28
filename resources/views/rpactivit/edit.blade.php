@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT CPL PRODI</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rpactivit/{{$rp_activits->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Minggu</label>
                        <input type="text" class="form-control  @error('minggu') is-invalid @enderror" value="{{old('minggu',$rp_activits->minggu)}}" name="minggu" required >
                        @error('minggu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">SubCpmk</label>
                        <select class="form-control  @error('subcpmk_id') is-invalid @enderror" value="{{old('subcpmk_id',$rp_activits->subcpmk_id)}}" name="subcpmk_id" required >
                            @foreach ($subcpmks as $subcpmk )
                            <option value="{{ $subcpmk->id }}">{{ $subcpmk->matkul }}</option>
                            @endforeach
                        </select>
                        @error('subcpmk_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Bahan Kajian</label>
                        <input type="text" class="form-control  @error('bk_pemb') is-invalid @enderror" value="{{old('bk_pemb',$rp_activits->bk_pemb)}}" name="bk_pemb" required >
                        @error('bk_pemb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Metode Pembelajaran</label>
                        <input type="text" class="form-control  @error('mt_pemb') is-invalid @enderror" value="{{old('mt_pemb',$rp_activits->mt_pemb)}}" name="mt_pemb" required >
                        @error('mt_pemb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Waktu</label>
                        <select class="form-control  @error('wk_sk_id') is-invalid @enderror" value="{{old('wk_sk_id',$rp_activits->wk_sk_id)}}" name="wk_sk_id" required >
                            @foreach ($pustakas as $pustaka )
                            <option value="{{ $pustaka->id }}">{{ $pustaka->utama }}</option>
                            @endforeach
                        </select>
                        @error('wk_sk_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Penilaian</label>
                        <select class="form-control  @error('penialain_id') is-invalid @enderror" value="{{old('penialain_id',$rp_activits->penialain_id)}}" name="penialain_id" required >
                            @foreach ($pustakas as $pustaka )
                            <option value="{{ $pustaka->id }}">{{ $pustaka->utama }}</option>
                            @endforeach
                        </select>
                        @error('penialain_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror









                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/rpactivit" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
