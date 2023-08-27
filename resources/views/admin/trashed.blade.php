@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Amministratore</div>

                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">type</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Start_Date</th>
                                    <th scope="col">End_Date</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $project->id }}</th>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->type->name }}</td>
                                        <td>{{ $project->status->name }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->end_date }}</td>
                                        <td class="d-flex justify-content-evenly">
                                            <form action="{{ route('admin.restore', $project->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-warning">Restore</button>
                                            </form>
                                            <form action="{{ route('admin.forceDelete', $project->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Permanent
                                                    Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
