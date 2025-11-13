<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('public/assets/images/fav-icon/icon.png') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0f0f0f;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        }

        .register-box img {
            display: block;
            margin: 0 auto 10px;
            max-height: 80px;
        }

        .register-box h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
            color: #fff;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
            color: #ccc;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #333;
            background-color: #2b2b2b;
            color: #fff;
            border-radius: 6px;
        }

        input::placeholder {
            color: #888;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00cfff;
            color: #000;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #00b5dd;
        }

        .form-links {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .form-links a {
            text-decoration: none;
            color: #00cfff;
        }

        .form-links a:hover {
            text-decoration: underline;
        }

        .error {
            background-color: #330000;
            border: 1px solid #cc0000;
            color: #ff4d4d;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="register-box">
         <img src="{{ asset('public/assets/images/inner/stay-logo.webp') }}" alt="  Logo">
        <h2>Sign Up</h2>
@if (session('success'))
    <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="color: red; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
@endif
        <form method="POST" action="{{ route('register.store') }}">
    @csrf
    <input type="hidden" name="role" value="admin">

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" required>
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email address" required>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password" required>
    @error('password')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required>
    @error('password_confirmation')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Sign Up</button>

    <div class="form-links">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('password.reset')}}">Forgot Password?</a>
    </div>
</form>

    </div>
<script>
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function () {
        submitBtn.disabled = true;
        submitBtn.innerText = 'Please Wait...'; // Optional: show processing state
    });
</script>

</body>
</html>
