@extends('dashboard.layouts.main')

@section('container')

<section class="section">
<div class="section-header">
    <div class="section-header-back">
      <a href="/dashboard/" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>{{ $title }}</h1>
    
  </div>

  <div class="section-body">
    <h2 class="section-title">{{ $title }}</h2>
    <p class="section-lead">
     Halaman untuk membuat Post / Artikel baru
    </p>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Write Your Post</h4>
          </div>
          <div class="card-body">
            <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Utama / Thumbnail <br> 
                  <span class="text-warning">* max: 1 Mb</span></label>
                <div class="col-sm-12 col-md-9">
                  <div id="image-preview" class="image-preview" style="width: 100%;">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="image" id="image-upload" value="{{ old('image') }}" />
                  @error('image')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
                </div>
                  
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                   <div class="col-sm-12 col-md-9">
                     <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  value="{{ old('title') }}" autocomplete="off" required>
                    @error('title')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
                </div>
              </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><em> Slug Title</em></label>
                     <div class="col-sm-12 col-md-9">
                       <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"  value="{{ old('slug') }}" autocomplete="off"  readonly required>
                      @error('slug')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
                </div>
              </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
              <div class="col-sm-12 col-md-9">
                <select class="select2 form-control"  @error('category_id') is-invalid @enderror" name="category_id" required>
                  @foreach ($categories as $category)
                      @if(old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                  @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
              <div class="col-sm-12 col-md-9">
                <input type="hidden" id="body" @error('body') is-invalid @enderror" name="body"  value="{{ old('body') }}" required>
                <trix-editor input="body"></trix-editor>
                @error('body')
                <div class="invalid-feedback">
                  {{  $message }}
                </div>
              @enderror
            </div>
            </div>
            
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Photos</label>
              <div class="col-sm-12 col-md-9">
                <select class="select2 form-control" @error('publish') is-invalid @enderror" name="galery_id" >
                  <option value="" selected>Pilih</option>
                    
                  @foreach ($albums as $album)
                  @if(old('galery_id') == $album->id)
                    <option value="{{ $album->id }}" selected>{{ $album->name }}</option>
                    @else
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                  @endif
              @endforeach
              </select>
                  @error('galery_id')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
              <div class="col-sm-12 col-md-9">
                <select class="select2 form-control" @error('publish') is-invalid @enderror" name="publish" required>
                  <option value="1">Publish</option>
                  <option value="2">Draft</option>
                  </select>
                  @error('publish')
                    <div class="invalid-feedback">
                      {{  $message }}
                    </div>
                  @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button class="btn btn-primary" type="submit">Create Post</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

      <script>
          const title = document.querySelector('#title');
          const slug = document.querySelector('#slug');

          title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
              .then( response => response.json())
              .then( data => slug.value = data.slug)
          })

           
      </script>
      
</section>
      @endsection