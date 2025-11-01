@extends('admin.layouts.layout')

@section('content')
    <div class="wrapper">
        <main class="page-content">
            <div class="card radius-10">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">FAQ Management</h5>
                    <a href="{{ route('faq.create') }}" class="btn btn-primary">Add FAQ</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room Type</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::limit($faq->room_type, 36) ?? '—' }}</td>
                                    <td>{{ Str::limit($faq->question, 20) }}</td>
                                    <td>{{ Str::limit($faq->answer, 20) }}</td>
                                    <td>
                                        @if ($faq->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($faq->created_at)->format('d M Y') }}</td>

                                    <td>
                                        <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
