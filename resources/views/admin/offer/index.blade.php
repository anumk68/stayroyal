@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="card radius-10">
            <div class="card-header bg-transparent">
                <div class="row g-3 align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Room Offers</h5>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                            <a href="{{ route('admin.offers.create') }}" class="btn btn-sm btn-primary">Add New Offer</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#ID</th>
                                <th>Room Type</th>
                                <th>Offer (%)</th>
                                <th>Valid Time</th>
                                <th>Discounted Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ $offer->id }}</td>
                                    <td>{{ $offer->roomType->room_type ?? 'N/A' }}</td>
                                    <td>{{ $offer->offer_price }}%</td>
                                    <td>{{ $offer->offer_valid_time }}</td>
                                    <td>₹{{ $offer->after_discount_price }}</td>
                                    <td>
                                        @if ($offer->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ route('admin.offers.edit', $offer->id) }}" class="text-primary"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a href="{{ route('admin.offers.delete', $offer->id) }}" class="text-danger"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this offer?')">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            @if ($offers->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No offers found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
