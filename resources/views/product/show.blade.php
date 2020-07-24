@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-sm-12">

      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      <div class="container">
        <a class="btn btn-primary" href="{{route('productIndex')}}">Back</a>
        <br>
      <h1>ID NO:{{$product->id}}</h1>
      <h2>Product Name: {{$product->prod_name}}</h2>
      <h2>Price:$ {{$product->prod_price}} Date:{{$product->date}}</h2>
      
      <h2>Product Description:<br><br>{{$product->prod_description}}</h2>

      <p>{{$product->prod_img}}</p>
  
             
        
      </div>


    </div>
    <!-- /.col-lg-3 -->

 

  </div>
  <!-- /.row -->

</div>
@endsection

