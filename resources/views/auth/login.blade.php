@extends('layouts.app')

@section('content')
<div class="container">

    <!---login page--->

<div class="col-lg-5" style="margin:auto">
    <h1 style="text-align: center">
       <img style="max-height: 100px; border-radius:10px; margin-bottom:5px;" src="https://thumbs.dreamstime.com/b/shopper-bags-icon-vector-sign-symbol-isolated-white-background-shopper-bags-logo-concept-shopper-bags-icon-134158551.jpg" alt="">
      </h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" name="email" id="form2Example1" class="form-control @error('email') is-invalid @enderror"/>
          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          <label class="form-label" for="form2Example1">Email address</label>
        </div>
      
        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" name="password" id="form2Example2" class="form-control @error('email') is-invalid @enderror" />
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
          <label class="form-label" for="form2Example2">Password</label>
        </div>
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
              <label class="form-check-label" for="form2Example31"> Remember me </label>
            </div>
          </div>
      
          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      
        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a class="btn btn-primary" href="{{ route('register') }}">Register</a></p>
          <p>or sign up with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
      
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
      
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>
      
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
      </form>
    </div>
</div>

@endsection
