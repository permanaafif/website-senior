
@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM RPS</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/rp" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Mata Kuliah </label>
                            <select class="form-control  @error('mata_kuliah_id') is-invalid @enderror" value="{{old('mata_kuliah_id')}}" name="mata_kuliah_id" required>
                                @foreach ($mata_kuliahs as $mata_kuliah )
                                <option value="{{ $mata_kuliah->id }}">{{ $mata_kuliah->matkul }}</option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="validationCustom01">Mata Kuliah </label>
                            <select class="form-control  @error('sks') is-invalid @enderror" value="{{old('sks')}}" name="sks" required>
                                @foreach ($mata_kuliahs as $mata_kuliah )
                                <option value="{{ $mata_kuliah->id }}">{{ $mata_kuliah->sks }}</option>
                                @endforeach
                            </select>
                            @error('sks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Otorisasi </label>
                            <select  class="form-control  @error('otorisasi_id') is-invalid @enderror" value="{{old('otorisasi_id')}}" name="otorisasi_id" required>
                                @foreach ($otorisasis as $otorisasi )
                                <option value="{{ $otorisasi->id }}">{{ $otorisasi->pe_rps }}</option>
                                @endforeach
                            </select>
                            @error('otorisasi_id')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Capai Pembelajaran </label>
                            <select  class="form-control  @error('cpl_prodi_id') is-invalid @enderror" value="{{old('cpl_prodi_id')}}" name="cpl_prodi_id" required>
                                @foreach ($cpl_prodis as $cpl_prodi )
                                <option value="{{ $cpl_prodi->id }}">{{ $cpl_prodi->judul }}</option>
                                @endforeach
                            </select>
                            @error('cpl_prodi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Deskripsi Mata Kuliah</label>
                            <textarea id="summernote"  class="form-control  @error('desc_matkul') is-invalid @enderror" value="{{old('desc_matkul')}}" name="desc_matkul" required></textarea>
                            @error('desc_matkul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Deskripsi Bahan Kajian</label>
                            <textarea id="summernote"  class="form-control  @error('desc_bk') is-invalid @enderror" value="{{old('desc_bk')}}" name="desc_bk" required></textarea>
                            @error('desc_bk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Pustaka </label>
                            <select  class="form-control  @error('pustaka_id') is-invalid @enderror" value="{{old('pustaka_id')}}" name="pustaka_id" required>
                                @foreach ($pustakas as $pustaka )
                                <option value="{{ $pustaka->id }}">{{ $pustaka->utama }}</option>
                                @endforeach
                            </select>
                            @error('pustaka_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Team Teaching </label>
                            <select class="form-control  @error('team_id') is-invalid @enderror" value="{{old('team_id')}}" name="team_id" required>
                                @foreach ($teams as $team )
                                <option value="{{ $team->id }}">{{ $team->nama }}</option>
                                @endforeach
                            </select>
                            @error('team_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Tanggal Penyusunan</label>
                            <input type="date" class="form-control  @error('tgl_penyusunan') is-invalid @enderror" value="{{old('tgl_penyusunan')}}" name="tgl_penyusunan" required>
                            @error('tgl_penyusunan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror






                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/rp" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
