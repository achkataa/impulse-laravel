@extends('welcome')

@section('content')
    <h1>Login -> {{$r}}</h1>

    @if ($qrcode)
        {{ $qrcode }}

        <br/>
        <a href="{{$deep_link}}">
            LOGIN VIA APP
        </a>
    @endif

    <script>
        const sessId = '{{session()->getId()}}';
        function getToken() {
            fetch(`http://127.0.0.1:8003/api/v1/auth/login?t=${sessId}`).then(
                res => res.json()
            ).then(({status}) => {
                if (status === 'success') {
                    window.location.href = '{{route('dashboard')}}';
                }
            }).catch(err => console.log(err));
        }


        window.addEventListener('load', function (event) {
            setInterval(getToken, 3000);
        });


    </script>
@endsection
