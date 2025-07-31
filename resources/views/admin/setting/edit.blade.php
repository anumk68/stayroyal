@extends('admin.layouts.layout')

@section('content')
    @php
        $metadatas = $metadatas ?? null;  
        $isEdit = $metadatas !== null;

       
        $metaTitle = old('meta_title', $metadatas->meta_title ?? '');
        $metaValue = old('value', $metadatas->value ?? '');
        $metaTypeId = old('meta_type_id', $metadatas->meta_type_id ?? '');
    @endphp

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <h3 class="text-center mb-4">{{ $isEdit ? 'Edit Meta Tag' : 'Add Meta Tag' }}</h3>

                    <form id="metaTagForm" action="{{ route('metatag.update', $metadatas->id) }}" method="POST">
                        @csrf
                     

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Name</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ $metaTitle }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="value" class="form-label">Value to Display:</label>
                            <input type="text" id="value" name="value" class="form-control" value="{{ $metaValue }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="meta_type_id" class="form-label">Select Meta Type:</label>
                            <select id="meta_type_id" name="meta_type_id" class="form-select" required>
                                <option value="" disabled {{ $metaTypeId === '' ? 'selected' : '' }}>Select Meta Type</option>
                                <option value="title" {{ $metaTypeId === 'title' ? 'selected' : '' }}>Title</option>
                                <option value="keyword" {{ $metaTypeId === 'keyword' ? 'selected' : '' }}>Keyword</option>
                                <option value="description" {{ $metaTypeId === 'description' ? 'selected' : '' }}>Description</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            {{ $isEdit ? 'Update Meta Tag' : 'Add Meta Tag' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
