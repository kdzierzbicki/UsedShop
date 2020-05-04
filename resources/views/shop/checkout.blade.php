@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<div class="row">

  <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
    <h1>Płatność</h1>
    <h4> Wartość: PLN {{ $total }} </h4>

    <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
      {{ Session::get('error') }}
    </div>

    <form action="{{ route('checkout') }}" method="post" id="checkout-form">
      <div class="row">
       <div class="col-xs-12">
         <div class="form-group">
           <label for="name">Imię i Nazwisko</label>
           <input type="text" id="name" id="name" class="form-control" required>
         </div>
       </div>

         <div class="col-xs-12">
           <div class="form-group">
             <label for="name">Adres</label>
             <input type="text" id="address" name="address" class="form-control" required>
           </div>
         </div>
         <hr>
         <div class="col-xs-12">
           <div class="form-group">
             <label for="name">Nazwa twojej karty</label>
             <input type="text" id="card-name" class="form-control" required>
           </div>
         </div>

         <div class="col-xs-12">
           <div class="form-group">
             <label for="name">Numer Karty</label>
             <input type="text" id="card-number" class="form-control" required>
           </div>
         </div>

         <div class="col-xs-12">
           <div class="form-group">
             <label for="name">Miesiąc ważności</label>
             <input type="text" id="card-expiry-month" class="form-control" required>
           </div>
         </div>

         <div class="col-xs-12">
           <div class="form-group">
             <label for="name">Rok ważności</label>
             <input type="text" id="card-expiry-year" class="form-control" required>
           </div>
         </div>

         <div class="col-xs-12">
           <div class="form-group">
             <label for="card-cvc">CVC</label>
             <input type="text" id="card-cvc" class="form-control" required>
           </div>
         </div>
       </div>

       {{ csrf_field() }}
       <button type="submit" class="btn btn-success">Zapłać </button>
    </form>

  </div>
</div>
@endsection

@section('script')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<!-- <script type="text/javascript" src="">{{ URL::to('public/js/checkout.js') }}</script> -->

<script type="text/javascript" >
Stripe.setPublishableKey('pk_test_Ll19ejOyGKtqLY2Yd9V5pzh600zT77R9la');

var $form = $('#checkout-form');

$form.submit(function(event){

  $('#charge-error').addClass('hidden');
  $form.find('button').prop('disabled', true);
  Stripe.card.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    exp_month: $('#card-expiry-month').val(),
    exp_year: $('#card-expiry-year').val(),
    name: $('#card-name').val()
  }, stripeResponseHandler);
  return false;

});

function stripeResponseHandler(status, response) {
  if (response.error){
    $('#charge-error').removeClass('hidden');
    $('#charge-error').text(response.error.message);
    $form.find('button').prop('disabled', false);
  }

  else {

    var token = response.id;
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

    $form.get(0).submit();

  }
}

</script>


@endsection
