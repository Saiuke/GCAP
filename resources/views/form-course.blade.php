@extends('home')
@section('content')
    <div class="card my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ isset($course->id) ? "Edit " : "Register new" }} course
        </div>
        <div class="card-body">
            <div class="row">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
            <form
                action="{!! isset($course->id) ? route('courses.update', [$course->id]) : route('courses.store') !!}"
                method="POST">
                <div class="row g-3">
                    @csrf
                    @if(isset($course->id))
                        @method('PUT')
                    @endif
                    <div class="col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="History of Biology"
                               value="{{ $course->name ?? '' }}">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" value="{{ $course->description ?? '' }}">
                            {{ $course->description ?? '' }}
                        </textarea>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
