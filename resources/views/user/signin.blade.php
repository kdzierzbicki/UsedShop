@extends('layouts.master')

@section('content')

    <div class = "row" >
        <div class="col-md-4 col-md-offset-4">

            <h1>Zaloguj się</h1>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach

                </div>
            @endif
            <form action="{{ route('user.profile') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" class="form-control" >

                </div>


                <div class="form-group">
                    <label for="password">Hasło</label>
                    <input type="password" id="password" name="password" class="form-control" >

                </div>
                <button type="submit" class="btn btn-primary">Zaloguj</button>

                {{ csrf_field() }}

            </form>
            <p> Nie masz jeszcze konta? <a href="{{ route('register') }}">Załóż tutaj</a></p>
        </div>

    </div>

@endsection
