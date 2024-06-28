@extends('layouts.main')
@section('menuSurat','active')
@section('container')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header text-center">FORM USER</h5>
            <div class="card-body">
                <form class="needs-validation" action ="/user" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <label for="validationCustom01">Name</label>
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{old('nama')}}" name="nama" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Nip</label>
                            <input type="text" class="form-control  @error('nip') is-invalid @enderror" value="{{old('nip')}}" name="nip" required>
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Role</label>
                            <select class="form-control @error('role') is-invalid @enderror" value="{{old('role')}}" name="role" required>
                                <option value="">--pilih role</option>
                                <option value="admin">Admin</option>
                                <option value="dosen">Dosen</option>
                                <option value="kaprodi">Kaprodi</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="validationCustom01">Password</label>
                            <input type="text" class="form-control  @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ">
                            <button class="btn btn-primary btn-sm" type="submit" name="submit"><i class=" fas fa-save"> Submit</i></button>
                             <a href="/user" class="btn btn-primary btn-sm"><i class=" fas fa-reply"> Back</i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

