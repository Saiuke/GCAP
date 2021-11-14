@extends('home')
@section('content')
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
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->description }}</td>
                        <td>Jhon Rudy</td>
                        <td>{{ rand(8,37) }}</td>
                        <td>
                            <div class="btn-group me-2" role="group" id="action-buttons">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger delete-entry">
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
