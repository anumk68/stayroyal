@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="container py-4">
            <h2 class="mb-4">Add Blog</h2>
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required>
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                        required>
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="editor" name="description" rows="4">{{ old('description') }}</textarea>
                </div>

                {{-- Short Description --}}
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description') }}</textarea>
                </div>

                {{-- Meta Title --}}
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <textarea class="form-control" id="meta_title" name="meta_title">{{ old('meta_title') }}</textarea>
                </div>

                {{-- Meta Description --}}
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description') }}</textarea>
                </div>

                {{-- Meta Keyword --}}
                <div class="mb-3">
                    <label for="meta_keyword" class="form-label">Meta Keyword</label>
                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                        value="{{ old('meta_keyword') }}">
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Blog Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                {{-- Meta Image --}}
                <div class="mb-3">
                    <label for="meta_image" class="form-label">Meta Image</label>
                    <input type="file" class="form-control" id="meta_image" name="meta_image">
                </div>

                {{-- Image Alt Text --}}
                <div class="mb-3">
                    <label for="image_alt" class="form-label">Image Alt Text</label>
                    <input type="text" class="form-control" id="image_alt" name="image_alt" required
                        value="{{ old('image_alt') }}">
                </div>

                 <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="{{ route('blogs.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-save me-1"></i> Add Blog
                        </button>
                    </div>
            </form>
        </div>
    </main>
@endsection
