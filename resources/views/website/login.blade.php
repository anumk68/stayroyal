@extends('website.layouts.layout')
<meta name="robots" content="noindex, nofollow">

@section('content')



<section class="user_login_main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Login</h4>
                        </div>
                        <div class="card-body">
                           
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('login.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role"value="user">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Enter Your Email" class="form-control" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        placeholder="Enter Your Password" class="form-control" required>
                                </div>
                                <div class="form-group mt-4 d-flex justify-content-between align-items-center"
                                    style="float:inline-end">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right:20px">Login</button>
                                    <a href="{{ route('user.register') }}" {{-- class="text-decoration-none" --}}>Don't have an
                                        account?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection