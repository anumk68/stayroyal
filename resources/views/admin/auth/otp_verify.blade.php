<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify OTP - Stay Royal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #1b1b1b;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            height: 40px;
        }

        .header a {
            color: #00cfff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        .otp-container {
            background-color: #1e1e1e;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
            width: 320px;
            margin: 40px auto;
            text-align: center;
        }

        .otp-container h2 {
            margin-bottom: 20px;
            color: #00cfff;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #fff;
        }

        button {
            padding: 10px 20px;
            background-color: #00cfff;
            border: none;
            color: #000;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #1d4028;
            color: #4fff94;
        }

        .alert-error {
            background-color: #402020;
            color: #ff7070;
        }

        .resend-link {
            margin-top: 10px;
            font-size: 14px;
        }

        .resend-link a {
            color: #00cfff;
            text-decoration: underline;
        }

        .footer-links {
            margin-top: 20px;
            font-size: 14px;
        }

        .footer-links a {
            color: #00cfff;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>



    <div class="otp-container">
    <!-- Logo centered -->
    <div style="margin-bottom: 20px;">
        <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt="Stay Royal Logo" style="width: 120px;">
    </div>

    <h2>OTP Verification</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.verify.otp.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="text" name="otp" placeholder="Enter OTP">
        @error('otp')
            <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
        @enderror
        <button type="submit">Verify</button>
    </form>

    {{-- <div class="resend-link">
        Didn't receive OTP? <a href="#">Resend OTP</a>
    </div> --}}

    <div class="footer-links">
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('admin.register') }}">Register</a>
    </div>
</div>


</body>

</html>
