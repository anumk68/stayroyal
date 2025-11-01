@extends('website.layouts.layout')
@section('content')
    <!--==================================================-->
    <!-- Start Royella Breadcumb Area -->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="breacumb-content">
                        <div class="breadcum-title">
                            <h4>Booking</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>/</li>
                            <li>Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- End Royella Breadcumb Area -->
    <!--==================================================-->
    <div class="room-details">
        <div class="container">

            <div class="booking-details-table" style="margin-top: 40px;">
                <h3 style="margin-bottom: 20px; font-size: 20px; color: #333;">Your Booking Details</h3>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                        <thead style="background-color: #007BFF; color: white;">
                            <tr>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Booking ID</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Room Type</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Start Date</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">End Date</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Total Member</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Location </th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Price</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Size</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">User name</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">User Email</th>
                                <th style="padding: 12px; text-align: left; border: 1px solid #ddd;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking_details as $booking_detail)
                                <tr style="background-color: #f9f9f9;">
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->id }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->room_type }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->start_date }}
                                    </td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->end_date }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->total_days }}
                                    </td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->location }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->price }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $booking_detail->size }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ Auth::user()->user_name }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">{{ Auth::user()->email }}</td>
                                    <td style="padding: 12px; border: 1px solid #ddd;">
                                        <a href="{{ route('booking.download', $booking_detail->id) }}"
                                            style="padding: 6px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
