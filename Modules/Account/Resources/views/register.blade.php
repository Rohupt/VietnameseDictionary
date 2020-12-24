@extends('layout.main')

@section('content')
    <div class="body__overlay"></div>

    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--130"
        style="background: rgba(0, 0, 0, 0) url({{ asset('images/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li role="presentation" class="login"><a href="{{ route('login') }}">Login</a>
                        </li>
                        <li role="presentation" class="register active"><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->
                        <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form class="login" method="post" action="{{route('register')}}">
                            @csrf
                                <input type="text" placeholder="Full Name*" class="@error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> @enderror

                                <input type="text" placeholder="Username*" class="@error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> @enderror

                                <input type="email" placeholder="Email*" class="@error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> @enderror

                                <input type="password" placeholder="Password*"
                                    class="@error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password"> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> @enderror

                                <input type="password" placeholder="Confirm Password*" name="password_confirmation" required
                                    autocomplete="new-password">

                                <br><br><br>

                                <div class="htc__login__btn">
                                    <button type="submit">
                                        <a>register</a>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>

            <!-- End Login Register Content -->
        </div>
    </div>
    <!-- End Login Register Area -->
@endsection
