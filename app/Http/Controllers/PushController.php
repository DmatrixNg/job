<?php

namespace App\Http\Controllers;

use App\Push;
use Illuminate\Http\Request;
use App\Notifications\PushNotification;
use App\User;
use Auth;
use Notification;

class PushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $this->validate($request,[
        'endpoint'    => 'required',
        'keys.auth'   => 'required',
        'keys.p256dh' => 'required'
    ]);

    $endpoint = $request->endpoint;
    $token = $request->keys['auth'];
    $key = $request->keys['p256dh'];
    $user = Auth::user();
    $user->updatePushSubscription($endpoint, $key, $token);

    return response()->json(['success' => true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Push  $push
     * @return \Illuminate\Http\Response
     */
    public function show(Push $push)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Push  $push
     * @return \Illuminate\Http\Response
     */
    public function edit(Push $push)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Push  $push
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Push $push)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Push  $push
     * @return \Illuminate\Http\Response
     */
    public function destroy(Push $push)
    {
        //
    }
    public function push(){
        Notification::send(User::all(),new PushNotification);
        return redirect()->back();
    }
}
