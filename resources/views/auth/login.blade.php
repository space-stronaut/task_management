@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="card p-4 mx-auto mt-5" style="max-width: 30rem">
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block load">Login</button>
      </form>
</div>

<script>
    const forms = document.querySelector('form')

    forms.addEventListener('submit', () => {
        const load = document.querySelector('.load')

        load.textContent = "Loading..."
    })
</script>

@endsection