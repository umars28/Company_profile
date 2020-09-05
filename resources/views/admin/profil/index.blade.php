@extends('adminLayout.master')
@section('title')
    <title>Profil Admin</title>
@endsection
@section('content')
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
            <form method="post" action="{{ route('admin.profil.store', $user->id)}}" class="needs-validation" novalidate="">
                @csrf
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="col-md-6">
                            @if($message = session('message'))
                                <div class="row mt-0 ml-2">
                                    <div class="col-md-6">
                                        <h4 class="btn btn-danger">{{ $message }}</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="masukan nama" name="name" value="{{ $user->name }}" required="">
                                @if($error = $errors->first('name'))
                                    <p class="btn btn-danger mt-2">{{ $error }}</p>
                                @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="masukan email" required="">
                            @if($error = $errors->first('email'))
                                <p class="btn btn-danger mt-2">{{ $error }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="masukan password">
                            @if($error = $errors->first('password'))
                                <p class="btn btn-danger mt-2">{{ $error }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" name="konfirmasi_password" placeholder="konfirmasi password">
                            @if($error = $errors->first('konfirmasi_password'))
                                <p class="btn btn-danger mt-2">{{ $error }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
@endsection
