<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('vendor/template/assets/fonts/feather/feather.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/highlight/styles/vs2015.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <title>Latinos Money Transfer</title>
  </head>
  <body class="d-flex align-items-center bg-white border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

          <!-- Heading -->
          <div class="display-4 text-center mb-3">
            Log In

          </div>

          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
           Please enter your credentials
          </p>

          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-12 col-form-label ">{{ __('Username') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                      <div class="text-right">
                        <a class="btn btn-link text-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                      </div>

                    @endif
                </div>
            </div>
        </form>

        </div>

        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block p-0 border-left-gray">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url({{ asset('/images/login-logo-cover.jpg') }})"></div>
        </div>

      </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="assets/libs/chart.js/Chart.extension.min.js"></script>
    <script src="assets/libs/highlight/highlight.pack.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>

  </body>
</html>
