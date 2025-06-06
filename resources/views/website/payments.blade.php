@extends('website.layouts.layout')
@section('content')

<div style="max-width: 400px; margin: 60px auto; background-color: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border-radius: 10px; padding: 25px; font-family: 'Segoe UI', sans-serif;">

    <h2 style="text-align:center; margin-bottom: 25px; color:#0d6efd;">Secure Payment</h2>

    <form action="{{ route('booking') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="font-weight:600; font-size:14px; margin-bottom:5px; display:block;">Cardholder Name</label>
            <input type="text" name="card_name" placeholder="John Doe"
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight:600; font-size:14px; margin-bottom:5px; display:block;">Card Number</label>
            <input type="text" name="card_number" placeholder="4242424242424242"
                maxlength="16" pattern="\d{16}" title="Card number must be 16 digits"
                style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
            <div style="flex:1;">
                <label style="font-weight:600; font-size:14px; margin-bottom:5px; display:block;">MM</label>
                <input type="text" name="exp_month" placeholder="MM"
                    maxlength="2" pattern="^(0[1-9]|1[0-2])$" title="Enter valid month (01 to 12)"
                    style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>
            </div>
            <div style="flex:1;">
                <label style="font-weight:600; font-size:14px; margin-bottom:5px; display:block;">YYYY</label>
                <input type="text" name="exp_year" placeholder="YYYY"
                    maxlength="4" pattern="\d{4}" title="Enter 4-digit year"
                    style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>
            </div>
            <div style="flex:1;">
                <label style="font-weight:600; font-size:14px; margin-bottom:5px; display:block;">CVC</label>
                <input type="text" name="cvc" placeholder="123"
                    maxlength="4" pattern="\d{3,4}" title="CVC must be 3 or 4 digits"
                    style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; font-size:14px;" required>
            </div>
        </div>

        <button type="submit"
            style="width:100%; background-color:#0d6efd; color:#fff; padding:12px; border:none; border-radius:6px; font-size:15px; font-weight:500; cursor:pointer;">
            Pay $100
        </button>
    </form>
</div>

@endsection
