@extends('welcome')


@section('content')
    <h1>Homepage</h1>
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('dashboard')}}">Dashboard</a>
@endsection
