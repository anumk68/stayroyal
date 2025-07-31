@extends('admin.layouts.layout')

@section('content')
    <main class="page-content">
<div class="container py-4">
    <h2 class="mb-4">Edit Blog</h2>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug) }}" required>
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="" disabled>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" id="editor" rows="4">{{ old('description', $blog->description) }}</textarea>
        </div>

        {{-- Short Description --}}
        <div class="mb-3">
            <label class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $blog->short_description) }}</textarea>
        </div>

        {{-- Meta Title --}}
        <div class="mb-3">
            <label class="form-label">Meta Title</label>
            <textarea name="meta_title" class="form-control">{{ old('meta_title', $blog->meta_title) }}</textarea>
        </div>

        {{-- Meta Description --}}
        <div class="mb-3">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control">{{ old('meta_description', $blog->meta_description) }}</textarea>
        </div>

        {{-- Meta Keyword --}}
        <div class="mb-3">
            <label class="form-label">Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword', $blog->meta_keyword) }}">
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label class="form-label">Blog Image</label>
            @if($blog->image)
                <div class="mb-2"><img src="{{ asset('storage/app/public/' . $blog->image) }}" width="100"></div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        {{-- Meta Image --}}
        <div class="mb-3">
            <label class="form-label">Meta Image</label>
            @if($blog->meta_image)
                <div class="mb-2"><img src="{{ asset('storage/app/public/' . $blog->meta_image) }}" width="100"></div>
            @endif
            <input type="file" name="meta_image" class="form-control">
        </div>

        {{-- Image Alt --}}
        <div class="mb-3">
            <label class="form-label">Image Alt Text</label>
            <input type="text" name="image_alt" class="form-control" value="{{ old('image_alt', $blog->image_alt) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Blog</button>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
    </main>
@endsection
