@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form class="col-8 m-auto text-white" action="{{ route('admin.update', $project) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label for="shoreName">Title</label>
                <input type="text" class="form-control" id="shoreName" placeholder="Enter the title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreLocation">Type</label>
                <input type="text" class="form-control" id="shoreLocation" name="type"
                    placeholder="Enter the location of your company" value="{{ old('type', $project->type) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreUmbrella">Status</label>
                <input type="text" class="form-control" id="shoreUmbrella" name="status"
                    placeholder="Enter the numbre of your beach umbrellas" value="{{ old('status', $project->status) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreBeds">Image</label>
                <input type="file" class="form-control" id="shoreBeds" name="image"
                    placeholder="Enter the numbre of your beach beds" value="{{ old('image', $project->image) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreOpening">Start Date</label>
                <input type="text" class="form-control" id="shoreOpening" name="start_date"
                    placeholder="Enter the opening date" value="{{ old('start_date', $project->start_date) }}">
            </div>
            <div class="form-group m-2">
                <label for="shoreClosing">End Date</label>
                <input type="text" class="form-control" id="shoreClosing" name="end_date"
                    placeholder="Enter the closing date" value="{{ old('end_date', $project->end_date) }}">
            </div>
            <div class="button">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning ms-3">Clear</button>
            </div>
        </form>
    </div>
@endsection
