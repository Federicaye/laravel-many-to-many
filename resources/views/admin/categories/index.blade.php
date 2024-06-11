@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between">
    <p>Ctegories</p> 

</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>name</th>
            <th>slug</th>
            
        </tr>
    </thead>
    @foreach ($categories as $category)
        <tr>
        <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')
            <!-- assegno ai p e agli input di ogni riga una classe 'category->id' -->
            <td>  
                <p class="p {{$category->id}}">{{$category->name}} </p>
                <input type="text" name="name" class="d-none edit-input {{$category->id}}"
                value="{{ old('title', $category->name) }}" required maxlength="255"></td>
            <td> 
                <p class="td {{$category->id}}">{{$category->slug}} </p>
                <input type="text" name="slug" class="d-none edit-post {{$category->id}}"
                value="{{ old('title', $category->slug) }}" required maxlength="255"></td>
                <td><button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                </form>
            <td>
                <a href="" id="{{$category->id}}" class="edit-button"> <i class="fa-solid fa-pencil"></i></a>
                <a href=""><i class="fa-solid fa-trash"></i></a>
                <a href=""><i class="fa-solid fa-eye"></i></a>
            </td>
        </tr>

    @endforeach
</table>
@endsection