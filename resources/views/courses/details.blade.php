@extends('home')
@section('content')
    <div class="row mb-4">
        <div class="col">
            <a type="button" class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}">Edit course</a>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ $course->name }} Details
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Students of this course
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
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
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
