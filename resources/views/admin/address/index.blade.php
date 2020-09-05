@extends('adminLayout.master')
@section('title')
    <title>Address</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Address</h1>
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
                        <form action="{{ route('admin.address.update', $address->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{--                            <div class="card-header">--}}
                            {{--                                <a href="#" class="btn btn-primary"></a>--}}
                            {{--                            </div>--}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $address->adress, old('address') }}" id="address" placeholder="Masukan Alamat" required="">
                                    @if($error = $errors->first('address'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $address->city, old('city') }}" id="city" placeholder="Masukan Kota" required="">
                                    @if($error = $errors->first('city'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="province">Province</label>
                                    <input type="text" class="form-control" name="province" value="{{ $address->province, old('province') }}" id="province" placeholder="Masukan Provinsi" required="">
                                    @if($error = $errors->first('province'))
                                        <p class="btn btn-danger mt-2">{{ $error }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{ $address->country, old('country') }}" id="country" placeholder="Masukan Negara" required="">
                                    @if($error = $errors->first('country'))
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
