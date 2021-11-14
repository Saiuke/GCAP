@extends('home')
@section('content')
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
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->document }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
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
