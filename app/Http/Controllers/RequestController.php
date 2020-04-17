<?php

namespace App\Http\Controllers;

use App\Request as Req;
use Auth;
use App\Profile;
use App\Wallet;
use App\Order;
use App\Respond;
use Illuminate\Http\Request;

class RequestController extends Controller
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
        $OpenRequest = Req::where('status','open')->get();
        return view('business.requests',["Goods" => $OpenRequest]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

      // $OpenRequest = Req::where('status','open')->get();



          return view('store.requests');



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Req $req, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

    public function accept(Request $request, Order $order)
    {
      // dd($request->order);
    $accept =  Req::where('orderId', $request->order)
      ->update([
        'status' => 'accepted'

      ]);
      if ($accept) {

        $id = Req::firstWhere('orderId', $request->order);

        $data = array(
          'userId' => Auth::user()->id,
          'requestId' => $id->id,
          'pickup_code' => $id->orders->pickup_code,
          'status' => "open"
        );
        // dd($data);
        Respond::create($data);
      }
   return redirect("pickups");
    }

    public function ready(Request $request, Order $order)
    {
      // dd($request->order);
      Req::where('id', $request->order)
      ->update([
        'status' => 'ready'

      ]);


      Respond::where('requestId', $request->order)
      ->update([
        'status' => 'done'

      ]);


   return back();
    }

    public function decline(Request $request, Order $order)
    {
      // dd($request->order);
      Req::where('id', $request->order)
      ->update([
        'status' => 'open'

      ]);


      Respond::where('requestId', $request->order)
      ->delete();


   return back();
    }

    public function done(Request $request, Order $order)
    {
      $ready = Req::where(['id' => $request->id, 'status' => 'ready'])
      ->update([
        'status' => 'closed'

      ]);

if ($ready) {

  Respond::where('requestId', $request->id)
  ->update([
    'status' => 'done'

  ]);
  $user = Respond::where('requestId', $request->id)
  ->first('userId');
  // dd($user->userId);
  $wallet = array(
    'userId' => $user->userId,
    'amount' => 100,
    'bonus' => 0,
    'currency' => "NGN",
    'type' => 'delivery',
    'status' => 'approved');

    Wallet::create($wallet);
}

   return back();
 }
 public function cancel(Request $request, Order $order)
 {
   // dd($request->id);
   $delete = Req::where('id', $request->id)
   ->delete();
// dd($delete);
if ($delete) {

  $wallet = array(
    'userId' => Auth::user()->id ,
    'amount' => 100,
    'bonus' => 0,
    'currency' => "NGN",
    'type' => 'declined_order',
    'status' => 'approved');

    Wallet::create($wallet);
}

return back();
}
}
