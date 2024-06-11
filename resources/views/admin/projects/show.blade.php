@extends('layouts.admin')
@section('content')


@foreach ($technologies as $technology)
<span class="badge text-bg-dark">{{$technology->name}}</span>
@endforeach ()


@endsection