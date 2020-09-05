@extends('adminLayout.master')
@section('title')
    <title>Setting</title>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setting</h1>
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

                        <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Website Title</label>
                                    <input type="text" class="form-control" name="website_title" value="{{ config('web_config')['WEBSITE_TITLE'] }}" id="title" placeholder="Masukan judul website" required="">
                                    @if($error = $errors->first('website_title'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Logo Website</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['WEBSITE_LOGO'] ? Storage::url('images/setting/'.config('web_config')['WEBSITE_LOGO']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="website_logo">
                                    @if($error = $errors->first('website_logo'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Favicon Website</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['WEBSITE_FAVICON'] ? Storage::url('images/setting/'.config('web_config')['WEBSITE_FAVICON']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="website_favicon">
                                    @if($error = $errors->first('website_favicon'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Slider 1</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['SLIDER_1'] ? Storage::url('images/setting/'.config('web_config')['SLIDER_1']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="slider_1">
                                    @if($error = $errors->first('slider_1'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Slider 2</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['SLIDER_2'] ? Storage::url('images/setting/'.config('web_config')['SLIDER_2']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="slider_2">
                                    @if($error = $errors->first('slider_2'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Slider 3</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['SLIDER_3'] ? Storage::url('images/setting/'.config('web_config')['SLIDER_3']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="slider_3">
                                    @if($error = $errors->first('slider_3'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Slider</label>
                                    <input type="text" class="form-control" name="text_title" value="{{ config('web_config')['TEXT_TITLE'] }}" id="title" placeholder="Masukan judul slider" required="">
                                    @if($error = $errors->first('text_title'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="text_description_1">Deskripsi Slide 1</label>
                                    <textarea class="form-control js-summernote" id="text_description_1" name="text_description_1">{{ config('web_config')['TEXT_DESCRIPTION_1'] }}</textarea>
                                    @if($error = $errors->first('text_description_1'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="text_description_2">Deskripsi Slide 2</label>
                                    <textarea class="form-control js-summernote" id="text_description_2" name="text_description_2">{{ config('web_config')['TEXT_DESCRIPTION_2'] }}</textarea>
                                    @if($error = $errors->first('text_description_2'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="text_description_3">Deskripsi Slide 3</label>
                                    <textarea class="form-control js-summernote" id="text_description_3" name="text_description_3">{{ config('web_config')['TEXT_DESCRIPTION_3'] }}</textarea>
                                    @if($error = $errors->first('text_description_3'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Gambar Background Login</label>
                                </div>
                                <div class="form-group">
                                    <img src="{{ config('web_config')['IMAGE_LOGIN'] ? Storage::url('images/setting/'.config('web_config')['IMAGE_LOGIN']) : '' }}" class="img-responsive" width="25%" alt="">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image_login">
                                    @if($error = $errors->first('image_login'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slug">Kota Asal Gambar</label>
                                    <input type="text" class="form-control" name="image_login_city" value="{{ config('web_config')['IMAGE_LOGIN_CITY'] }}" id="slug" placeholder="Masukan Kota Asal Gambar" required="">
                                    @if($error = $errors->first('image_login_city'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="slug">Negara Asal Gambar</label>
                                    <input type="text" class="form-control" name="image_login_country" value="{{ config('web_config')['IMAGE_LOGIN_COUNTRY'] }}" id="slug" placeholder="Masukan Negara Asal Gambar" required="">
                                    @if($error = $errors->first('image_login_country'))
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
