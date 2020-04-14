<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UsedShop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/shop/resources/css/style.css" />




        <style>
            html, body {

                background-color: #d8e4ee;
                color: #3e5b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 5px;
                top: 10px;
            }

            .content {
                text-align: center;
                
            }

            .title {
                font-size: 80px;

            }

            .links > a {
                color: #05606f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: #0068ff;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 18px;
            }
        </style>
    </head>
    <body>




        <div class="flex-center position-ref full-height" >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('user.profile') }}">Panel logowania</a>
                    @else
                        <a href="{{ route('login') }}">Logowanie</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Rejestracja</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Sprzedaż Sprzętu firmowego
                </div>

                <div class ="links">
                    <a href="{{ url('/') }}">Strona Główna</a>
                    <a href="{{ url('/cart') }}">Zamów</a>
                    <!-- <a href="{{ url('/index') }}">Zadaj pytanie</a>  -->
                    <a href={{ url('/contact') }}>Kontakt</a>


                </div>
               
            </div>
            
        </div>
        <div class="foot">@Kamil Dzierzbicki Ver.1.0</div>
        
        
    </body>
    
</html>
