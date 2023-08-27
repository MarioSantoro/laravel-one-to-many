@extends('layouts.app')

@section('content')
    <div class="container show justify-content-center d-flex mt-5">
        <div class="card">
            @if (str_starts_with($project->image, 'http'))
                <img src="{{ $project->image }}" alt="Imagine">
            @else
                <img src="{{ asset('storage/' . $project->image) }}" alt="Imagine">
            @endif
            <div class="card-body">
                <h3>Title : {{ $project->title }}</h3>
                <p class="card-text">Type : {{ $project->type->name }}</p>
                <p class="card-text">Status : {{ $project->status->name }}</p>
                <p class="card-text">Start Date : {{ $project->start_date }}</p>
                <p class="card-text">End Date : {{ $project->end_date }}</p>
            </div>
        </div>
    </div>
@endsection
