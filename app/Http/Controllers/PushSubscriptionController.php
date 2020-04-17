<?php

namespace App\Http\Controllers;

use App\PushSubscription;
use Illuminate\Http\Request;

use Illuminate\Foundation\Validation\ValidatesRequests;

class PushSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

     /**
      * Update user's subscription.
      *
      * @param  \Illuminate\Http\Request $request
      * @return \Illuminate\Http\JsonResponse
      */
     public function update(Request $request)
     {
         $this->validate($request, ['endpoint' => 'required']);

         $request->user()->updatePushSubscription(
             $request->endpoint,
             $request->publicKey,
             $request->authToken,
             $request->contentEncoding
         );

         return response()->json(null, 204);
     }

     /**
      * Delete the specified subscription.
      *
      * @param  \Illuminate\Http\Request $request
      * @return \Illuminate\Http\JsonResponse
      */
     public function destroy(Request $request)
     {
         $this->validate($request, ['endpoint' => 'required']);

         $request->user()->deletePushSubscription($request->endpoint);

         return response()->json(null, 204);
     }
}
