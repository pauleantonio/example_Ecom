@extends('layouts.shop')
@section('content')
<div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @elseif (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
        <div class="card mt-4">
          <img class="card-img-top img-fluid" style="width: 900px;height:450px" src="{{url('ps5.jpg')}}" alt="">
          <div class="card-body">
          <h3 class="card-title">{{$data->prod_name}}</h3>
            <h4>${{$data->prod_price}}</h4>
            <p class="card-text">{{$data->prod_description}}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
            <br><br>

            <form action="{{route('cartAdd',$data)}}" method="post">
              @csrf
              <input type="hidden" name="prod_id" value="{{$data->id}}">
              <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
 

   
       
            
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>

@endsection