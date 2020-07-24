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
                      <th  class="">Date Ordered</th>
                      <th class="">Expected Delivery</th>
                      <th class="">Status</th>
                    </tr>
                </thead>
                <tbody>
                 
                    @foreach($orders as $order)
                    
                    <tr>
                   
                      <td><a class="btn btn-info" href="{{route('orderlist',$order)}}">View Order</a></td>
                      <td>{{$order->id}}</td>
                      <td>{{$order->created_at}}</td>
                      <td>To be Dated</td>
                      <td>
                        @if($order->payment)
                          <p>Paid</p>
                        @else
                         <p>Not Paid</p>
                        @endif
                    </td>
        
             
                    </tr>
                    @endforeach
              
                   
                </tbody>
            </table>
        </div>
    </div>

    @else   
    <p>You have no order!</p> 
    @endif
  </div>
</div>
@endsection

