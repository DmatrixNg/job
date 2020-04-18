<div class="row text-center">
@foreach($products as $product)

<div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">
  <div class="card featured-item">
    <div class="card-body ptb-45">
      <!-- <div class="icon circle-icon mb-30 mx-auto"> -->
        <img src="{{$product->product_pic}}"/>
      <!-- </div> -->
      <h5>{{$product->product_name}}</h5>
      <p class="mb-20">{{$product->des}}</p>
      <p class="mb-20">{{$product->product_type}}</p>
      <p class="mb-20">N{{$product->product_price}}</p>
      <?php $cart = array(
        "store" => $product->vendorId,
 "product" => $product->id,
 "action" => "1");
// dd(in_array($cart, json_decode(\Cookie::get('cart'), true)));
 ?>
    @if(json_decode(\Cookie::get('cart'), true)
    && in_array($cart, json_decode(\Cookie::get('cart'), true)))
    <button id="product-{{$product->id}}" class="item-link link-btn btn-danger" onclick="AddCart({{$product->vendorId }},{{$product->id}},0)">Remove Item</a>
    @else
      <button id="product-{{$product->id}}" class="item-link link-btn" onclick="AddCart({{$product->vendorId }},{{$product->id}},1)">Add to Cart</a>
        @endif
    </div>
  </div>
</div>

@endforeach
</div>
<div style="display:none">

  {{ $products->appends(request()->input())->links() }}
</div>
