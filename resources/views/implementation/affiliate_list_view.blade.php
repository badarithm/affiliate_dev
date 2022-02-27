@extends('templates.main')

@section('title', 'Affiliates withing certain radius' )

@section('content')
    @include('implementation.file_upload_form')
    <hr />
    @include('implementation.affiliate_list')
@endsection
