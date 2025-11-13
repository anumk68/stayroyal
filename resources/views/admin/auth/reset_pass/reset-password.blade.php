<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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

        .reset-container {
            background-color: #1e1e1e;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
            width: 350px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 120px;
        }

        .reset-container h2 {
            margin-bottom: 20px;
            color: #00cfff;
        }

        input[type="email"],
        input[type="password"] {
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
            margin-top: -10px;
            margin-bottom: 10px;
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

<div class="reset-container">
    <!-- 🔵 LOGO SECTION -->
    <div class="logo">
        <img src="{{ asset('public/assets/images/inner/stay-logo.webp') }}" alt="Logo">
    </div>

    <h2>Reset Password</h2>

    <!-- ✅ ALERT MESSAGES -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <!-- 🔐 PASSWORD RESET FORM -->
    <form action="{{ route('password.reset.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <input type="password" name="password" placeholder="New Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button type="submit">Reset Password</button>
    </form>
    <div class="footer-links">
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('admin.register') }}">Register</a>
    </div>
</div>

</body>
</html>
