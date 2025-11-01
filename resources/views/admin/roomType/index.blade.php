@extends('admin.layouts.layout')
@section('content')

<!--start content-->
<main class="page-content">
    <div class="card radius-10">
        <div class="card-header bg-transparent">
            <div class="row g-3 align-items-center">
                <div class="col">
                    <h5 class="mb-0">Room Types</h5>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                        <div class="dropdown">
                            <button id="opencategoryBtn" class="btn btn-primary">
                                Add Room Type
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button id="delete-selected" class="btn btn-danger btn-sm" disabled>Delete Selected</button>
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                            id="selectOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Options
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="selectOptionsDropdown">
                            <li><a class="dropdown-item" href="#" id="select-all-action">Select All</a></li>
                            <li><a class="dropdown-item" href="#" id="deselect-all-action">Deselect All</a></li>
                        </ul>
                    </div>
                </div>

                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th><input type="checkbox" id="select-all" class="form-check-input custom-checkbox"></th>
                            <th>#ID</th>
                            <th>Category</th>
                            <th>Room Type</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roomtypes as $roomtype)
                            <tr id="roomtype-row-{{ $roomtype->id }}">
                                <td>
                                    <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                        value="{{ $roomtype->id }}">
                                </td>
                                <td>#{{ $roomtype->id }}</td>
                                <td>{{ $roomtype->roomCategory->category ?? 'N/A' }}</td>
                                <td>{{ $roomtype->room_type }}</td>
                                <td>{{ $roomtype->slug }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <!-- ✅ Edit Button -->
                                        <a href="javascript:void(0);" class="text-primary editRoomTypeBtn"
                                            data-id="{{ $roomtype->id }}"
                                            data-room_category_id="{{ $roomtype->category_id }}"
                                            data-room_type="{{ $roomtype->room_type }}"
                                            data-slug="{{ $roomtype->slug }}" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="{{ url('/roomtype/delete', $roomtype->id) }}" class="text-danger"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this room type?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if ($roomtypes->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No room types found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Add Room Type Popup -->
<div class="popup-overlay" id="popup">
    <div class="popup-content">
        <span class="close-btn" id="closePopupBtn">&times;</span>
        <h3>Add Room Type</h3>
        <form id="roomTypeForm" action="{{ route('room_type.store') }}" method="POST">
            @csrf
            <label for="room_category_id" style="margin-top: 10px;">Room Category:</label>
            <select id="room_category_id" name="room_category_id" required>
                <option value="">Select Category</option>
                @foreach ($roomCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>

            <label for="room_type">Room Type:</label>
            <input type="text" id="room_type" name="room_type" required />

            <label for="slug" style="margin-top: 10px;">Slug:</label>
            <input type="text" id="slug" name="slug" required placeholder="e.g. deluxe-room" />

            <button type="submit" style="margin-top: 15px;">Add Room Type</button>
        </form>
    </div>
</div>

<!-- ✅ Edit Room Type Popup -->
<div class="popup-overlay" id="editPopup">
    <div class="popup-content">
        <span class="close-btn" id="closeEditPopupBtn">&times;</span>
        <h3>Edit Room Type</h3>
        <form id="editRoomTypeForm" action="{{ route('room_type.update') }}" method="POST">
            @csrf
            <input type="hidden" id="edit_id" name="id">

            <label for="edit_room_category_id" style="margin-top: 10px;">Room Category:</label>
            <select id="edit_room_category_id" name="room_category_id" required>
                <option value="">Select Category</option>
                @foreach ($roomCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </select>

            <label for="edit_room_type">Room Type:</label>
            <input type="text" id="edit_room_type" name="room_type" required />

            <label for="edit_slug" style="margin-top: 10px;">Slug:</label>
            <input type="text" id="edit_slug" name="slug" required />

            <button type="submit" style="margin-top: 15px;">Update Room Type</button>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
    // --- Add Popup ---
    const opencategoryBtn = document.getElementById('opencategoryBtn');
    const popup = document.getElementById('popup');
    const closePopupBtn = document.getElementById('closePopupBtn');
    opencategoryBtn.addEventListener('click', () => popup.style.display = 'flex');
    closePopupBtn.addEventListener('click', () => popup.style.display = 'none');
    window.addEventListener('click', (e) => { if (e.target === popup) popup.style.display = 'none'; });

    // --- Edit Popup ---
    const editPopup = document.getElementById('editPopup');
    const closeEditPopupBtn = document.getElementById('closeEditPopupBtn');
    closeEditPopupBtn.addEventListener('click', () => editPopup.style.display = 'none');
    window.addEventListener('click', (e) => { if (e.target === editPopup) editPopup.style.display = 'none'; });

    // ✅ Open Edit Modal with existing data
    $(document).on('click', '.editRoomTypeBtn', function() {
        $('#edit_id').val($(this).data('id'));
        $('#edit_room_category_id').val($(this).data('room_category_id'));
        $('#edit_room_type').val($(this).data('room_type'));
        $('#edit_slug').val($(this).data('slug'));
        $('#editPopup').css('display', 'flex');
    });

    // ✅ AJAX submit Edit form
    $('#editRoomTypeForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('room_type.update') }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message);
                location.reload();
            },
            error: function() {
                alert('Something went wrong while updating.');
            }
        });
    });
</script>

{{-- bulk delete script --}}
<script>
    // (your existing bulk delete JS here)
</script>
@endsection
