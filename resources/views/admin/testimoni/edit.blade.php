@extends('adminLayout.master')
@section('title')
    <title>Testimoni</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Testimoni</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $testimoni->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $testimoni->name }}" id="name" required="" disabled>
                                    @if($error = $errors->first('name'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="quote">Quote</label>
                                    <input type="text" class="form-control" name="quote" value="{{ $testimoni->quote }}" id="quote" required="" disabled>
                                    @if($error = $errors->first('quote'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @if(!empty($testimoni->job))
                                <div class="form-group">
                                    <label for="job">Job</label>
                                    <input type="text" class="form-control" name="job" value="{{ $testimoni->job }}" id="job" disabled>
                                    @if($error = $errors->first('name'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @endif
                                @if(!empty($testimoni->company))
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" name="company" value="{{ $testimoni->company }}" id="company" disabled>
                                    @if($error = $errors->first('company'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="ACTIVE" {{ $testimoni->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                                        <option value="INACTIVE" {{ $testimoni->status == 'INACTIVE' ? 'selected' : '' }}>INACTIVE</option>
                                    </select>
                                    @if($error = $errors->first('status'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @if(!empty($testimoni->image))
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $testimoni->image ? Storage::url('images/testimoni/'.$testimoni->image) : '' }}" class="img-responsive" width="25%" alt="{{ $testimoni->image }}">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" disabled>
                                    @if($error = $errors->first('image'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.testimoni.index') }}" class="btn btn-danger ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
