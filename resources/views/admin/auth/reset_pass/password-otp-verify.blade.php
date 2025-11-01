<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .otp-container {
            background-color: #1e1e1e;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
            width: 350px;
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

        .invalid-feedback {
            color: red;
            font-size: 13px;
            text-align: left;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 80px;
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
    <div class="logo">
        <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt="Logo"> {{-- Adjust path --}}
    </div>

    <h2>Enter OTP</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('password.otp.verify') }}" method="POST">
        @csrf
        <input type="text" name="otp" placeholder="Enter OTP">
        @error('otp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button type="submit">Verify OTP</button>
    </form>

    <div class="footer-links">
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('admin.register') }}">Register</a>
    </div>
</div>

</body>
</html>
