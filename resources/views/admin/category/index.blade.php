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
                        <div class="row mt-3 ml-2 mb-4">
                            <div class="col">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->category }}</td>
                                        <td>{{ date('d M yy', strtotime($category->created_at)) }}</td>
                                        @if($category->status == 'ACTIVE')
                                            <td><div class="badge badge-primary">{{ $category->status }}</div></td>
                                        @else
                                            <td><div class="badge badge-danger">{{ $category->status }}</div></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-outline-success">Hapus</a>
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @forelse($categories as $category)
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $categories->total() }}</b></p>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

