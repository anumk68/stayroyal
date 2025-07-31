@extends('admin.layouts.layout')
@section('content')
    <!--start content-->
    <main class="page-content">
 <div class="card radius-10">
        <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h5 class="mb-0">Blogs</h5>
                </div>
                <div class="col text-end">
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/app/public/'.$blog->image) }}" width="50" height="50" style="object-fit: cover;">
                                    @else
                                        <span>—</span>
                                    @endif
                                </td>
                                <td>{{ $blog->category ? $blog->category->category_name : '—' }}</td>
                                <td>{!! \Illuminate\Support\Str::limit($blog->description, 50) !!}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="text-warning" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="{{ route('blogs.destroy', $blog->id) }}" class="text-danger ms-2" 
                                        onclick="return confirm('Delete this blog?');" title="Delete">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No blog records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
@endsection
