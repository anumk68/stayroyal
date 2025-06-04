
@extends('admin.layouts.layout')
@section('content')

  <div class="wrapper">
      <main class="page-content">

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
      <table class="table align-middle mb-0">
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
            <tr>
              <td>#{{ $room->id }}</td>
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
                  

                  <a href="{{ url('/roomedit', $room->id) }}" class="text-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                  <a href="{{ url('/roomdelete', $room->id) }}" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
                </div>
              </td>
            </tr>
          @endforeach

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
    <div class="popup-content">
      <span class="close-btn" id="closePopupBtn">&times;</span>
      <h3>Add a New Room</h3>
     <form id="roomForm" action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

        <label for="price">Price :</label>
        <input type="number" id="price" name="price"  required />

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required />

        <label for="size">Size (sq ft):</label>
        <input type="number" id="size" name="size" min="0" required />
           <label for="roomType">Room Type:</label>
        <select id="room_type" name="room_type" required>
          <option value="" disabled selected>Select room type</option>
          <option value="Single">Room</option>
          <option value="Double">House</option>
          <option value="Suite">Villa</option>
          <option value="Deluxe">Apartment</option>
        </select>
         <label for="room_image">Room Image :</label>
        <input type="file" id="room_image" name="room_image"  required />

        <button type="submit">Add Room</button>
      </form>
    </div>
  </div>

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

 @endsection