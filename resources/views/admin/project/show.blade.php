@extends('layouts.app')
@section('title', 'Admin/Project')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetto
        </h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->name_project }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->type_project }}</h6>
                <p class="card-text">{{ $project->description_project }}</p>
                <a href="{{ $project->url_project }}" class="card-link">Link GitHub</a>
            </div>
        </div>
    </div>
@endsection
