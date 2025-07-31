@extends('admin.layouts.layout')
@section('content')

<!--start content-->
<main class="page-content">

  <div class="card radius-10">
    <div class="card-header bg-transparent">
      <div class="row g-3 align-items-center">
        <div class="col">
          <h5 class="mb-0">Room Types</h5>
        </div>
        <div class="col">
          <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
            <div class="dropdown">
              <button id="opencategoryBtn" class="btn btn-primary">
                Add Room Type
              </button>
            </div>
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
              <th>Slug</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roomtypes as $roomtype)
              <tr>
                <td>#{{ $roomtype->id }}</td>
                <td>{{ $roomtype->room_type }}</td>
                <td>{{ $roomtype->slug }}</td>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                   <a href="{{ url('/roomtype/delete', $roomtype->id) }}" 
   class="text-danger" 
   title="Delete"
   onclick="return confirm('Are you sure you want to delete this room type?');">
   <i class="bi bi-trash-fill"></i>
</a>

                    </a>
                  </div>
                </td>
              </tr>
            @endforeach

            @if ($roomtypes->isEmpty())
              <tr>
                <td colspan="4" class="text-center">No room types found.</td>
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

<!-- Add Room Type Popup -->
<div class="popup-overlay" id="popup">
  <div class="popup-content">
    <span class="close-btn" id="closePopupBtn">&times;</span>
    <h3>Add Room Type</h3>
    <form id="roomTypeForm" action="{{ route('room_type.store') }}" method="POST">
      @csrf

      <label for="room_type">Room Type:</label>
      <input type="text" id="room_type" name="room_type" required />

      <label for="slug" style="margin-top: 10px;">Slug:</label>
      <input type="text" id="slug" name="slug" required placeholder="e.g. deluxe-room" />

      <button type="submit" style="margin-top: 15px;">Add Room Type</button>
    </form>
  </div>
</div>

<!-- JavaScript for popup & validation -->
<script>
  const opencategoryBtn = document.getElementById('opencategoryBtn');
  const popup = document.getElementById('popup');
  const closePopupBtn = document.getElementById('closePopupBtn');
  const roomTypeForm = document.getElementById('roomTypeForm');

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

  // Validate before submit
  roomTypeForm.addEventListener('submit', (e) => {
    const roomType = roomTypeForm.room_type.value.trim();
    const slug = roomTypeForm.slug.value.trim();

    if (!roomType || !slug) {
      alert('Please enter both Room Type and Slug.');
      e.preventDefault();
      return;
    }
  });
</script>

@endsection
