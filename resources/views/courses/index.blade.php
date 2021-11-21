@extends('home')
@section('content')
    <div class="row mb-4">
        <div class="col">
            <a type="button" class="btn btn-primary" href="{{ route('courses.create') }}">Register new course</a>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Courses
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th> Id</th>
                    <th> Name</th>
                    <th> Description</th>
                    <th> Teacher</th>
                    <th> Enrolled students</th>
                    <th> Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses as $course)
                    <tr id="row_{{ $course->id }}">
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>Jhon Rudy</td>
                        <td>{{ rand(8,37) }}</td>
                        <td>
                            <div class="btn-group me-2" role="group" id="action-buttons">
                                <a class="btn btn-sm btn-secondary" href="{{ route('courses.show', $course->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="View course's details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{ route('courses.edit', $course->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit course's info">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete-entry"
                                        data-action-route="/courses/{{ $course->id }}"
                                        data-entry-id="{{ $course->id }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this course">
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
