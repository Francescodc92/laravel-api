@extends('layouts.app')

@section('page-title', 'Single Project')

@section('main-content')
<div class="col-12 mb-4">
  <h1>Single Project: {{ $project->title }}</h1>
</div>
<div class="card  mb-3">
  <div class="row g-0">
    <div class="col-md-4 ">
      @if ($project->preview)
      <img 
        src="{{ $project->full_preview_img }}" 
        class="img-fluid rounded-start h-100" 
        alt="{{ $project->title }}"
      >
      @endif
    </div>
      <div class="col-md-8">
          <div class="card-body ">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text fw-bold">
                  <div class="">
                     <span class="fw-bold">
                      Collaborators:
                      </span>  {{ $project->collaborators }}
                  </div>
              </p>
              <p>
                <span class="fw-bold">
                  Technologies: 
                </span> 
                @foreach ( $project->technologies as $technology)
                  <span class="badge rounded-pill text-bg-primary">
                    {{ $technology->title }}
                  </span>
                @endforeach
              </p>
              <p>
                  <span class="fw-bold">
                    Type:
                  </span> 
                  
                  @if ($project->type)  
                   {{ $project->type->title }}
                  @else
                   -
                  @endif
              </p>
              <p>
                  <span class="fw-bold">
                    Descrizione:
                  </span> 
                  {{ $project->description }}
              </p>
              <div class="actions-container">
                  <a href="{{ route('admin.projects.edit', ['project'=>$project->id]) }}" class="btn btn-warning mt-2">
                      Modifica
                  </a>
                  <form 
                    action="{{ route('admin.projects.destroy', ['project'=>  $project->id]) }}"
                    method="POST"
                    class="d-inline-block mt-2"
                    onsubmit="return confirm('Sei sicuro di voler cancellare questo elemento?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">
                        Elimina
                    </button>

                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
