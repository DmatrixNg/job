<?php
use Illuminate\Http\Response;
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

Route::get('/', function () {
// dd(\App\Vendor::where("type",'restaurants')->get());

    return view('welcome');
});


Auth::routes();
Route::get('/track_delivery', function () {
    return view('store.track_delivery');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accept', 'RequestController@accept');
Route::get('/done', 'RequestController@done');
Route::get('/cancel', 'RequestController@cancel');
Route::get('/ready', 'RequestController@ready');
Route::get('/decline', 'RequestController@decline');
Route::get('/pickups', 'RespondController@index');


Route::get('help_desk', 'ReviewController@index');
Route::post('contact', 'ReviewController@store')->name('contact');



Route::get('/checkout', 'VendorController@checkout');

Route::prefix('pay')->group(function () {
  Route::get('/test', 'TransactionController@test');
  Route::get('/verify', 'TransactionController@create');
  Route::post('/pay', 'OrderController@store');
  Route::get('/payment/{id}', 'OrderController@show');
  // Route::get('/checkout', 'VendorController@checkout');
  Route::get('/location', 'OrderController@location');
  Route::post('/location', 'OrderController@update')->name('location');
  // Route::post('/default_location', 'ProfileController@update')->name('Deflocation');
  Route::post('/default_location', 'UserSettingController@update')->name('Deflocation');
  Route::get('/pay_successful/{id}', 'OrderController@paySuccess');

});

Route::prefix('store')->group(function () {
  Route::get('/', 'VendorController@create');
  Route::get('dashboard', 'VendorController@index');
  Route::post('addvendor', 'VendorController@store')->name('addvendor');
  Route::get('{store}/addproduct', 'ProductController@create');
  Route::get('delete/{item}', 'ProductController@destroy');
  Route::get('{store}', 'VendorController@show');
  Route::post('addproduct', 'ProductController@store')->name('addproduct');
});
Route::prefix('stores')->group(function () {
Route::get('/', function () {
 $stores = \App\Vendor::all();
  return view('store.public', ['stores' => $stores]);
});

Route::get('p/{store}', 'VendorController@public');
});

Route::get('/add_cart', function () {

if (request()->get('action') == 1) {

$cookie =[];
// dd(\Cookie::get('cart'));
if (!is_null(\Cookie::get('cart'))) {

$oldcookie = json_decode(\Cookie::get('cart'), true);

foreach ($oldcookie as $value) {

  array_push($cookie,$value);
}
}
$newcookie = request()->all();
array_push($cookie,$newcookie);

// dd($cookie);
 return response('add')->cookie(
     'cart',json_encode($cookie), 30
 );
}else {
  // dd(request()->get('action'));
  $oldcookie = json_decode(\Cookie::get('cart'), true);
if ($oldcookie) {
  foreach ($oldcookie as $key => $value) {
    // dump($key);

    if ($value['store'] == request()->get('store') &&
        $value['product'] == request()->get('product')) {
          unset($oldcookie[$key]);
    }
    // dump($oldcookie);
    // array_push($cookie,$value);
  }
  return response('remove')->cookie(
      'cart',json_encode($oldcookie), 30
  );
}
}
});


Route::get('/read_cart', function () {
 // dd(request()->all());
 $cart = json_decode(\Cookie::get('cart'), true);
// dd($cart);
 return $cart;

});
  Route::get('/d/requests', 'RequestController@show');

  Route::get('/{username}/orders', 'OrderController@user');
