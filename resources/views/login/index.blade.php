@extends('layouts.main')

@section('home')
<div class="row justify-content-center">
  <div class="col-lg-4">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-5 mb-lg-5" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show mt-5 mb-lg-5" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin" style="margin-top: 100px">
      <h1 class="h3 mb-3 fw-normal text-center mt-5 text-white">Please Login</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div class="div-invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Login</button>
      </form>
      <small class="text-light">Not registered? <a href="/register" class="text-decoration-none">Register Now</a></small>
    </main>
  </div>
</div>
<p class="mt-5 mb-3 text-muted text-light text-center">&copy; TAR Blog</p>
  
@endsection