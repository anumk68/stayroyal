@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Payment Listing</h5>
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
                                <th>Room</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>currency</th>
                                <th>Payment method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input select-roomtype custom-checkbox"
                                            value="{{ $payment->id }}">
                                    </td>
                                    <td>{{ $payment->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->room_type }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->user_name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->amount }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->currency }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->payment_method }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-info">
                                                <h6 class="product-name mb-1">{{ $payment->status }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ url('/paymentdelete', $payment->id) }}" class="text-danger"
                                                title="Delete"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($payments->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No payment records found.</td>
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

            if (!confirm('Are you sure you want to delete the selected Payment history?')) return;

            $.ajax({
                url: '{{ route('payment_history.bulkDelete') }}',
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
