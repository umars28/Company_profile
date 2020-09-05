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
                        <div class="row mt-3 ml-2 mb-4">
                            <div class="col">
                                <form action="{{ route('admin.testimoni.index') }}" method="GET" class="form-inline mr-auto">
                                    <div class="search-element text-center">
                                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search" data-width="250">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        <div class="search-backdrop"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if($message = session('message'))
                            <div class="row mt-0 ml-2">
                                <div class="col-md-6">
                                    <h4 class="btn btn-danger">{{ $message }}</h4>
                                </div>
                            </div>
                        @endif
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quote</th>
                                        <th>Job</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($listTestimoni as $testimoni)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $testimoni->name }}</td>
                                            <td>{!! $testimoni->quote !!}</td>
                                            <td>{{ $testimoni->job ? $testimoni->job : 'No Job' }}</td>
                                            <td>{{ $testimoni->company ? : 'No Company'}}</td>
                                            @if($testimoni->status == 'ACTIVE')
                                                <td><div class="badge badge-primary">{{ $testimoni->status }}</div></td>
                                            @else
                                                <td><div class="badge badge-danger">{{ $testimoni->status }}</div></td>
                                            @endif
                                           @if(!empty($testimoni->image))
                                            <td><img src="{{ Storage::url('images/testimoni/'.$testimoni->image) }}" class="img img-circle" height="15%" alt="{{ $testimoni->image }}"></td>
                                            @else
                                               <td>No Image</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.testimoni.edit', $testimoni->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @forelse($listTestimoni as $testimoni)
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $listTestimoni->total() }}</b></p>
                            {{ $listTestimoni->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

