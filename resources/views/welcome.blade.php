@extends('layout')

@section('content')
    @include('navbar')
    @include('about')
    @include('vision')
    @include('frameworks')
    @include('services')   
    @include('projects')
    
    @include('customframeworks')
       <div id="app">
        <example-component />
       </div>   
@endsection