@extends('layouts.admin')
@section('content')

@section('content')
<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data"  enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name">
    </div>

    <div class="mb-3">
        <label for="link" class="form-label">link</label>
        <input type="text" class="form-control" id="link" placeholder="link" name="link">
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Select Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == $category->id ? 'selected' : '' }}>{{$category->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>

    <div class="mb-3">
        <p>Seleziona le tecnologie</p>
        @foreach ($technologies as $technology)

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$technology->id}}" id="{{$technology->id}}"
                    name="technologies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ $technology->name}}
                </label>
            </div>
        @endforeach 


    </div>

    <div class="mb-3">
        <label for="img">Image</label>
        <input type="file" name="img">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-danger">Create</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
</form>
@endsection