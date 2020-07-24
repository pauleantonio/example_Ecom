@extends('layouts.shop')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-lg-3">

      <h1 class="my-4">Shop Name <br> (in development)</h1>
      <div class="list-group">
        <a href="#" class="list-group-item">Category 1</a>
        <a href="#" class="list-group-item">Category 2</a>
        <a href="#" class="list-group-item">Category 3</a>
      </div>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      
      <h2>NEW PRODUCTS!</h2>
      <div class="row">
 
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <a href="{{route('product',$product)}}"><img class="card-img-top" src="{{url('ps5.jpg')}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
              <a href="{{route('product',$product)}}">{{$product->prod_name}}</a>
              </h4>
            <h5>${{$product->prod_price}}</h5>
              <p class="card-text" style=" line-height:20px; overflow:hidden;">{{$product->prod_description}}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div>
          </div>
        </div>
        @endforeach
   


      </div>
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
@endsection

