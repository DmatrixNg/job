<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Core\Images;

class VendorController extends Controller
{

  public function __construct()
  {
      $this->middleware(['auth']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stores = Vendor::where('userId',request()->user()->id)->get();
// dd($stores);
        return view('store.dashboard', ['stores' => $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.vendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = $request->validate([
    'name' => '|required|unique:vendors',
    // 'logo' => 'required|image',
]);
// dd($validator);
//         $fullPath ='';
//         if(!is_null($request->file('logo')) && $request->file('logo') !== ""){
//
//     $filenamewithextension = $request->file('logo')->getClientOriginalName();
//
//     //get filename without extension
//     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
//
//     //get file extension
//     $extension = $request->file('logo')->getClientOriginalExtension();
//
//     $image = $request->file('logo');
//     // dd($filename);
//     $images = new Images;
//     $fullPath = $images->store($image, $filenamewithextension,$filename,$extension);
// }


        Vendor::create([
          'userId'    =>$request->userId,
          'name'      =>$request->name,
          'slug'      =>Str::slug($request->name),
          // 'logo'       =>$fullPath,
          'des'       =>$request->des,
          'type'      =>$request->type,
        ]
        );
        return redirect('store/'.Str::slug($request->name))->with('added', 'Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
      $store = $vendor->where('slug', request()->store)->first();
      // dd("sew");
      return view('store.business',['store' => $store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }

    public function public(Vendor $vendor)
    {
     $store = $vendor->where('slug', request()->store)->first();
     // dd($business->products()->get());
     return view('store.pub_business',['store' => $store]);
     // dump(request()->business);
    }
    public function checkout(Vendor $vendor)
    {
     // dd(request());
     if(!\Cookie::get('cart')){
       return back();
     }else{

     if (count(json_decode(\Cookie::get('cart'), true)) > 0) {
       return view('store.checkout');
     }else {
       return back();
     }
   }

     // $business = $vendor->where('name', request()->business)->first();
     // // dd($business->products()->get());
     // return view('store.pub_business',['business' => $business]);
     // dump(request()->business);
    }
}
