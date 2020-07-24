@extends('layouts.shop')

@section('content')
<div class="container mb-4">
  <div class="row">
      <div class="col-12">
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if($orders->count()>0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th></th>
                      <th  class="">OrderID</th>
                      <th class="">Product Name</th>

                    </tr>
                </thead>
                <tbody>
                 
                    @foreach($orders as $order)
                    
                    <tr>
                   
                        <td></td>
                      <td>{{$order->id}}</td>
                      <td>{{$order->orderlists->prod_name}}</td>
                  
                      <td></td>
        
             
                    </tr>
                    @endforeach
              
                   
                </tbody>
            </table>
        </div>
    </div>

    @else   
    <p>Error! it must have atleast one!</p> 
    @endif
  </div>
</div>
@endsection

