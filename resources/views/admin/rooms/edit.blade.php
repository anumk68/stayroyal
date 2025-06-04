@extends('admin.layouts.layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="p-4 border rounded shadow" style="max-width: 400px; width: 100%;">

    <span class="close-btn float-end" id="closePopupBtn" style="cursor: pointer; font-size: 1.5rem;">&times;</span>
    <h3 class="mb-4">Edit Room</h3>

    <form id="roomForm" action="{{ route('room.update', $rooms->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="id" name="id" value="{{ $rooms->id }}">

      <div class="mb-3">
        <label for="price" class="form-label">Price :</label>
        <input type="number" id="price" name="price" class="form-control" required
          value="{{ old('price', $rooms->price) }}" />
      </div>

      <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" id="location" name="location" class="form-control" required
          value="{{ old('location', $rooms->location) }}" />
      </div>

      <div class="mb-3">
        <label for="size" class="form-label">Size (sq ft):</label>
        <input type="number" id="size" name="size" min="0" class="form-control" required
          value="{{ old('size', $rooms->size) }}" />
      </div>

      <!-- Room Type Select -->
      <div class="mb-3">
        <label for="room_type" class="form-label">Room Type:</label>
        <select id="room_type" name="room_type" class="form-select" required>
          <option value="" disabled>Select room type</option>
          <option value="Single" {{ old('room_type', $rooms->room_type) == 'Single' ? 'selected' : '' }}>Room</option>
          <option value="Double" {{ old('room_type', $rooms->room_type) == 'Double' ? 'selected' : '' }}>House</option>
          <option value="Suite" {{ old('room_type', $rooms->room_type) == 'Suite' ? 'selected' : '' }}>Villa</option>
          <option value="Deluxe" {{ old('room_type', $rooms->room_type) == 'Deluxe' ? 'selected' : '' }}>Apartment</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="room_image" class="form-label">Room Image :</label>
        <input type="file" id="room_image" name="room_image" class="form-control" />
        @if ($rooms->room_image)
          <img src="{{ asset('storage/' . $rooms->room_image) }}" alt="Current Room Image" class="img-thumbnail mt-2" style="max-width: 150px;">
        @endif
      </div>

      <button type="submit" class="btn btn-primary w-100">Update Room</button>
    </form>

  </div>
</div>
@endsection
