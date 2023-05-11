@extends('welcome')

@section('content')
    <h1>Dashboard</h1>

    <form method="post" action="{{route('logout')}}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
