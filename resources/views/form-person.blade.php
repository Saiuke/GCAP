@extends('home')
@section('content')
    <div class="card my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            {{ isset($person->id) ? "Edit " : "Register new" }} {{ $personCategorylabel ?? $person->category_label }}
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
                action="{!! isset($person->id) ? route('people.update', [$person->id]) : route('people.store') !!}"
                method="POST">
                <div class="row g-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category" id="category" value="{{ $person->category ?? $personCategoryId }}">
                    <div class="col-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="Jhon Silvester Cardigan"
                               value="{{ $person->name ?? '' }}">
                    </div>
                    <div class="col-4">
                        <label for="document" class="form-label">Document</label>
                        <input type="text" name="document" class="form-control" id="document"
                               placeholder="145.256.524.256"
                               value="{{ $person->document ?? '' }}">
                    </div>
                </div>
                <div class="row g-3 mt-4">
                    <div class="col-4">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="text" max="32" name="phone" class="form-control" id="phone"
                               placeholder="+55 386 524 4112" value="{{ $person->phone ?? '' }}">
                    </div>
                    <div class="col-4">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                               value="{{ $person->email ?? '' }}">
                    </div>
                </div>
                <div class="row g-3 mt-4">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
