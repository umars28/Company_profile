@extends('adminLayout.master')
@section('title')
    <title>Contact Us</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact Us</h1>
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
                        <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{--                            <div class="card-header">--}}
                            {{--                                <a href="#" class="btn btn-primary"></a>--}}
                            {{--                            </div>--}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="wa">Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" value="{{ $contact->whatsapp, old('whatsapp') }}" id="wa" placeholder="Masukan No. Whatsapp" required="">
                                    @if($error = $errors->first('whatsapp'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fb">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $contact->facebook, old('facebook') }}" id="fb" placeholder="Masukan Facebook" required="">
                                    @if($error = $errors->first('facebook'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tw">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $contact->twitter, old('twitter') }}" id="twitter" placeholder="Masukan Twitter" required="">
                                    @if($error = $errors->first('twitter'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ig">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $contact->instagram, old('instagram') }}" id="ig" placeholder="Masukan Instagram" required="">
                                    @if($error = $errors->first('instagram'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ig">Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ $contact->linkedin, old('linkedin') }}" id="ig" placeholder="Masukan Linkedin" required="">
                                    @if($error = $errors->first('linkedin'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ig">Github</label>
                                    <input type="text" class="form-control" name="github" value="{{ $contact->github, old('github') }}" id="ig" placeholder="Masukan Github" required="">
                                    @if($error = $errors->first('github'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="ig">email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $contact->email, old('email') }}" id="ig" placeholder="Masukan Email" required="">
                                    @if($error = $errors->first('email'))
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
