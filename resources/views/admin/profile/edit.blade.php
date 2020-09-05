@extends('adminLayout.master')
@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $profile->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $profile->name, old('name') }}" id="name" placeholder="Masukan Nama" required="">
                                    @if($error = $errors->first('name'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" name="position" value="{{ $profile->position, old('position') }}" id="position" placeholder="Masukan posisi" required="">
                                    @if($error = $errors->first('position'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                <div class="form-group">
                                    <img src="{{ $profile->image ? Storage::url('images/profile/'.$profile->image) : '' }}" class="img-responsive" width="20%" alt="{{ $profile->image }}">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image">
                                    @if($error = $errors->first('image'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.profile.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
