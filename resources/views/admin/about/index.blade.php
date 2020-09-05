@extends('adminLayout.master')
@section('title')
    <title>About</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @if($message = session('message'))
                        <div class="row mt-3 ml-3">
                            <div class="col-md-6">
                                <h4 class="btn btn-primary">{{ $message }}</h4>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
{{--                            <div class="card-header">--}}
{{--                                <a href="#" class="btn btn-primary"></a>--}}
{{--                            </div>--}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control js-summernote" name="description">{{ $about->description, old('description') }}</textarea>
                                    @if($error = $errors->first('description'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $about->image ? Storage::url('images/about/'.$about->image) : '' }}" class="img-responsive" width="25%">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                                    @if($error = $errors->first('image'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
