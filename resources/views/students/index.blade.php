@extends('home')
@section('content')
    <div class="row mb-4">
        <div class="col">
            <a type="button" class="btn btn-primary" href="{{ route('students.create') }}">Register new student</a>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Students
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
                @foreach ($students as $student)
                    <tr id="row_{{ $student->id }}">
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->document }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <div class="btn-group me-2" role="group" id="action-buttons">
                                <a class="btn btn-sm btn-primary" href="{{ route('students.edit', $student->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit student's information">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete-entry"
                                        data-action-route="/people/{{ $student->id }}"
                                        data-entry-id="{{ $student->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete student">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
