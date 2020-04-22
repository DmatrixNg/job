<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\User;
use Auth;
use App\Respond;

class DispatcherController extends Controller
{
  public function __construct()
  {
      $this->middleware(['admin_auth','dispatcher','owners']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $order = Respond::where('userId', Auth::user()->id)->get();

// foreach ($order as $key => $value) {
//   dd($value->request()->first()->order);

        return view("dispatcher.dashboard", ['order' => $order]);
    }
}
