@extends('templates.main')

@section('title', $exception->getMessage())

@section('content')
    <div class="alert alert-danger" role="alert">
       Something went wrong: {{$exception->getMessage()}}
    </div>
@endsection
