@extends('adminLayout.master')
@section('title')
    <title>Article</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Article</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Masukan judul" required="">
                                    @if($error = $errors->first('title'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control js-summernote" id="description" name="description"></textarea>
                                    @if($error = $errors->first('description'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slug">Article Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="slug" placeholder="Masukan Article Slug" required="">
                                    @if($error = $errors->first('slug'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category" required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category, old('category') }}</option>
                                        @endforeach
                                    </select>
                                    @if($error = $errors->first('category'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="ACTIVE" {{ old('status') }}>ACTIVE</option>
                                        <option value="INACTIVE" {{ old('status') }}>INACTIVE</option>
                                    </select>
                                    @if($error = $errors->first('status'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($error = $errors->first('image'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Add</button>
                                <a href="{{ route('admin.article.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
