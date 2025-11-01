@extends('admin.layouts.layout')

@section('content')
<div class="wrapper">
    <main class="page-content">
        <div class="card radius-10">
            <div class="card-header">
                <h5>Add New FAQ</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('faq.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Room Type</label>
                        <select name="room_id" class="form-control" required>
                            <option value="">Select Room Type</option>
                            @foreach($roomtypes as $roomtype)
                                <option value="{{ $roomtype->id }}">{{ $roomtype->room->room_type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <textarea name="answer" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('faq.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
