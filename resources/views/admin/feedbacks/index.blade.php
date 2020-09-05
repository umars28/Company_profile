@extends('adminLayout.master')
@section('title')
    <title>Feeedback</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Feedback</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                    @foreach($listFeedbacks as $feedbacks)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $feedbacks->name }}</td>
                                            <td>{{ $feedbacks->email }}</td>
                                            <td>{{ $feedbacks->subject  }}</td>
                                            <td>{{ $feedbacks->message  }}</td>
                                        </tr>
                                    @endforeach
                                    @forelse($listFeedbacks as $feedbacks)
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center mt-2">No data</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="paginate float-right mt-3">
                            <p class="ml-3"><b>Jumlah Data : {{ $listFeedbacks->total() }}</b></p>
                            {{ $listFeedbacks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

