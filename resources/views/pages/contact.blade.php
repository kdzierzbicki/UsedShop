@extends('layouts.master')

@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Napisz wiadomość</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Temat:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Wiadomość:</label>
                    <textarea id="message" name="message" class="form-control">Wpisz swój tekst...</textarea>
                </div>

                <input type="submit" value="Wyślij" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection