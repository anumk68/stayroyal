@extends('admin.layouts.layout')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card p-4">
        <h3 class="text-center mb-4">Add Meta Tags</h3>
        <form id="blogForm" action="{{ route('metatag.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
           <div class="mb-3">
            <label for="meta_title" class="form-label">Name</label>
            <input type="text" id="meta_title" name="meta_title" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="value" class="form-label">Value to Display:</label>
            <input type="text" id="value" name="value" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="meta_type_id" class="form-label">Select Meta Type:</label>
            <select id="meta_type_id" name="meta_type_id" class="form-select" required>
              <option value="" disabled selected>Select Meta Type</option>
              @foreach ($datas as $data)
                <option value="{{ $data->id }}">{{ $data->meta_name }}</option>
              @endforeach
            </select>
          </div>
          
          <button type="submit" class="btn btn-success w-100">Add Meta Tags</button>
        </form>
      </div>
    </div>
  </div>

  {{-- Display Table Below Form --}}
  <div class="row justify-content-center mt-4">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h4>Existing Meta Tags</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Meta Type</th>
                <th>Name</th>
                <th>Value</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($metadatas as $metadata)
                <tr>
                  <td>{{ $metadata->id }}</td>
                  <td>{{ $metadata->meta_title }}</td>
                  <td>{{ $metadata->meta_name }}</td>
                  <td>{{ $metadata->value }}</td>
                  <td>
                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">No meta tags found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
