<?php

namespace App\Http\Controllers;

use App\Respond;
use Auth;
use Illuminate\Http\Request;

class RespondController extends Controller
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
      $order = Respond::where('userId', Auth::user()->id)->get();

// foreach ($order as $key => $value) {
//   dd($value->request()->first()->order);

        return view("store.pickups", ['order' => $order]);
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
     * @param  \App\Respond  $respond
     * @return \Illuminate\Http\Response
     */
    public function show(Respond $respond)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respond  $respond
     * @return \Illuminate\Http\Response
     */
    public function edit(Respond $respond)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respond  $respond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respond $respond)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respond  $respond
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respond $respond)
    {
        //
    }
}
