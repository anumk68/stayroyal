@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="searchbar d-none d-xl-flex ms-auto" style="margin-top: 20px; position: relative; width: 300px;">
            <input id="room_booking_search" class="form-control ps-5" type="text" placeholder="Search Room Booking detail"
                autocomplete="off">
            <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i
                    class="bi bi-x-lg"></i></div>
            <!-- Container to show search results -->
            <div id="search-results"
                style="position: absolute; top: 100%; left: 0; right: 0; background: white; z-index: 1000; border: 1px solid #ccc; display:none; max-height: 300px; overflow-y: auto;">
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Rooms Booking</h5>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            <div class="dropdown">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                </a>
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
                    <table class="table align-middle mb-0" id="room_booking_table">
                        <thead class="table-light">
                            <tr>
                                  <th>
                                    <input type="checkbox" id="select-all" class="form-check-input custom-checkbox">
                                </th>
                                <th>#ID</th>
                                <th>Room type</th>
                                <th>Booking User Name</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Location</th>
                                <th>Start Date</th>
                                <th>End date</th>
                                <th>Total Member</th>
                                <th>Extra Beds </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr id="room-booking-row-{{ $booking->id }}">
                                      <td>
                                        <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                            value="{{ $booking->id }}">
                                    </td>

                                    <td>#{{ $booking->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->room_type }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->user_name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->price }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->size }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->location }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->start_date }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->end_date }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">
                                                    {{ $booking->adults + $booking->children + $booking->infants }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $booking->extra_beds }}
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ url('/bookingdelete', $booking->id) }}" class="text-danger"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this booking?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            <tr id="no-results" style="display:none;">
                                <td colspan="5" class="text-center">No Rooms booking found.</td>
                            </tr>
                            @if ($bookings->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No Booking found.</td>
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
    <script>
        $(document).ready(function() {
            $('#room_booking_search').on('keyup', function() {
                let search = $(this).val();
                $.ajax({
                    url: "{{ route('room_booking_search') }}",
                    type: "GET",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $('#room_booking_table tbody tr').hide();
                        if (data.length > 0) {
                            data.forEach(function(booking) {
                                $('#room-booking-row-' + booking.id).show();
                            });
                        } else {
                            $('#no-results').show();
                        }
                    }
                });
            });

            // Optional: Hide results when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.searchbar').length) {
                    $('#search-results').hide();
                }
            });
        });
    </script>

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

            if (!confirm('Are you sure you want to delete the selected room booking?')) return;

            $.ajax({
                url: '{{ route('roombooking.bulkDelete') }}',
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
