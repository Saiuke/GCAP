@extends('home')
@section('content')
    <div class="row my-4">
        <div class="col">
            <a type="button" class="btn btn-primary" href="{{ route('teachers.create') }}">Register new teacher</a>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Teachers
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th> Name</th>
                    <th> Document</th>
                    <th> Phone</th>
                    <th> Email</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->document }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            <div class="btn-group me-2" role="group" id="action-buttons">
                                <a class="btn btn-sm btn-primary" href="{{ route('teachers.edit', $teacher->id) }}">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger delete-entry  href="{{ route('teachers.destroy', $teacher->id) }}"">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
