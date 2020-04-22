<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Builder;
use App\Core\Images;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware(['admin_auth','admin','owners']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores = Vendor::all();
      $orders = Order::all();

      $buyers = User::query()
      ->whereHas('setting', function (Builder $query) {
        $query->where('type', '!=','administrator');
      })->get();
      $dispatchers = User::query()
      ->whereHas('setting', function (Builder $query) {
        $query->where('privilages', '=','dispatcher');
      })->get();
      $admins = User::query()
      ->whereHas('setting', function (Builder $query) {
        $query->where('privilages', '=','admin');
      })->get();

        return view('store.dashboard', [
          'stores' => $stores,
          'orders' => $orders,
          'dispatchers' => $dispatchers,
          'admins' => $admins,
          'buyers' => $buyers
        ]);
    }


}
