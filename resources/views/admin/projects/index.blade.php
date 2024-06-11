@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between">
    <p>Projects</p>
    <div>
        <form action="{{route('admin.projects.index')}}" method="GET" id="search-form-tech">
            <select name="search-tech" id="search-tech" class="form-select">
            <option value="">all</option>
                @foreach ($technologies as $technology)
                    <option value="{{$technology->id}}">{{$technology->name}}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div>
        <form action="{{route('admin.projects.index')}}" method="GET" id="search-form-cat">
            <select name="search-cat" id="search-cat" class="form-select">
            <option value="">all</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </form>
    </div>
    

</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>name</th>
            <th>link</th>
            <th>category</th>
            <th>technology</th>
            <th>description</th>
            <th>creation data</th>
            <th>actions</th>
        </tr>
    </thead>
    @foreach ($projects as $project)
        <tr>
            <td>{{$project->name}}</td>
            <td>{{$project->link}}</td>
            <td>{{$project->category->name}}</td>
            <td>
                @foreach ($technologies as $technology)
                    <span>{{$technology->name}}</span>
                </td> @endforeach
            <td>{{$project->description}}</td>
            <td>{{$project->date_creation}}</td>
            <td>
                <a href=""> <i class="fa-solid fa-pencil"></i></a>
                <a href=""><i class="fa-solid fa-trash"></i></a>
                <a href=""><i class="fa-solid fa-eye"></i></a>
            </td>
        </tr>

    @endforeach
</table>
@endsection