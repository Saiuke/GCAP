@extends('home')
@section('content')
    <div class="row mb-4">
        <div class="col">
            <a type="button" class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}">Edit course</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ $course->name }} Details
                </div>
                <div class="card-body">
                    <p>{{ $course->description ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Students of this course
                </div>
                <div class="card-body">
                    <table class="table">
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
                                        <a class="btn btn-sm btn-primary"
                                           href="{{ route('students.edit', $student->id) }}" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Edit student's information">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{ route('courses.delete.person', [$course->id, $student->id]) }}"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Remove student from this course">
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
        </div>
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Teachers of this course
                </div>
                <div class="card-body">
                    <table class="table">
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
                            <tr id="row_{{ $teacher->id }}">
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->document }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <div class="btn-group me-2" role="group" id="action-buttons">
                                        <a class="btn btn-sm btn-primary"
                                           href="{{ route('teachers.edit', $teacher->id) }}" data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Edit teacher's info">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{ route('courses.delete.person', [$course->id, $teacher->id]) }}"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top" title="Remove teacher from this course">
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
        </div>
    </div>
@endsection
