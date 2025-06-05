@extends('admin.layouts.layout')
@section('content')

  <main class="page-content">

          <div class="card radius-10">
  <div class="card-header bg-transparent">
    <div class="row g-3 align-items-center">
      <div class="col">
        <h5 class="mb-0">Payment Listing</h5>
      </div>
      <div class="col">
        <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
          <div class="dropdown">
            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
            </a>
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
                  <a href="{{ url('/bookingdelete', $payment->id) }}" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
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


@endsection