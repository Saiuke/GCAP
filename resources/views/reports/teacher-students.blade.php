@extends('home')
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Search and select teacher
                </div>
                <div class="card-body">
                    <form class="row my-2" action="{{ route('teachers.report') }}" method="post">
                        @csrf
                        <input type="hidden" name="person-id" id="selected-person-id" >
                        <div class="col-auto">
                            <label for="search-person" class="col-form-label">Search and select teacher</label>
                        </div>
                        <div class="col-6">
                            <input id="search-person" data-search-route="{{ route('teachers.search') }}" name="search" class="form-control" type="text" value="{{ $teacher->name ?? '' }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Generate report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(isset($teacher))
            <div class="col-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        {{ $teacher->name }} details
                    </div>
                    <div class="card-body">
                            <p><b>Name: </b>{{ $teacher->name }}</p>
                            <p><b>Document: </b>{{ $teacher->document }}</p>
                            <p><b>Phone: </b>{{ $teacher->phone }}</p>
                            <p><b>Email: </b>{{ $teacher->email }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-6">
            @if(isset($students))
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Students under this teacher
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
            @endif
        </div>
        <div class="col-6">
            @if(isset($courses))
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Courses under this teacher
                </div>
                <div class="card-body">
                    <table class="table">
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
            @endif
        </div>
    </div>
@endsection
