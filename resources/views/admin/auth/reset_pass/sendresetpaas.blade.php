<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <style>
        body {
            background-color: #0c0c0c;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .reset-container {
            background-color: #1c1c1c;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.15);
            width: 400px;
            text-align: center;
        }

        .logo {
            max-width: 90px;
            margin-bottom: 1px;
        }

        h2 {
            margin-bottom: 25px;
            color: #fff;
        }

        input[type="email"] {
            padding: 12px;
            width: 100%;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: #2d2d2d;
            color: #fff;
        }

        .btn-submit {
            padding: 12px;
            background-color: #00cfff;
            border: none;
            color: #000;
            border-radius: 5px;
            font-weight: bold;
            width: 420px;
            cursor: pointer;
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
        <!-- Logo -->
        <img src="{{ asset('public/assets/images/inner/stay-logo.webp') }}" alt="Logo" class="logo">

        <h2>Reset Password</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('password.email.submit') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-submit">Send OTP</button>
        </form>
        <div class="footer-links">
            <a href="{{ route('login') }}">Login</a> |
            <a href="{{ route('admin.register') }}">Register</a>
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.btn-submit');
            btn.disabled = true;
            btn.innerText = 'Sending...'; // Optional: Show loading text
        });
    </script>

</body>

</html>
