

<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatibile" content="ie=edge">
    <title>Zapomniałem hasło</title>

</head>

<body>

<form action="{{url('/forgot_password')}}}" method="post">

    {{csrf_field() }}

    @if (sesion ('error'))

        <div> {{ session('error') }} </div>

        @endif

    @if (sesion ('success'))

        <div>{{ session('success') }} </div>
    @endif



    <input type="email" name="email" id="email">
    <button type="submit"> Submit</button>

</form>

</body>

</html>