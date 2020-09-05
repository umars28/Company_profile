@extends('adminLayout.master')
@section('title')
    <title>Service</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Service</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $service->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $service->title, old('title') }}" id="title" placeholder="Masukan judul" required="">
                                    @if($error = $errors->first('title'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control js-summernote" id="description" name="description">{{ $service->description }}</textarea>
                                    @if($error = $errors->first('description'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="ACTIVE" {{ $service->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                                        <option value="INACTIVE" {{ $service->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                                    </select>
                                    @if($error = $errors->first('status'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $service->image ? Storage::url('images/services/'.$service->image) : '' }}" class="img-responsive" width="25%" alt="{{ $service->image }}">
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
                                <a href="{{ route('admin.service.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
