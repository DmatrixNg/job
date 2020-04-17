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
      // $data = json_decode(file_get_contents("https://voguepay.com/?v_transaction_id=11111&type=json&demo=true"));
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


  $data = array(

    "txRef"=> $data->tx->txRef,
        "orderRef"=> $data->tx->orderRef,
        "flwRef"=> $data->tx->flwRef,
        "redirectUrl"=> $data->tx->redirectUrl,
        "device_fingerprint"=> $data->tx->device_fingerprint,
        "settlement_token"=> $data->tx->settlement_token,
        "cycle"=> $data->tx->cycle,
        "amount"=> $data->tx->amount,
        "charged_amount"=> $data->tx->charged_amount,
        "appfee"=> $data->tx->appfee,
        "merchantfee"=> $data->tx->merchantfee,
        "merchantbearsfee"=> $data->tx->merchantbearsfee,
        "chargeResponseCode"=> $data->tx->chargeResponseCode,
        "raveRef"=> $data->tx->raveRef,
        "chargeResponseMessage"=> $data->tx->chargeResponseMessage,
        "authModelUsed"=> $data->tx->authModelUsed,
        "currency"=> $data->tx->currency,
        "IP"=> $data->tx->IP,
        "narration"=> $data->tx->narration,
        "status"=> $data->tx->status,
        "modalauditid"=> $data->tx->modalauditid,
        "vbvrespmessage"=> $data->tx->vbvrespmessage,
        "authurl"=> $data->tx->authurl,
        "vbvrespcode"=> $data->tx->vbvrespcode,
        "acctvalrespmsg"=> $data->tx->acctvalrespmsg,
        "acctvalrespcode"=> $data->tx->acctvalrespcode,
        "paymentType"=> $data->tx->paymentType,
        "paymentPlan"=> $data->tx->paymentPlan,
        "paymentPage"=> $data->tx->paymentPage,
        "paymentId"=> $data->tx->paymentId,
        "fraud_status"=> $data->tx->fraud_status,
        "charge_type"=> $data->tx->charge_type,
        "is_live"=> $data->tx->is_live,
        "retry_attempt"=> $data->tx->retry_attempt,
        "getpaidBatchId"=> $data->tx->getpaidBatchId,
        "createdAt"=> $data->tx->createdAt,
        "updatedAt"=> $data->tx->updatedAt,
        "deletedAt"=> $data->tx->deletedAt,
        "customerId"=> $data->tx->customerId,
        "AccountId"=> $data->tx->AccountId
        );
        // dd($data);
        Transaction::create($data);
        return back()->with('message', 'payment successful');
      }
      else {
        return back()->with('message', 'payment error, try again');
      }
      //     $slug = $data->data->tx->txRef;
      //
      //     // dd($data->tx->vbvrespmessage);
      //     if ($data->data->tx->status == "successful") {
      //
      //
      //
      // if ($data->status == "Approved") {
      //
      // $data = array(
      //   'merchant_id' => $data->merchant_id,
      //   'transaction_id' => $data->transaction_id,
      //   'email' => $data->email,
      //   'total' => $data->total,
      //   'total_paid_by_buyer' => $data->total_paid_by_buyer,
      //   'total_credited_to_merchant' => $data->total_credited_to_merchant,
      //   'total_credited_to_merchant' => $data->total_credited_to_merchant,
      //   'extra_charges_by_merchant' => $data->extra_charges_by_merchant,
      //   'merchant_ref' => $data->merchant_ref,
      //   'memo' => $data->memo,
      //   'date' => $data->date,
      //   'referrer' => $data->referrer,
      //   'fund_maturity' => $data->fund_maturity,
      //   'cur' => $data->cur,
      //  );
      //  // dd($data);
      //  Transaction::create($data);
      // }
      // else {
      //
      // }
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

      $order = array(
        'orderId' => $request->id,
        'pay'     => $orderIni->cost,
        'pickup_code'=> $orderIni->pickup_code,
        'status'=> 'open'
      );
      $request = Req::create($order);
if ($request) {
  return back()->with(['message' => 'Payment successful', 'code' =>$orderIni->pickup_code]);
}


    }
}
