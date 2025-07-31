@extends('admin.layouts.layout')
@section('content')
    <main class="page-content">
        <div class="card radius-10">
            <h2>Add Offer</h2>
            <form action="{{ route('admin.offers.store') }}" method="POST">
                @csrf
                <div>
                    <label>Room Type</label>
                    <select name="room_type_id" required>
                        @foreach ($roomtypes as $type)
                            <option value="{{ $type->id }}">{{ $type->room_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Slug</label>
                    <input type="text" name="slug" required value="{{ old('slug') }}" placeholder="Enter slug here">
                </div>
                <div>
                    <label>Offer Price (%)</label>
                    <input type="number" name="offer_price" required min="1" max="100">
                </div>
                <div>
                    <label>Valid Time</label>
                    <input type="text" name="offer_valid_time" required placeholder="e.g., 1 week, 2 months">
                </div>
                <div>
                    <label>Status</label>
                    <select name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit">Save Offer</button>
            </form>
        </div>
    </main>
@endsection
