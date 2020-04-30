@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

    @if (Session:: has ('cart'))

        <div class="row">

           <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">

            <ul class="list-group">
                @foreach($products as $product)


                   <li class="list-group-item">

                    <span class="badge">{{ $product['qty'] }}</span>
                       <strong> {{ $product['item']['title'] }} </strong>
                       <span class="label label-success">{{ $product['price'] }}</span>



                           <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuń</button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                               <a class="dropdown-item" href="{{ route('product.reducebyOne', ['id'=> $product['item']['id'] ]) }}">Usuń 1</a>
                               <a class="dropdown-item" href="{{ route('product.reducebyOne', ['id'=> $product['item']['id'] ]) }}">Usuń wszystko</a>

                           </div>


                   </li>

                    @endforeach
            </ul>

           </div>
        </div>

        <div class="row">

            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong> Suma: {{ $totalPrice }}</strong>
            </div>

        </div>
    <hr>
        <div class="row">

            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success"> Zapłać </a>
            </div>

        </div>

    @else

        <div class="row">

            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2> Brak produktów w koszyku!</h2>
            </div>

        </div>

    @endif

@endsection
