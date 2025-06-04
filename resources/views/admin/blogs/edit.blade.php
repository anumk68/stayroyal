@extends('admin.layouts.layout')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="p-4 border rounded shadow" style="max-width: 500px; width: 100%;">
    
    <span class="close-btn float-end" id="closePopupBtn" style="cursor: pointer; font-size: 1.5rem;">&times;</span>
    <h3 class="mb-4 text-center">Edit Blog</h3>

    <form id="blogForm" action="{{ route('blog.update', ) }}" method="POST" enctype="multipart/form-data">
      @csrf
       <input type="hidden" id="id" name="id" value="{{ $blogs->id }}">

      <div class="mb-3">
        <label for="title" class="form-label">Title :</label>
        <input type="text" id="title" name="title" class="form-control" required
               value="{{ old('title', $blogs->title) }}" />
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <input type="text" id="description" name="description" class="form-control" required
               value="{{ old('description', $blogs->description) }}" />
      </div>

      <!-- Dynamic Category Select -->
      <div class="mb-3">
        <label for="category_id" class="form-label">Category:</label>
        <select id="category_id" name="category_id" class="form-select" required>
          <option value="" disabled>Select a category</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}"
              {{ old('category_id', $blogs->category_id) == $category->id ? 'selected' : '' }}>
              {{ $category->category_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" id="image" name="image" class="form-control" />
        @if ($blogs->image)
          <img src="{{ asset('storage/' . $blogs->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 150px;">
        @endif
      </div>

      <button type="submit" class="btn btn-primary w-100">Update Blog</button>
    </form>
    
  </div>
</div>

@endsection
