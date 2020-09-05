@extends('adminLayout.master')
@section('title')
    <title>Portofolio</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Portofolio</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $portofolio->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $portofolio->title, old('title') }}" id="title" placeholder="Masukan judul" required="">
                                    @if($error = $errors->first('title'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control js-summernote" id="description" name="description">{{ $portofolio->description }}</textarea>
                                    @if($error = $errors->first('description'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $portofolio->image ? Storage::url('images/portfolio/'.$portofolio->image) : '' }}" class="img-responsive" width="25%" alt="{{ $portofolio->image }}">
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
                                <a href="{{ route('admin.portofolio.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
