<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('src/css/app.css') }}">

    @yield('styles')
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>

<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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


@yield('scripts')
</body>
</html>
