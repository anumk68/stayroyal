@extends('admin.layouts.layout')
@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Blogs Category</h5>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            <div class="dropdown">
                                <button id="opencategoryBtn" class="btn btn-primary">
                                    Category Add
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
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
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                     <td>
                                        <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                            value="{{ $categorie->id }}">
                                    </td>
                                    <td>#{{ $categorie->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $categorie->category_name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ url('/category-delete', $categorie->id) }}" class="text-danger"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this category?');">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No blog records found.</td>
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
    </div>
    <!--end wrapper-->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <span class="close-btn" id="closePopupBtn">&times;</span>
            <h3>Add Blog</h3>
            <form id="blogForm" action="{{ route('blog_category.store') }}" method="POST">
                @csrf
                <label for="category_name">category Name :</label>
                <input type="text" id="category_name" name="category_name" required />
                <button type="submit">Add Blog Category</button>
            </form>
        </div>
    </div>
    <script>
        const opencategoryBtn = document.getElementById('opencategoryBtn');
        const popup = document.getElementById('popup');
        const closePopupBtn = document.getElementById('closePopupBtn');
        const categoryForm = document.getElementById('categoryForm');

        // Show popup
        opencategoryBtn.addEventListener('click', () => {
            popup.style.display = 'flex';
        });

        // Close popup via close button
        closePopupBtn.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        // Close popup by clicking outside the form
        window.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
            }
        });

        // Optional: Clear form and close popup after submit
        categoryForm.addEventListener('submit', (e) => {
            // Uncomment if you're handling form with JS (AJAX)
            // e.preventDefault();

            const categoryName = categoryForm.category_name.value.trim();
            if (!categoryName) {
                alert('Please enter a category name.');
                return;
            }

            // If using AJAX, handle submission here and comment out the reset/submit below

            categoryForm.reset(); // Clear form
            popup.style.display = 'none'; // Hide popup
        });
    </script>



    <script>
        // Master checkbox toggle
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

            if (!confirm('Are you sure you want to delete the selected category?')) return;

            $.ajax({
                url: '{{ route('blogcategory.bulkDelete') }}',
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

        // Dropdown select/deselect
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
