<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Order;
use App\Request as Req;
use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class TransactionController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Order $order)
    {
      $data = json_decode($request->resp);

    if ($data->data->tx->status == "successful") {

    $order->where('id', 2)
    ->update([
      'pay_status' => 'paid'

    ]);
    $order = $order->where('id', 2)->first();
    // dd($order->pickup_code);
    $order = array(
      'orderId' => 2,
      'pay'     => $order->cost,
      'pickup_code'=> $order->pickup_code,
      'status'=> 'open'
    );
    Req::create($order);


  // $data = array(  );
        // dd($data);
        Transaction::create($data);
        return back()->with('message', 'payment successful');
      }
      else {
        return back()->with('message', 'payment error, try again');
      }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function test(Request $request, Order $order)
    {
      $orderIni = $order->where('id', $request->id)->first();
      // dd($order->pickup_code);
    $cookie = \Cookie::forget('cart');
      $order = array(
        'orderId' => $request->id,
        'pay'     => $orderIni->cost,
        'pickup_code'=> $orderIni->pickup_code,
        'status'=> 'open'
      );
      $request = Req::create($order);
if ($request) {
  return back()->withCookie($cookie)->with(['message' => 'Payment successful', 'code' =>$orderIni->pickup_code]);
}


    }
}
