@extends('dashboard.layouts.main')

@section('container')
<<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create Categories</h1>
</div>

<div class="col-lg-5">
  <form action="/dashboard/categories" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label fs-6 fw-bolder">New Categories</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
      @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label fs-6 fw-bolder  @error('slug') is-invalid @enderror">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-secondary">Create Category</button>
  </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  category.addEventListener('change', function(){
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

</script>
@endsection 