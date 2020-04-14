<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get ('/', [

   'uses'=> 'ProductController@getIndex',
    'as'=> 'product.index'
]);



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/forgot_password', 'Security/ForgotPassword@forgot');
Route::post('/forgot_password', 'Security/ForgotPassword@password');

//Route::get('/cart', function () {
//    return view('shop.cart');
//});

Route::get('/index', function () {
    return view('comment.index');
});




//Route::get('/contact', function () {
    //return view('contact.contact');
//});


Route::get('/reduce/{id}', [
'uses' => 'ProductController@getReducebyOne',
'as' => 'product.reducebyOne'

]);


Route::get('/remove/{id}', [

        'uses' => 'ProductController@getRemoveItem',
        'as' => 'product.remove'

    ]);

    Route::get('/signup', [
        'uses'=>'UserController@getSignup',
        'as' => 'user.signup'

    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as'=> 'user.signup'

    ]);

    Route::get('/signin', [
        'uses'=>'UserController@getSignin',
        'as' => 'user.signin'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as'=> 'user.signin'

    ]);


    Route::get('user/profile', [
        'uses'=>'UserController@getProfile',
        'as' => 'user.profile'

    ]);


    Route::get('user/logout', [
        'uses' => 'UserController@getLogout' ,
        'as' => 'user.logout'

    ]);



Route::get('/add-to-cart/{id}',[

    'uses'=>'ProductController@getAddToCart',
    'as' => 'product.addToCart'
    ]);

Route::get('/cart',[
    'uses'=>'ProductController@getIndex',
    'as' => 'shop.cart'
    ]);

Route::get('/shopping-cart',[

    'uses'=>'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
 'uses' => 'ProductController@getCheckout',
 'as' => 'checkout',
  'middleware' => 'auth'
 

]);

Route::post('/checkout', [
 'uses' => 'ProductController@postCheckout',
 'as' => 'checkout',
 'middleware' => 'auth'


]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/contact', [

    'uses'=> 'PagesController@getContact',
        'as' => 'contact'
]);

Route::post('/contact',[

    'uses' => 'PagesController@postContact',
    'as' => 'contact'
]);

Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');