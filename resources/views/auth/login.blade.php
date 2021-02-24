@extends('layouts/fullLayoutMaster')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
          <svg
            class="h-16 w-auto text-gray-700 sm:h-20"
            xmlns:dc="http://purl.org/dc/elements/1.1/"
            xmlns:cc="http://creativecommons.org/ns#"
            xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
            xmlns:svg="http://www.w3.org/2000/svg"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
            width="74.535995"
            height="33.924999"
            viewBox="-0.81 -0.354 74.535996 33.924999"
            xml:space="preserve"
            id="svg2"
            version="1.1"
            inkscape:version="0.48.1 "
            sodipodi:docname="AJAX.svg"
          >
            <g id="g6" transform="translate(-0.81,-0.35400034)">
              <polygon
                      points="59.95,7.772 62.928,11.054 65.795,7.772 71.917,7.772 65.934,14.5 71.999,21.283 65.63,21.283 62.68,17.975 59.757,21.283 53.607,21.283 59.619,14.528 53.607,7.772 "
                      id="polygon10"
                      style="fill:#ff5900" />
              <polygon
                      points="53.607,7.772 53.607,12.337 46.798,12.337 46.798,16.526 53.607,16.526 53.607,21.283 41.794,21.283 41.794,0 53.607,0 53.607,4.744 46.798,4.744 46.798,7.772 "
                      id="polygon12"
                      style="fill:#ff5900" />
              <path
                      d="M 36.811,0 V 8.71 H 36.756 C 35.652,7.442 34.274,7.001 32.675,7.001 c -3.276,0 -5.744,2.228 -6.61,5.172 C 25.076,8.929 22.528,6.94 18.75,6.94 c -3.068,0 -5.491,1.377 -6.755,3.621 V 7.772 H 5.653 V 4.744 h 6.921 V 0 H 0 v 21.283 h 5.653 v -8.946 h 5.635 c -0.168,0.657 -0.258,1.361 -0.258,2.104 0,4.439 3.392,7.555 7.72,7.555 3.64,0 6.039,-1.709 7.307,-4.824 h -4.845 c -0.655,0.937 -1.152,1.214 -2.462,1.214 -1.519,0 -2.829,-1.325 -2.829,-2.896 h 9.865 c 0.428,3.526 3.175,6.567 6.944,6.567 1.626,0 3.115,-0.8 4.025,-2.15 h 0.055 v 1.378 h 4.983 V 0 H 36.811 z M 16.079,12.4 c 0.314,-1.352 1.363,-2.235 2.672,-2.235 1.441,0 2.436,0.856 2.698,2.235 0.11,0 -5.37,0 -5.37,0 z m 17.707,5.643 c -1.837,0 -2.979,-1.712 -2.979,-3.499 0,-1.91 0.993,-3.747 2.979,-3.747 2.059,0 2.879,1.837 2.879,3.747 0,1.811 -0.869,3.499 -2.879,3.499 z"
                      id="path14"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 41.795,31.925 v -7.627 h 4.214 v 0.569 H 42.49 v 2.812 h 3.37 v 0.569 h -3.37 v 3.106 h 3.676 v 0.57 h -4.371 z"
                      id="path16"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 46.669,31.925 2.055,-2.739 -1.949,-2.591 h 0.79 l 1.591,2.117 1.559,-2.117 h 0.79 l -1.98,2.591 2.064,2.739 h -0.8 l -1.707,-2.266 -1.622,2.266 h -0.791 z"
                      id="path18"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 52.926,33.925 h -0.643 v -5.739 c 0,-0.527 0,-1.063 -0.032,-1.591 h 0.633 l 0.021,0.801 c 0.399,-0.633 0.926,-0.927 1.717,-0.927 1.643,0 2.348,1.358 2.348,2.79 0,1.434 -0.705,2.792 -2.348,2.792 -0.738,0 -1.317,-0.284 -1.696,-0.896 v 2.77 z m 3.36,-4.666 c 0,-1.137 -0.475,-2.254 -1.738,-2.254 -1.19,0 -1.622,0.98 -1.622,2.254 0,1.275 0.432,2.254 1.622,2.254 1.264,0 1.738,-1.116 1.738,-2.254 z"
                      id="path20"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 60.274,27.089 c -1.064,0 -1.434,0.896 -1.434,1.822 v 3.014 h -0.643 v -3.762 c 0,-0.516 -0.01,-1.041 -0.031,-1.568 H 58.8 l 0.041,0.769 c 0.316,-0.61 0.844,-0.895 1.549,-0.895 0.095,0 0.2,0.01 0.295,0.021 v 0.643 C 60.537,27.11 60.421,27.089 60.274,27.089 z"
                      id="path22"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 61.472,29.375 c 0,1.2 0.568,2.19 1.737,2.19 0.905,0 1.327,-0.6 1.485,-1.2 h 0.611 c -0.285,1.116 -0.97,1.686 -2.181,1.686 -1.622,0 -2.339,-1.201 -2.339,-2.696 0,-1.527 0.748,-2.886 2.423,-2.886 1.696,0 2.149,1.484 2.149,2.906 h -3.885 z m 0.02,-0.484 h 3.181 c 0,-1.043 -0.494,-1.938 -1.506,-1.938 -0.916,-10e-4 -1.549,0.694 -1.675,1.938 z"
                      id="path24"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 67.866,32.051 c -1.095,0 -1.916,-0.517 -1.916,-1.686 h 0.643 c 0,0.8 0.526,1.2 1.306,1.2 0.727,0 1.295,-0.348 1.295,-1.062 0,-0.643 -0.663,-0.812 -1.358,-1.012 -0.842,-0.242 -1.759,-0.506 -1.759,-1.538 0,-1.147 0.958,-1.484 1.854,-1.484 1.031,0 1.801,0.399 1.832,1.505 H 69.12 c -0.031,-0.631 -0.484,-0.989 -1.169,-0.989 -0.537,0 -1.19,0.21 -1.19,0.905 0,0.633 0.653,0.812 1.348,1.001 0.844,0.231 1.77,0.484 1.77,1.517 -0.001,1.2 -0.927,1.643 -2.013,1.643 z"
                      id="path26"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
              <path
                      d="m 72.322,32.051 c -1.096,0 -1.917,-0.517 -1.917,-1.686 h 0.643 c 0,0.8 0.526,1.2 1.307,1.2 0.727,0 1.295,-0.348 1.295,-1.062 0,-0.643 -0.664,-0.812 -1.359,-1.012 -0.842,-0.242 -1.758,-0.506 -1.758,-1.538 0,-1.147 0.958,-1.484 1.854,-1.484 1.031,0 1.801,0.399 1.832,1.505 h -0.643 c -0.031,-0.631 -0.484,-0.989 -1.169,-0.989 -0.537,0 -1.19,0.21 -1.19,0.905 0,0.633 0.653,0.812 1.349,1.001 0.843,0.231 1.77,0.484 1.77,1.517 -0.002,1.2 -0.929,1.643 -2.014,1.643 z"
                      id="path28"
                      inkscape:connector-curvature="0"
                      style="fill:#293c75" />
            </g>
          </svg>
        </a>

        <h4 class="card-title mb-1">Welcome to FedEx Massive Mail! 👋</h4>
        <p class="card-text mb-2">Please sign-in to your account and start to send mails</p>

        <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="mail@defex.com" aria-describedby="login-email" tabindex="1" autofocus value="{{ old('email') }}" />
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="login-password">Password</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>Forgot Password?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" {{ old('remember-me') ? 'checked' : '' }} />
              <label class="custom-control-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
        </form>
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>
@endsection
