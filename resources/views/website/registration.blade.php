@extends('website.layouts.layout')
<meta name="robots" content="noindex, nofollow">

@section('content')

    <section class="registration_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Register</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form id="registerForm" action="{{ route('frontuser.register') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="user_name">Name</label>
                                    <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}"
                                        placeholder="Enter Your name" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Enter Your Email" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                        class="form-control" required>
                                </div>

								<div class="form-group mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number"
                                        class="form-control" required>
                                </div>

                              

                                <div class="form-group mt-4 text-center" style="float:inline-end">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right:20px">Register</button>
                                    <a href="{{ route('user.login') }}">We have an already account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).on('submit', '#registerForm', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ route('frontuser.register') }}", // your form's route
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

                    success: function (response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    } else {
                        alert('Something went wrong!');
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let messages = Object.values(errors).flat().join('\n');
                    alert(messages);
                }
            });
        });
    </script>


@endsection