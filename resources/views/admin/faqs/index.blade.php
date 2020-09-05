@extends('adminLayout.master')
@section('title')
    <title>Faq</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Faq</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="row mt-3 ml-2 mb-4">
                            <div class="col-md-8">
                                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('admin.faqs.index') }}" method="GET" class="form-inline mr-auto">
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
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($listFaqs as $faqs)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $faqs->question !!}</td>
                                            <td>{!! $faqs->answer !!}</td>
                                            @if($faqs->status == 'ACTIVE')
                                                <td><div class="badge badge-primary">{{ $faqs->status }}</div></td>
                                            @else
                                                <td><div class="badge badge-danger">{{ $faqs->status }}</div></td>
                                            @endif
                                            <td>
                                                <a href="{{ route('admin.faqs.delete', $faqs->id) }}" class="btn btn-outline-success">Hapus</a>
                                                <a href="{{ route('admin.faqs.edit', $faqs->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @forelse($listFaqs as $faqs)
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $listFaqs->total() }}</b></p>
                            {{ $listFaqs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

