@extends('admin.layouts.layout')
@section('content')
    <div class="wrapper">
        <main class="page-content">
            <!--      Search here   -->
            <div class="searchbar d-none d-xl-flex ms-auto" style="margin-top: 20px; position: relative; width: 300px;">
                <input id="room_search" class="form-control ps-5" type="text" placeholder="Type here to search"
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
                            <h5 class="mb-0">Rooms</h5>
                        </div>
                        <div class="col">
                            <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                                <div class="dropdown">
                                    <button id="openPopupBtn" class="btn btn-primary">
                                        Room Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="room_table">
                            <thead class="table-light">
                                <tr>
                                    <th>#ID</th>
                                    <th>Room type</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr id="room-row-{{ $room->id }}">
                                        <td>{{ $room->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">{{ $room->room_type }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">{{ $room->price }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">{{ $room->size }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-info">
                                                    <h6 class="product-name mb-1">{{ $room->location }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">


                                                <a href="{{ url('/roomedit', $room->id) }}" class="text-warning"
                                                    title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                                <a href="{{ url('/roomdelete', $room->id) }}" class="text-danger"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this room?')"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="no-results" style="display:none;">
                                    <td colspan="5" class="text-center">No Rooms records found.</td>
                                </tr>
                                @if ($rooms->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No Rooms records found.</td>
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
        <div class="popup-content add-room-modal" style="width:800px !important;">
            <span class="close-btn" id="closePopupBtn">&times;</span>
            <h3>Add a New Room</h3>
            <form id="roomForm" action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <!-- Price -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Price:</label>
                        <div class="col-md-8">
                            <input type="number" name="price" class="form-control" required>
                        </div>
                    </div>

                    <!-- Size -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Size (sq ft):</label>
                        <div class="col-md-8">
                            <input type="number" name="size" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Location -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Location:</label>
                        <div class="col-md-8">
                            <input type="text" name="location" class="form-control" required>
                        </div>
                    </div>


                    <!-- Room Type -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Room Type:</label>
                        <div class="col-md-8">
                            <select name="room_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($roomtypes as $roomtype)
                                    <option value="{{ $roomtype->id }}">{{ $roomtype->room_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Room Images -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Room Images:</label>
                        <div class="col-md-8">
                            <input type="file" name="room_images[]" multiple class="form-control" required>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Status:</label>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Check-in -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Check-in:</label>
                        <div class="col-md-8">
                            <input type="datetime-local" name="check_in" class="form-control">
                        </div>
                    </div>

                    <!-- Check-out -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Check-out:</label>
                        <div class="col-md-8">
                            <input type="datetime-local" name="check_out" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Rating -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Rating:</label>
                        <div class="col-md-8">
                            <input type="number" step="0.1" name="rating" class="form-control"
                                placeholder="e.g. 4.5">
                        </div>
                    </div>

                    <!-- Rating Count -->
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="col-md-4 col-form-label">Rating Users:</label>
                        <div class="col-md-8">
                            <input type="number" name="rating_count" class="form-control" placeholder="e.g. 1200">
                        </div>
                    </div>
                </div>

                <!-- Amenities (Icon Upload + Text) -->
                <div class="col-12 mb-3">
                    <label class="form-label">Amenities (Icon Image + Text):</label>
                    <div id="amenities_wrapper">
                        <div class="row mb-2 amenity-item">
                            <div class="col-md-5">
                                <input type="file" name="amenities[0][icon]" class="form-control" required>
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="amenities[0][text]" class="form-control"
                                    placeholder="Amenity text" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addAmenity()">+ Add
                        Amenity</button>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug:</label>
                    <input type="text" name="slug" class="form-control" required value="{{ old('slug') }}">
                </div>

                <!-- Submit -->
                <div class="form-group text-end mt-4">
                    <button type="submit" class="btn btn-success">Save Room</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                // You can access editor here if needed
                window.editor = editor;
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
            });
    </script>
    <script>
        const openPopupBtn = document.getElementById('openPopupBtn');
        const popup = document.getElementById('popup');
        const closePopupBtn = document.getElementById('closePopupBtn');
        const roomForm = document.getElementById('roomForm');

        openPopupBtn.addEventListener('click', () => {
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
        const roomData = {
            name: roomForm.roomName.value.trim(),
            type: roomForm.roomType.value,
            price: parseFloat(roomForm.price.value),
            location: roomForm.location.value.trim(),
            size: parseFloat(roomForm.size.value),
        };
        roomForm.reset();
        popup.style.display = 'none';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#room_search').on('keyup', function() {
                let search = $(this).val();
                $.ajax({
                    url: "{{ route('room_search') }}",
                    type: "GET",
                    data: {
                        search: search
                    },
                    success: function(data) {
                        $('#room_table tbody tr').hide();
                        if (data.length > 0) {
                            data.forEach(function(room) {
                                $('#room-row-' + room.id).show();
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
    <script>
        let amenityIndex = 1;

        function addAmenity() {
            const wrapper = document.getElementById('amenities_wrapper');
            const div = document.createElement('div');
            div.classList.add('row', 'mb-2', 'amenity-item');
            div.innerHTML = `
            <div class="col-md-5">
            <input type="file" name="amenities[${amenityIndex}][icon]" class="form-control" required>
            </div>
            <div class="col-md-5">
            <input type="text" name="amenities[${amenityIndex}][text]" class="form-control" placeholder="Amenity text" required>
            </div>
        `;
            wrapper.appendChild(div);
            amenityIndex++;
        }
    </script>
@endsection
