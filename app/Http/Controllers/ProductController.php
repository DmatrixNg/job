<?php

namespace App\Http\Controllers;

use App\Product;
use App\Vendor;
use App\Core\Images;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class ProductController extends Controller
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
      $product = Product::listproducts()->simplePaginate(20);;

      return view('layouts.productList',['products' =>$product]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $store = Vendor::where('slug', request()->store)->first();
      // dd($store);
        return view('store.addproduct', ['store' => $store]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request);
      $validator = $request->validate([
    'product_name' => '|required|',
    // 'product_pic' => 'required|image',
]);
// dd($validator);
//         $fullPath ='';
//         if(!is_null($request->file('product_pic')) && $request->file('product_pic') !== ""){
//
//     $filenamewithextension = $request->file('product_pic')->getClientOriginalName();
//
//     //get filename without extension
//     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
//
//     //get file extension
//     $extension = $request->file('product_pic')->getClientOriginalExtension();
//
//     $image = $request->file('product_pic');
//     // dd($filename);
//     $images = new Images;
//     $fullPath = $images->store($image, $filenamewithextension,$filename,$extension);
// }
  // dd($fullPath);
      $product = array(

        'vendorId' => $request->vendorId,
        'product_name' => $request->product_name,
        'productSlug' => Str::slug($request->product_name),
        // 'product_pic' => $fullPath,
        'product_price' => $request->product_price,
        'product_desc' => $request->product_desc,
        'product_full_desc' => $request->product_full_desc,
        'product_type' => $request->product_type,
        'ads_url' => $request->ads_url,
        'status' => 'pending'
      );
     Product::create($product);
     $store = Vendor::where('id', request()->vendorId)->first('slug')->slug;
        return redirect('store/'.$store)->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $item)
    {
      // dd($item);
        $product->where('id', $item)->delete();
        return back()->with('message', 'Product Removed Successfully');
    }
}
