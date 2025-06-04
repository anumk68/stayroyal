@extends('admin.layouts.layout')
@section('content')
       <!--start content-->
          <main class="page-content">

          <div class="card radius-10">
  <div class="card-header bg-transparent">
    <div class="row g-3 align-items-center">
      <div class="col">
        <h5 class="mb-0">Blogs</h5>
      </div>
      <div class="col">
        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
          <div class="dropdown">
            <button id="openPopupBtn" class="btn btn-primary">
                Blog Add
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
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blogs as $blog)
            <tr>
              <td>{{ $blog->id }}</td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="product-info">
                    <h6 class="product-name mb-1">{{ $blog->title }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="product-box border">
                    <img src="{{ asset('storage/' . $blog->image) }}" width="50" height="50">
                  </div>
                 </div>
              </td>
                <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="product-info">
                    <h6 class="product-name mb-1">{{ $blog->category_name }}</h6>
                  </div>
                </div>
              </td>
               <td>
                <div class="d-flex align-items-center gap-3">
                  <div class="product-info">
                    <h6 class="product-name mb-1">{{ $blog->description }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center gap-3 fs-6">
                   <a href="{{ url('/blogedit', $blog->id) }}" class="text-warning" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                  <a href="{{ url('/blogdelete', $blog->id) }}" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
                </div>
              </td>
            </tr>
          @endforeach

          @if ($blogs->isEmpty())
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
      <h3>Add Blog</h3>
     <form id="blogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
     <label for="title">Title :</label>
        <input type="text" id="title" name="title"  required />

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required />
          <label for="category_id">Blog Category:</label>
         <select id="category_id" name="category_id" required>
        <option value="" disabled selected>Select category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
        <div>
        <label for="image">Image</label>
        <input type="file" id="image" name="image" required />
        </div>
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