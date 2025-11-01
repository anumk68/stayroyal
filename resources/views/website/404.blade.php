@extends('website.layouts.layout')

@section('content')
    <style>
        .error-section {
            padding: 100px 0;
            /* top & bottom spacing */
            text-align: center;
            background: #fff;
        }

        .error-content {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .error-content h1 {
            font-size: 140px;
            font-weight: 800;
            color: #b79a65;
            margin-bottom: 10px;
            line-height: 1;
        }

        .error-content h4 {
            font-size: 28px;
            font-weight: 600;
            color: #222;
            margin-bottom: 10px;
        }

        .error-content p {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
        }

        .error-content a {
            display: inline-block;
            padding: 12px 35px;
            background: #b79a65;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .error-content a:hover {
            background: #a3874c;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .error-content h1 {
                font-size: 100px;
            }

            .error-content h4 {
                font-size: 22px;
            }

            .error-section {
                padding: 70px 0;
            }
        }
    </style>

    <section class="error-section">
        <div class="container">
            <div class="error-content">
                <h1>404</h1>
                <h4>Oops! Page Not Found</h4>
                <p>Sorry, we can’t find the page you’re looking for. It might have been moved or deleted.</p>
                <a href="{{ url('/') }}">Go To Home</a>
            </div>
        </div>
    </section>
@endsection
