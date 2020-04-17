<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        // User::where('username', request()->username)->firstorFail();
        // $school = School::firstWhere('abbr',request()->school);
        // // dd(strtoupper($school->abbr));
        // return view('user.user', ['school' => $school]);
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    //     if(!is_null($request->file('profileimage')) && $request->file('profileimage') !== ""){
    //
    // $filenamewithextension = $request->file('profileimage')->getClientOriginalName();
    //
    // //get filename without extension
    // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    //
    // //get file extension
    // $extension = $request->file('profileimage')->getClientOriginalExtension();
    //
    // $image = $request->file('profileimage');
    // $fullPath = $this->store($image, $filenamewithextension,$filename,$extension);
// }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
      // dd(request()->all(['hostel','room_no']));
        $profile->where('userId', Auth::user()->id)
        ->update(request()->all(['hostel','room_no','contact']));
        return back()->with('message', 'Defalult Location Set');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    // public function school(Profile $profile)
    // {
    //     $schools = School::all();
    //     // dd($school);
    //     return view('school.select_school', ['schools' => $schools]);
    // }
    // public function schooladd(Profile $profile, Request $request)
    // {
    //     $profile->create(request()->all());
    //     $school = School::firstWhere('id',$request->schoolId);
    //     return redirect($school->abbr.'/'.Auth::user()->username);
    // }

}
