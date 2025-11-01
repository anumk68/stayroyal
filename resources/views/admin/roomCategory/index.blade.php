@extends('admin.layouts.layout')
@section('content')
    <!--start content-->
    <main class="page-content">

        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Room Category</h5>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            <div class="dropdown">
                                <button id="opencategoryBtn" class="btn btn-primary">
                                    Add Room Category
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
                                <th>
                                    <input type="checkbox" id="select-all" class="form-check-input custom-checkbox">
                                </th>
                                <th>#ID</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomCategory as $roomCategorys)
                                <tr id="roomtype-row-{{ $roomCategorys->id }}">
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                            value="{{ $roomCategorys->id }}">
                                    </td>

                                    <td>#{{ $roomCategorys->id }}</td>
                                    <td>{{ $roomCategorys->category }}</td>
                                    <td>
                                        @if ($roomCategorys->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('roomCategory.delete', $roomCategorys->id) }}" class="text-danger"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this room category?');">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($roomCategory->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">No room category found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!--end page main-->

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!-- Add Room Type Popup -->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <span class="close-btn" id="closePopupBtn">&times;</span>
            <h3>Add Room Category</h3>
            <form id="rooomCategoryForm" action="{{ route('room_category.store') }}" method="POST">
                @csrf

                <label for="category">Room Category:</label>
                <input type="text" id="category" name="category" required />

                {{-- <label for="status" style="margin-top: 10px;">Status:</label>
                <input type="text" id="status" name="status" required placeholder="e.g. deluxe-room" /> --}}

                <button type="submit" style="margin-top: 15px;">Add Room Category</button>
            </form>
        </div>
    </div>

    <!-- JavaScript for popup & validation -->
    <script>
        const opencategoryBtn = document.getElementById('opencategoryBtn');
        const popup = document.getElementById('popup');
        const closePopupBtn = document.getElementById('closePopupBtn');
        const rooomCategoryForm = document.getElementById('rooomCategoryForm');

        // Show popup
        opencategoryBtn.addEventListener('click', () => {
            popup.style.display = 'flex';
        });
        closePopupBtn.addEventListener('click', () => {
            popup.style.display = 'none';
        });
        window.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
            }
        });
        rooomCategoryForm.addEventListener('submit', (e) => {
            const roomType = rooomCategoryForm.category.value.trim();
            const status = rooomCategoryForm.status.value.trim();

            if (!roomType || !status) {
                alert('Please enter both Room Type and status.');
                e.preventDefault();
                return;
            }
        });
    </script>


    <script>
        $('#select-all').on('click', function() {
            $('.select-roomtype').prop('checked', this.checked);
            toggleDeleteButton();
        });
        $(document).on('change', '.select-roomtype', function() {
            const allChecked = $('.select-roomtype').length === $('.select-roomtype:checked').length;
            $('#select-all').prop('checked', allChecked);
            toggleDeleteButton();
        });

        function toggleDeleteButton() {
            const anyChecked = $('.select-roomtype:checked').length > 0;
            $('#delete-selected').prop('disabled', !anyChecked);
        }
        $('#delete-selected').on('click', function() {
            const ids = $('.select-roomtype:checked').map(function() {
                return $(this).val();
            }).get();
            if (ids.length === 0) return;
            if (!confirm('Are you sure you want to delete the selected room types?')) return;
            $.ajax({
                url: '{{ route('roomCategory.bulkDelete') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    ids: ids
                },
                success: function(response) {
                    ids.forEach(id => {
                        $('#roomtype-row-' + id).remove();
                        location.reload();
                    });
                    alert(response.message);
                    toggleDeleteButton();
                    $('#select-all').prop('checked', false);
                },
                error: function() {
                    alert('Something went wrong. Please try again.');
                }
            });
        });
        $('#select-all-action').on('click', function(e) {
            e.preventDefault();
            $('.select-roomtype').prop('checked', true);
            $('#select-all').prop('checked', true);
            toggleDeleteButton();
        });
        $('#deselect-all-action').on('click', function(e) {
            e.preventDefault();
            $('.select-roomtype').prop('checked', false);
            $('#select-all').prop('checked', false);
            toggleDeleteButton();
        });
    </script>
@endsection
