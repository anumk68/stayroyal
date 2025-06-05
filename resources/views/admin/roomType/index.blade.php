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
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="javascript:;">Action</a></li>
              <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
            </ul>
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
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roomtypes as $roomtype)
            <tr>
              <td>#{{ $roomtype->id }}</td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="product-info">
                    <h6 class="product-name mb-1">{{ $roomtype->room_type }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                  <a href="{{ url('/roomtype/delete', $roomtype->id) }}" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
                </div>
              </td>
            </tr>
          @endforeach

          @if ($roomtypes->isEmpty())
            <tr>
              <td colspan="5" class="text-center">No blog records found.</td>
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
    <div class="popup-content">
      <span class="close-btn" id="closePopupBtn">&times;</span>
      <h3>Add Room Type</h3>
     <form id="blogForm" action="{{ route('room_type.store') }}" method="POST">
      @csrf
     <label for="room_type">Room Type :</label>
        <input type="text" id="room_type" name="room_type"  required />

        <button type="submit">Add Room Type</button>
      </form>
    </div>
  </div>
 <script>
  const opencategoryBtn = document.getElementById('opencategoryBtn');
  const popup = document.getElementById('popup');
  const closePopupBtn = document.getElementById('closePopupBtn');
  const categoryForm = document.getElementById('categoryForm');

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

  // Optional: Clear form and close popup after submit
  categoryForm.addEventListener('submit', (e) => {
    // Uncomment if you're handling form with JS (AJAX)
    // e.preventDefault();

    const categoryName = categoryForm.category_name.value.trim();
    if (!categoryName) {
      alert('Please enter a Room Type.');
      return;
    }

    // If using AJAX, handle submission here and comment out the reset/submit below

    categoryForm.reset(); // Clear form
    popup.style.display = 'none'; // Hide popup
  });
</script>
@endsection