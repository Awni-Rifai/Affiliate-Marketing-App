@extends('pages.layout.master')
@section('content')
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Affiliate Marketing App"</h1>
                            <p>Who doesn’t want to make more money? Affiliate marketing is one of the best options if you are looking for an online job. It would be great to make money off your blog, right? There are tons of websites the internet is flooded with, and it makes most of the bloggers confused, and their only question is, “where to begin?”
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">


                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 id="c">Sign Up</h3>
                                </div>

                            </div>
                            <div class="d">
                                <form method="POST" action="{{ route('register') }}" class="signup-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">

                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="ground1" placeholder="username">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="ground1" placeholder="Full Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="ground2" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="ground3" placeholder="Password" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <input id="ground3" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image" class="btn btn-outline-dark">Add Image</label>
                                        <input id="image" style="display: none" title="Choose Image" placeholder="image" type="file" class="form-control" name="image" required >
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="signin" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <p>I'm already a member! <a id="signup" href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
