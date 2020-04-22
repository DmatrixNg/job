<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
use App\Request as Req;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware(['auth']);
     }

    public function index()
    {
      // dd(request()->cost[0]);
      $cost = request()->cost;
      $tcost = request()->tcost;
      $product = request()->product;
      $items = [];
      for ($i=0; $i < count($product) ; $i++) {
        $item= array('product_id' => $product[$i],
        'product_cost' => $cost[$i]);
        array_push($items, $item);
      }
      // dd(serialize($items));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd(request());

      $cost = request()->cost;
      $tcost = request()->tcost;
      $product = request()->product;
      $type = request()->type[0];
      $items = [];
      for ($i=0; $i < count($product) ; $i++) {
        $item= array('product_id' => $product[$i],
        'product_cost' => $cost[$i]);
        array_push($items, $item);
      }

      $location = $request->user_location;
      if (isset($request->location)) {
        $location = $request->location;
      }
      if($location == ""){
      // dd('here');
        return back()->with('message', 'Please Your location is not set');
      }
      $data = array(
        'userId' => \Auth::user()->id,
        'order' => serialize($items),
        'type' => $type,
        'cost' => $tcost,
        'location' =>$location,
        'pickup_code' => substr(md5(uniqid(mt_rand(), true)), 0, 6)
     );

     $id = Order::firstOrCreate($data);
     // dd(($id->id));
     return redirect("pay/payment/{$id->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $data = $order->firstWhere(['id' => request()->id, 'userId' => Auth::user()->id]);
        // dd();
        if (!$data) {
          return back();
        }else {

        if(is_null($data->pay_status)){
          // dd($data->pay_status);

          return view('store.pay',['data' => $data]);
        }
        return redirect('/');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function paySuccess(Request $request, Order $order)
    {

      $order->where('id', $request->id)
      ->update([
        'pay_status' => 'paid'

      ]);
      $order = $order->where('id', $request->id)->first();
      // dd($order->pickup_code);
      $order = array(
        'orderId' => $request->id,
        'pay'     => $order->cost,
        'pickup_code'=> $order->pickup_code,
        'status'=> 'open'
     );
      Req::create($order);
      // return back();


    }
    public function location()
    {
      // \Auth::user()->profile()->get();
      return view('user.location', ['user' => Auth::user()]);

    }

    public function user(Request $request, Order $order)
    {
      $data = $order->Where(['userId' => Auth::user()->id])->Where("pay_status", "!=", null)->get();
      // dd($data);
      return view('user.order',['order'=>$data]);
    }
}
