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

                                <option value="title">Title</option>
                                <option value="keyword">Keyword</option>
                                <option value="description">Description</option>

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

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <button id="delete-selected" class="btn btn-danger btn-sm" disabled>Delete Selected</button>
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="selectOptionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Options
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="selectOptionsDropdown">
                                    <li><a class="dropdown-item" href="#" id="select-all-action">Select All</a></li>
                                    <li><a class="dropdown-item" href="#" id="deselect-all-action">Deselect All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="select-all" class="form-check-input custom-checkbox">
                                    </th>
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
                                        <td>
                                            <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                                value="{{ $metadata->id }}">
                                        </td>
                                        <td>{{ $metadata->id }}</td>
                                        <td>{{ $metadata->meta_title }}</td>
                                        <td>{{ $metadata->meta_type_id }}</td>
                                        <td>{{ $metadata->value }}</td>
                                        <td class="d-flex gap-2">
                                            {{-- Edit Button --}}
                                            <a href="{{ route('metatag.edit', $metadata->id) }}"
                                                class="btn btn-primary btn-sm">
                                                Edit
                                            </a>

                                            {{-- Delete Form --}}
                                            <form action="{{ route('metatag.destroy', $metadata->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this meta tag?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
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

    {{-- bulk delete script  --}}

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

            if (!confirm('Are you sure you want to delete the selected Meta tags?')) return;

            $.ajax({
                url: '{{ route('metatag.bulkDelete') }}',
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
