

@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="card radius-10">
            <h2>Edit Offer</h2>
            <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST">
                @csrf
                 
                <div>
                    <label>Room Type</label>
                    <select name="room_type_id" required>
                        @foreach ($roomtypes as $type)
                            <option value="{{ $type->id }}" {{ $offer->room_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->room_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Slug</label>
                    <input type="text" name="slug"  value="{{ old('slug', $offer->slug) }}" placeholder="Enter slug here">
                </div>

                <div>
                    <label>Offer Price (%)</label>
                    <input type="number" name="offer_price" required min="1" max="100" value="{{ old('offer_price', $offer->offer_price) }}">
                </div>

                <div>
                    <label>Valid Time</label>
                    <input type="text" name="offer_valid_time" required placeholder="e.g., 1 week, 2 months" value="{{ old('offer_valid_time', $offer->offer_valid_time) }}">
                </div>

                <div>
                    <label>Status</label>
                    <select name="status">
                        <option value="1" {{ $offer->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $offer->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit">Update Offer</button>
            </form>
        </div>
    </main>
@endsection
