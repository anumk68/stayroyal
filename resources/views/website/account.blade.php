@extends('website.layouts.layout')
@section('content')
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="breacumb-content">
                        <div class="breadcum-title">
                            <h4>Account</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="account_sec">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <ul class="nav flex-column nav-pills" id="dashboardTabs" role="tablist">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="pill" href="#dashboard"
                                role="tab">
                                <i class="bi bi-speedometer2 nav-icon"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" id="orders-tab" data-bs-toggle="pill" href="#orders" role="tab">
                                <i class="bi bi-cart nav-icon"></i> Bookings
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" id="account-tab" data-bs-toggle="pill" href="#account" role="tab">
                                <i class="bi bi-person nav-icon"></i> Account Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right nav-icon"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Content -->
                <div class="col-md-9 content">
                    <div class="tab-content" id="dashboardTabContent">
                        <!-- Dashboard -->
                        <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                            <h4>Dashboard</h4>
                            <p>Hello, <strong>{{ $user->user_name }}</strong></p>
                            <p>From your account dashboard you can check your recent bookings, manage your address, and edit
                                your account information.</p>
                        </div>

                        <!-- Bookings -->
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <h4>Bookings</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order ID</th>
                                            <th>Room Type</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $index => $booking)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>#{{ $booking->id }}</td>
                                              <td>{{ ucwords(str_replace('-', ' ', $booking->room->slug)) }}</td>

                                                <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d, M Y') }}</td>
                                                <td>₹{{ number_format($booking->price, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('booking.download', $booking->id) }}"
                                                        target="_blank">Download</a>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No bookings found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Account Details -->
                        <div class="tab-pane fade" id="account" role="tabpanel">
                            <h4>Account Details</h4>
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                            <form action="{{ route('account.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="user_name"
                                            value="{{ old('user_name', $user->user_name) }}" placeholder="Full Name"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $user->email) }}" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone', $user->phone) }}" placeholder="Phone">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-primary w-100">SAVE CHANGES</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div> <!-- End tab-content -->
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    // Store active tab in localStorage when clicked
    document.querySelectorAll('#dashboardTabs .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            localStorage.setItem('activeTab', link.getAttribute('href'));
        });
    });

    // Activate the stored tab on page load
    window.addEventListener('DOMContentLoaded', () => {
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            const tabTrigger = document.querySelector(`#dashboardTabs .nav-link[href="${activeTab}"]`);
            if (tabTrigger) {
                const tab = new bootstrap.Tab(tabTrigger);
                tab.show();
            }
        }
    });
</script>
