<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
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
            background: #121212;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .login-card {
            background: #1e1e1e;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 700px;
            max-width: 500px;
            text-align: center;
            color: #f1f1f1;
        }

        .login-card img {
            width: 100px;
            margin-bottom: 10px;
        }

        .login-card h2 {
            margin-bottom: 30px;
            font-size: 26px;
            color: #ffffff;
            font-weight: 600;
        }

        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #ccc;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #333;
            border-radius: 6px;
            font-size: 15px;
            background-color: #2a2a2a;
            color: #f1f1f1;
        }

        .form-group input:focus {
            border-color: #00bcd4;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 188, 212, 0.4);
        }

        button {
            width: 100%;
            background: #00bcd4;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0097a7;
        }

        .form-links {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .form-links a {
            color: #00bcd4;
            text-decoration: none;
        }

        .form-links a:hover {
            text-decoration: underline;
        }

        .error {
            background: #2e0000;
            border: 1px solid #ff4d4d;
            color: #ffb3b3;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: left;
        }
    </style>

</head>

<body>
    <div class="login-card">
        <img src="{{ asset('public/assets/images/inner/stay-logo.png') }}" alt=" Logo">
        <h2>Sign In</h2>

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



        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <input type="hidden" name="role" value="admin">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Sign In</button>
        </form>

        <div class="form-links">
            <a href="{{ route('admin.register') }}">Register</a>
            <a href="{{ route('password.reset')}}">Forgot Password?</a>
        </div>
    </div>
    <script>
    document.querySelector('form').addEventListener('submit', function (e) {
        const button = this.querySelector('button[type="submit"]');
        button.disabled = true;
        button.innerText = 'Sending OTP...'; // optional: feedback text
    });
</script>

</body>

</html>
