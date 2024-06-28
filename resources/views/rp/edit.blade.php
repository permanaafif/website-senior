@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">EDIT RPS</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rp/{{$rp->id}}" method="post">
                   @method('PATCH')
                   @csrf
                   <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <label for="validationCustom01">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id',$rp->mata_kuliah_id)}}" name="mata_kuliah_id" required >
                            @foreach ($mata_kuliahs as $mata_kuliah )
                            <option value="{{ $mata_kuliah->id }}">{{ $mata_kuliah->matkul }}</option>
                            @endforeach
                        </select>
                        @error('mata_kuliah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">Otorisasi</label>
                        <select name="otorisasi_id" class="form-control  @error('otorisasi_id') is-invalid @enderror" value="{{old('otorisasi_id',$rp->otorisasi_id)}}" name="otorisasi_id" required >
                            @foreach ($otorisasis as $otorisasi )
                            <option value="{{ $otorisasi->id }}">{{ $otorisasi->matkul }}</option>
                            @endforeach
                        </select>
                        @error('otorisasi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="validationCustom01">Capai Pembelajaran</label>
                        <select name="cpl_prodi_id" class="form-control  @error('cpl_prodi_id') is-invalid @enderror" value="{{old('cpl_prodi_id',$rp->cpl_prodi_id)}}" name="cpl_prodi_id" required >
                            @foreach ($cpl_prodis as $cpl_prodi )
                            <option value="{{ $cpl_prodi->id }}">{{ $cpl_prodi->matkul }}</option>
                            @endforeach
                        </select>
                        @error('cpl_prodi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Deskripsi Mata Kuliah</label>
                        <input type="text" class="form-control  @error('desc_matkul') is-invalid @enderror" value="{{old('desc_matkul',$rp->desc_matkul)}}" name="desc_matkul" required >
                        @error('desc_matkul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Deskripsi Bahan Kajian</label>
                        <input type="text" class="form-control  @error('desc_bk') is-invalid @enderror" value="{{old('desc_bk',$rp->desc_bk)}}" name="desc_bk" required >
                        @error('desc_bk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Capai Pembelajaran</label>
                        <select name="pustaka_id" class="form-control  @error('pustaka_id') is-invalid @enderror" value="{{old('pustaka_id',$rp->pustaka_id)}}" name="pustaka_id" required >
                            @foreach ($pustakas as $pustaka )
                            <option value="{{ $pustaka->id }}">{{ $pustaka->utama }}</option>
                            @endforeach
                        </select>
                        @error('pustaka_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">Capai Pembelajaran</label>
                        <select name="team_id" class="form-control  @error('team_id') is-invalid @enderror" value="{{old('team_id',$rp->team_id)}}" name="team_id" required >
                            @foreach ($teams as $team )
                            <option value="{{ $team->id }}">{{ $team->nama }}</option>
                            @endforeach
                        </select>
                        @error('team_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="validationCustom01">tanggal penyusunan</label>
                        <input type="date" class="form-control  @error('tgl_penyusunan') is-invalid @enderror" value="{{old('tgl_penyusunan',$rp->tgl_penyusunan)}}" name="tgl_penyusunan" required >
                        @error('tgl_penyusunan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror







                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                        <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-edit"> Update</i></button>
                        <a href="/rp" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
