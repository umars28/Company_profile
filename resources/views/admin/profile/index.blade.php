@extends('adminLayout.master')
@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mt-3 ml-2 mb-4">
                            <div class="col-md-8">
                                <a href="{{ route('admin.profile.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('admin.profile.index') }}" method="GET" class="form-inline mr-auto">
                                    <div class="search-element">
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
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($profile as $profil)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $profil->name }}</td>
                                            <td>{{ $profil->position }}</td>
                                            @if(!empty($profil->image))
                                            <td><img src="{{ Storage::url('images/profile/'.$profil->image) }}" class="img img-circle" height="15%" alt="{{ $profil->image }}"></td>
                                            @else
                                            <td>No Image</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.profile.delete', $profil->id) }}" class="btn btn-outline-success">Hapus</a>
                                                <a href="{{ route('admin.profile.edit', $profil->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @forelse($profile as $profil)
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $profile->total() }}</b></p>
                            {{ $profile->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

