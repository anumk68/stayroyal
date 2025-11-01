@extends('admin.layouts.layout')

@section('content')
    <div class="wrapper">
        <main class="page-content">
            <div class="card radius-10">
                <div class="card-header">
                    <h5>Edit FAQ</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Room Type</label>
                            <select name="room_id" class="form-control" required>
                                @foreach ($roomtypes as $roomtype)
                                    <option value="{{ $roomtype->id }}"
                                        {{ $faq->room_id == $roomtype->id ? 'selected' : '' }}>
                                        {{ $roomtype->room->room_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Answer</label>
                            <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', $faq->status) == 1 ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ old('status', $faq->status) == 0 ? 'selected' : '' }}>Inactive
                                </option>
                            </select>

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('faq.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Update FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
