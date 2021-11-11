@extends('layouts/main')

@section('home')


<nav class="navbar navbar-light" style="background-color: #999">
  <div class="container-fluid">
    <h1 class="navbar-brand fs-2">{{ $title }}</h1>
    <form action="/blog">
      @if(request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if(request('user'))
      <input type="hidden" name="user" value="{{ request('user') }}">
      @endif
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-secondary" type="submit">Search</button>
      </div>
    </form>
  </div>
</nav> 

@if ($posts->count())
<div class="card mb-3">
  @if ($posts[0]->image)
  <div style="max-height: 350px; overflow: hidden">
    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
  @endif
  <div class="card-body text-center">
    <h3 class="card-title">{{ $posts[0]->title }}</h3>
    <p class="mb-1">
      {{-- <small class="text-muted">By. <a href="/blog?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in  --}}
        <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></small>
    </p>
    <p><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
    <p class="card-text">{{ $posts[0]->excerpt }} <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">Read More...</a></p>
  </div>
</div>


<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.3)"><a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
        @if ($post->image)
            <div style="max-height: 500px; overflow: hidden">
              <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
            </div>
        @else
              <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
          </h5>
          <p><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
          <p class="mb-1">
            <small class="text-muted">
              {{-- <a href="/blog?user={{ $post->user->name }}">{{ $post->user->name }}</a> in 
              <a href="/blog?user={{ $post->user->name }}" class="text-decoration-none">{{ $post->user->name}}</a> --}}
            </small>
          </p>
          <p class="card-text">{{ $post->excerpt }} <small><a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More...</a></small></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
    <p class="text-center fs-3">No Post Found.</p>
@endif

<div class="d-flex justify-content-center">
  {{ $posts->links() }}
</div>

@endsection
