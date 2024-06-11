@extends('layouts.admin')
@section('content')

<div class="container">
    <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="link">Link</label>
            <input type="text" name="link">
        </div>

        <div>
            <label for="category_id" class="form-label">Select Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            @foreach ($technologies as $techology )
            
            <input type="checkbox" name="tags[]" class="btn-check {{$project->technologies->contains($technology->id)?}}" id="btn-check" autocomplete="off">
            <label class="btn btn-primary" for="btn-check">{{$technology->name}}</label>

            @endforeach
        </div>

        <div>
            <label for="technology">Technology</label>
            <input type="text" name="technology">
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description">
        </div>

        <div>
            <label for="date_creation">Date of creation</label>
            <input type="date" name="date_creation">
        </div>

        <div>
            <label for="img">Image</label>
            <input type="file" name="img">
        </div>

        <input type="submit">
    </form>
</div>
@endsection