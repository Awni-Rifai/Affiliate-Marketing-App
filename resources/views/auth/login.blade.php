

@extends('pages.layout.master')
@section('content')

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5 ">
                        <div class="booking-cta">
                            <h1>Affiliate Marketing App</h1>
                            <p>Who doesn’t want to make more money? Affiliate marketing is one of the best options if you are looking for an online job. It would be great to make money off your blog, right? There are tons of websites the internet is flooded with, and it makes most of the bloggers confused, and their only question is, “where to begin?”
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7  ">
                        <div class="booking-form">


                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 id="c">Sign In</h3>
                                </div>

                            </div>
                            <div class="d">
                                <form method="POST" action="{{ route('login') }}" class="signin-form">
                                    @csrf
                                    <div class="form-group mb-3">

                                        <input  id="ground11" placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">

                                        <input type="password" id="ground22" placeholder="Password" required   class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button id="signin" type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                    </div>


                            </form>
                        </div>
                        <p class="text-center">Not a member? <a id="signup" href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
