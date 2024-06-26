@extends('layouts.admin')
@section('content')
    <h2>New Project</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="my-4" method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Project Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Upload a file</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Choose a type</label>
            <select class="form-select" aria-label="Default select example" id="type_id" name="type_id">
                <option value="">Open this select menu</option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-4">
            <h5>Technologies</h5>
            @foreach ($technologies as $technology)
            <div class="form-check">
                <input class="form-check-input" @checked(in_array($technology->id, old('techs', []))) type="checkbox" value="{{$technology->id}}" id="tech-{{$technology->id}}" name="techs[]">
                <label class="form-check-label" for="tech-{{$technology->id}}">
                  {{ $technology->name }}
                </label>
            </div>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name') }}">
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="10" name="summary">{{ old('summary') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
