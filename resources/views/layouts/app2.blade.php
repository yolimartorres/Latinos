<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('vendor/template/assets/fonts/feather/feather.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/highlight.js/styles/vs2015.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/quill/dist/quill.core.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/template/assets/libs/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->
      
    <link rel="stylesheet" href="{{asset('css/theme.css')}}" id="stylesheetLight">

    <link rel="stylesheet" href="{{asset('vendor/template/assets/css/theme-dark.min.css')}}" id="stylesheetDark">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>body { display: none; }</style>
    
  </head>
  <body>

    <!-- NAVIGATION
    ================================================== -->
    
      <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Brand -->
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('/images/logo-light-bg.png') }}" class="navbar-brand-img 
            mx-auto" alt="...">
          </a>

          <!-- User (xs) -->
          <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">
        
              <!-- Toggle -->
              <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fe fe-user"></span>
              </a>

              <!-- Menu -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="profile-posts.html" class="dropdown-item">Profile</a>
                <a href="settings.html" class="dropdown-item">Settings</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
              </div>

            </div>

          </div>

          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Heading -->
            <h6 class="navbar-heading d-none">
              Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-4">

              <li class="nav-item">
                <a class="nav-link " href="{{ route('administration.fx_rates.index') }}">
                    <i class="fas fa-coins mr-3"></i> {{ __('messages.fx_rates') }}
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('administration.clients.index') }}">
                  <i class="fas fa-user-circle mr-3"></i>{{ __('messages.clients') }}
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('administration.recipients.index') }}">
                    <i class="fas fa-inbox mr-3"></i>{{ __('messages.recipients') }}
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ route('countries.index') }}">
                    <i class="fas fa-inbox mr-3"></i>{{ __('messages.countries') }}
                </a>
              </li>

            </ul>
      
            <!-- Push content down -->
            <div class="mt-auto"></div>
      
            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">
        
              <!-- Icon -->
              <a href="#sidebarModalActivity" class="navbar-user-link d-none" data-toggle="modal">
                <span class="icon">
                  <i class="fe fe-bell"></i>
                </span>
              </a>

              <!-- Dropup -->
              <div class="dropup">
                <!-- Toggle -->
                <a href="#!" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="fe fe-user"></span> {{ Auth::user()->name }}
                </a>

                <!-- Menu -->
                <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                  <a href="profile-posts.html" class="dropdown-item">Profile</a>
                  <a href="settings.html" class="dropdown-item">Settings</a>
                  <hr class="dropdown-divider">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </div>

              </div>

            </div>
            

          </div> <!-- / .navbar-collapse -->

        </div>
      </nav>

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">   

      @yield('content')
  
    </div> <!-- / .main-content -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{asset('vendor/template/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/chart.js/Chart.extension.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/highlightjs/highlight.pack.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/list.js/dist/list.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/quill/dist/quill.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('vendor/template/assets/libs/select2/dist/js/select2.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('vendor/template/assets/js/theme.min.js')}}"></script>

    <!-- Customs JS -->
    <script src="{{asset('js/util.js')}}"></script>

    @stack('scripts')

  </body>
</html>