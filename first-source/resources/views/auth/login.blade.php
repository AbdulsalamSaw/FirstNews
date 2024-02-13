@extends('auth.index')
@section('title', 'Login Admin')
@section('content')
    <div class="box">
      <div class="col-lg-12 mb-3">
           <div class="myform form ">
               <div class="col-mb-12 mb-3 text-center">
                   <h1>Login Admin</h1>
               </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                               <label for="email">{{ __('Email Address') }}</label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                          <div class="col-md-12 mb-3 ">
                            <div class="form-group">
                               <label for="password">{{ __('Password') }}</label>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="row mb-0">
                        <div class="col-md-12 mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-mb-12 mb-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                         </div>
                            <div class="row">
                                <div class="col-mb-12 mb-3">
                                     <div class="form-group">
                                        <p class="text-center">
                                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                        </p>
                                     </div>
                                </div>
                            </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
