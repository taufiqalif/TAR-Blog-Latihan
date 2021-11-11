@extends('layouts/main')

@section('home')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mb-3">
      <div class="card-body">
        <h1 class="mb-3 bg-secondary">{{ $post->title }}</h1>
        {{-- <p><small class="text-muted">By. <a href="" class="text-decoration-none">{{ $post->user->name }}</a> --}}
        </small> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        
        @if ($post->image)
          <div style="max-height: 350px; overflow: hidden">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
          </div>
        @else
          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-3" alt="{{ $post->category->name }}">
        @endif
    
        {{-- ini adalah halaman post --}}
        {!! $post->body !!}
    
        <a href="/blog" class="btn btn-primary mt-5">Back Posts</a>
      </div>
    </div>
  </div>
</div>
@endsection