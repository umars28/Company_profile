@extends('adminLayout.master')
@section('title')
    <title>Articles</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Articles</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mt-3 ml-2 mb-4">
                            <div class="col-md-8">
                                <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('admin.article.index') }}" method="GET" class="form-inline mr-auto">
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $article->title }}</td>
                                            <td>{!! $article->description !!}</td>
                                            <td>{{ $article->slug }}</td>
                                            <td>{{ $article->category->category }}</td>
                                            @if($article->status == 'ACTIVE')
                                                <td><div class="badge badge-primary">{{ $article->status }}</div></td>
                                            @else
                                                <td><div class="badge badge-danger">{{ $article->status }}</div></td>
                                            @endif
                                            @if(!empty($article->image))
                                            <td><img src="{{ $article->image ? Storage::url('images/articles/'.$article->image) : '' }}" class="img img-circle" height="15%" alt="{{ $article->image }}"></td>
                                            @else
                                                <td>No Image</td>
                                            @endif
                                            <td>{{ date('d M yy', strtotime($article->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.article.delete', $article->id) }}" class="btn btn-outline-success">Hapus</a>
                                                <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @forelse($articles as $article)
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $articles->total() }}</b></p>
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

