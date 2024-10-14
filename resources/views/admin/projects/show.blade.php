@extends('layouts.dashboard')

@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>{{ $project->name }}</h2>
            <h4>{{ $project->type !== null ? $project->type->name : '' }}</h4>
            <img class="project-image"
                src="{{ $project->image !== null ? asset('./storage/'.$project->image) : 'https://placehold.co/400' }}"
                alt="{{ $project->name }}">
            <p>{{ $project->slug }}</p>
            <p>
                @forelse($project->technologies as $technology)
                {{ $technology->name }}
                @empty
                Nessuna tecnologia selezionata per il progetto
                @endempty
            </p>
            <p>{{ $project->summary }}</p>
        </div>
    </div>
</div>
@endsection