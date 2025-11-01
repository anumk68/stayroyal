@extends('admin.layouts.layout')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="p-4 border rounded shadow" style="max-width: 700px; width: 100%;">
            <span class="close-btn float-end" id="closePopupBtn" style="cursor: pointer; font-size: 1.5rem;">&times;</span>
            <h3 class="mb-4">Edit Room</h3>

            <form id="roomForm" action="{{ route('room.update', $rooms->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $rooms->id }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" name="price" class="form-control" required
                            value="{{ old('price', $rooms->price) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="size" class="form-label">Size (sq ft):</label>
                        <input type="number" name="size" class="form-control" required
                            value="{{ old('size', $rooms->size) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" name="location" class="form-control" required
                            value="{{ old('location', $rooms->location) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="room_type_id" class="form-label">Room Type:</label>
                        <select name="room_type_id" class="form-select" required>
                            <option value="">Select Room Type</option>
                            @foreach ($roomtypes as $roomtype)
                                <option value="{{ $roomtype->id }}"
                                    {{ $rooms->room_type == $roomtype->id ? 'selected' : '' }}>
                                    {{ $roomtype->room_type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="rating" class="form-label">Rating (e.g. 4.5):</label>
                        <input type="number" step="0.1" name="rating" class="form-control"
                            value="{{ old('rating', $rooms->rating) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="rating_count" class="form-label">Rating Count:</label>
                        <input type="number" name="rating_count" class="form-control"
                            value="{{ old('rating_count', $rooms->rating_count) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="check_in" class="form-label">Check-In:</label>
                        <input type="datetime-local" name="check_in" class="form-control"
                            value="{{ old('check_in', $rooms->check_in) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="check_out" class="form-label">Check-Out:</label>
                        <input type="datetime-local" name="check_out" class="form-control"
                            value="{{ old('check_out', $rooms->check_out) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $rooms->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $rooms->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Room Images (upload again if replacing):</label>
                        <input type="file" name="room_images[]" class="form-control" multiple>
                        @if ($rooms->room_images)
                            <div class="mt-2 d-flex flex-wrap gap-2">
                                @foreach (json_decode($rooms->room_images, true) as $img)
                                    <img src="{{ asset('storage/app/public/' . $img) }}" width="100"
                                        class="img-thumbnail">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Amenities -->
                    <!-- Amenities -->
                    <div class="col-12 mb-3">
                        <label class="form-label">Amenities (Icon Image + Text):</label>
                        <div id="amenities_wrapper">
                            @php
                                $amenities = json_decode($rooms->amenities, true) ?? [];
                            @endphp
                            @foreach ($amenities as $i => $amenity)
                                <div class="row mb-2 amenity-item">
                                    <div class="col-md-5">
                                        <input type="file" name="amenities[{{ $i }}][icon]"
                                            class="form-control">
                                        @if (!empty($amenity['icon']))
                                            <img src="{{ asset('storage/app/public/' . $amenity['icon']) }}" alt="icon"
                                                class="mt-2" width="40">
                                            <input type="hidden" name="amenities[{{ $i }}][old_icon]"
                                                value="{{ $amenity['icon'] }}">
                                        @endif
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="amenities[{{ $i }}][text]"
                                            value="{{ $amenity['text'] ?? '' }}" class="form-control"
                                            placeholder="Amenity text">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="removeAmenity(this)">Delete</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addAmenity()">+ Add
                            Amenity</button>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="6">
                                    {{ old('description', $rooms->description) }}
                                </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug" class="form-label">Slug:</label>
                        <input type="text" name="slug" class="form-control" required
                            value="{{ old('slug', $rooms->slug ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="schema_seo" class="form-label">Seo Schema:</label>
                        <textarea name="schema_seo" id="schema_seo" class="form-control" rows="6">
                                    {{ old('schema_seo', $rooms->schema_seo) }}
                                </textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Room</button>
            </form>
        </div>
    </div>

    <script>
        let amenityIndex = {{ count($amenities) }};

        function addAmenity() {
            const wrapper = document.getElementById('amenities_wrapper');
            const div = document.createElement('div');
            div.classList.add('row', 'mb-2', 'amenity-item');
            div.innerHTML = `
    <div class="col-md-5">
      <input type="file" name="amenities[${amenityIndex}][icon]" class="form-control">
    </div>
    <div class="col-md-5">
      <input type="text" name="amenities[${amenityIndex}][text]" class="form-control" placeholder="Amenity text">
    </div>
  `;
            wrapper.appendChild(div);
            amenityIndex++;
        }
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {

                    window.descriptionEditor = editor;
                })
                .catch(error => {
                    console.error('CKEditor init error:', error);
                });
        });

        function removeAmenity(button) {

            button.closest('.amenity-item').remove();
        }
    </script>


@endsection
