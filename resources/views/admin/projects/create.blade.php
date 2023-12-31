@extends('layouts.app')

@section('page-title', 'New Project')

@section('main-content')
<div class="col-12 mb-4">
  <h1>New project</h1>
</div>
<div class="row">
  <div class="col-12">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">
          Title
          <span class="text-danger">
            *
          </span>
        </label>
        <input 
          type="text" 
          class="form-control @error('title') is-invalid @enderror"
          maxlength="100" 
          id="title" 
          name="title" 
          placeholder="Enter title..." 
          value="{{ old('title') }}"  
          required
        >
        @error('title')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="preview" class="form-label">Immagine Progetto</label>
        <input
         class="form-control @error('preview') is-invalid @enderror" 
         type="file" 
         id="preview" 
         name="preview"
         accept="image/*"
        >
        @error('preview')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="row">
        <div class="mb-3 col-12 col-md-6">
            <label for="collaborators" class="form-label">
              Collaborators
            </label>
            <input 
              type="text" 
              maxlength="255" 
              class="form-control @error('collaborators') is-invalid @enderror" 
              id="collaborators" 
              name="collaborators" 
              value="{{ old('collaborators') }}"
              placeholder="Enter value..." 
            >
            @error('collaborators')
              <div class="alert alert-danger my-2">
                  {{ $message }}
              </div>
            @enderror 
        </div>

        <div class="mb-3 col-12 col-md-6">
          <label for="type_id" class="form-label">
            Types
          </label>
          <select class="form-select" id="type_id" name="type_id">
            <option value="">Seleziona un tipo</option>
            @foreach ($types as $type)
              <option 
                value="{{ $type->id }}"
                {{ old('type_id') ==  $type->id ? 'selected':'' }} 
              >
                {{ $type->title }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

     <div class="mb-3 col-12 col-md-6">
      <span class="d-block mb-1">
        Tecnologie:
      </span>
      
      <div class="btn-group flex-column flex-md-row" role="group" >
        @foreach ($technologies as $technology)
          <input 
            type="checkbox" 
            class="btn-check" 
            name="technologies[]" 
            id="technology-{{ $technology->id }}"
            @if (
              in_array( $technology->id ,
              old('technologies', [])
              )
            )
              checked
            @endif 
             
            value="{{ $technology->id }}"
          >

          <label class="btn btn-outline-primary" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
        @endforeach
      </div>
      @error('technologies')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
      @enderror
      @error('technologies.*')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
      @enderror
     </div>

      <div class="mb-3">
        <label for="description" class="form-label">
          Description
          <span class="text-danger">
            *
          </span>
        </label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        @error('description')
            <div class="alert alert-danger my-2">
                {{ $message }}
            </div>
        @enderror

      </div>
      
      <button type="submit" class="btn btn-success">
        Crea
      </button>
    </form>
  </div>
</div>
@endsection
