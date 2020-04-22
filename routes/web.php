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
Route::get('/search', function () {

 return view('search');
});
Route::get('products', function () {
  $product = \App\Product::listproducts()->simplePaginate(20);;

  return view('layouts.productList',['products' =>$product]);
});

Route::prefix('admin')->group(function () {

  // Route::get('/', function () {
  //       if (Auth::user()) {
  //
  //         return view('welcome');
  //       }else {
  //         return redirect('/admin/login');
  //       }
  // });
  Route::get('/login', function () {

        return view('admin.login');
  })->name('admin_login');

  Route::get('/register', function () {

        return view('admin.register');
  });


});
Auth::routes();
Route::get('/track_delivery', function () {
    return view('store.track_delivery');
});
Route::get('/product_categories', function () {
  $stores = [];
    return view('store.product_categories',['stores' => $stores]);
});
Route::get('/restaurants', function () {
  $stores = \App\Vendor::where('type','restaurants')->get();
    return view('store.restaurants',['stores' => $stores]);
});
Route::get('/all_groceries', function () {
  $stores = \App\Vendor::where('type','groceries')->get();

    return view('store.all_groceries',['stores' => $stores]);
});
// Route::get('/home', 'HomeController@stores')->name('home');

Route::get('/home', function () {
 $stores = \App\Vendor::all();
  return view('store.public', ['stores' => $stores]);
});
Route::get('/accept', 'RequestController@accept');
Route::get('/done', 'RequestController@done');
Route::get('/cancel', 'RequestController@cancel');
Route::get('/ready', 'RequestController@ready');
Route::get('/decline', 'RequestController@decline');
Route::get('/my_orders', 'OrderController@user');

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

Route::prefix('admin')->group(function () {

  Route::get('/create', 'VendorController@create');
  Route::get('/', 'AdminController@index');
  Route::post('addvendor', 'VendorController@store')->name('addvendor');
  Route::get('store/{store}/addproduct', 'ProductController@create');
  Route::get('delete/{item}', 'ProductController@destroy');
  Route::get('store/{store}', 'VendorController@show');
  Route::post('addproduct', 'ProductController@store')->name('addproduct');
});

Route::prefix('dispatcher')->group(function () {

  Route::get('/requests', 'RequestController@show');
  Route::get('/pickups', 'RespondController@index');

  Route::get('/', 'DispatcherController@index');
  Route::get('store/{store}/addproduct', 'ProductController@create');
  Route::get('delete/{item}', 'ProductController@destroy');
  Route::get('store/{store}', 'VendorController@show');
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
Route::get('/fix', function () {
$users = \App\User::all();
 foreach ($users as $user) {

             $setting = array(
               'userId' => $user->id,
               'type' => 'guest',
               'privilages' => "buyers",
               'status' => 'active',
             );
             App\UserSetting::create($setting);
 }
});

Route::get('/read_cart', function () {
 // dd(request()->all());
 $cart = json_decode(\Cookie::get('cart'), true);
// dd($cart);
 return $cart;

});
