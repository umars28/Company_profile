@extends('adminLayout.master')
@section('title')
    <title>Category</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" name="category" value="{{ $category->category }}" placeholder="Masukan Category" required="">
                                    @if($error = $errors->first('category'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" aria-describedby="status" placeholder="Select status">
                                        <option value="ACTIVE" {{ $category->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                                        <option value="INACTIVE" {{ $category->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                                    </select>
                                    @if($error = $errors->first('status'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Add</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
