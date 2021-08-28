@extends('layout.app')

@section('content')
<h3>Halo, {{$name}} !</h3>
<p>Berikut Akunmu : </p>
<ul>
    <li>Name : {{$name}}</li>
    <li>Email : {{$email}}</li>
    <li>
        Password : {{$password}}
    </li>
</ul>
@endsection