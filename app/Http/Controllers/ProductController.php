<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;



class ProductController extends Controller
{
    public function getIndex()

    {
        $products = Product::all();
        return view ('shop.cart', ['products'=> $products ]);
    }

    public function getAddToCart(Request $request, $id){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get ('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> add($product, $product-> id);

        $request-> session()-> put('cart', $cart);

        return redirect()-> route('shop.cart');
    }




    public function getReduceByOne($id) {

      $oldCart = Session::has('cart') ? Session::get ('cart') : null;
      $cart = new Cart($oldCart);
      $cart->ReduceByOne($id);

      
      if (count ($cart->items) > 0){

        Session::put('cart', $cart);
      }

      else{

        Session::forget('cart');
      }

      return redirect()->route('product.shoppingCart');

    }

    public function getRemoveItem($id){

      $oldCart = Session::has('cart') ? Session::get ('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count ($cart->items) > 0){

        Session::put('cart', $cart);
      }

      else{

        Session::forget('cart');
      }


      Session::put('cart', $cart);
      return redirect()->route('product.shoppingCart');
    
    }



    public function getCart(){

        if (!Session::has ('cart')){

               return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products'=> $cart -> items, 'totalPrice' => $cart -> totalPrice]);
    }

    public function getCheckout() {

      if (!Session::has('cart')) {

        return view('shop.shopping-cart');

      }

      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('shop.checkout', ['total' => $total]);
    }


  public function postCheckout(Request $request)
  {
    if (!Session::has('cart')) {
      return redirect()-> route('shop.shoppingCart');
  }

  $oldCart = Session::get('cart');
  $cart = new Cart($oldCart);

  \Stripe\Stripe::setApiKey('sk_test_SfhfCofjYEe0mDSV3hMbZrFW00lLHiI0BX');

  //Stripe::setApiKey('sk_test_SfhfCofjYEe0mDSV3hMbZrFW00lLHiI0BX'); //test


  try {

    // $charge = \Stripe\Charge::create(array(
    //   "amount" => $cart->totalPrice * 100,
    //   "currency" => "usd",
    //   "source" => $request->input('_token'),  // z stripe.js
    //   "description" => "Test Charge"
    // ));

  $charge = \Stripe\Charge::create ([
                    "amount" => 100 * 100, ///przekazać $cart->totalPrice * 100
                    "currency" => "usd",
                    "source" => $request->input('stripeToken'),
                    "description" => "Test payment from itsolutionstuff.com."
            ]);




$order = new Order();
$order->cart = serialize($cart);
// $order->address = $request->input('address');
$order->address = "ergergergerg"; //addres przkazać z formularzaq
// $order->name = $request->input('name');
$order->name = "fwerfwefwef"; //nazwa z formularza
$order->payment_id = $charge->id;
$order->user_id = 123; //id użytkownika zalogowanego
$order->save();

$user =  Auth::user();


$user->orders()->save($order);

  } catch (\Exception $e) {

    return redirect()->route('checkout')->with('error' , $e->getMessage());
  }
  Session::forget('cart');
  return redirect()->route('shop.cart');
  return redirect()->route('user.signup')->with('Sukces!', 'Udało ci się kupić produkty!');

}

}
