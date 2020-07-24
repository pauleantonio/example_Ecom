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
        @if($product->count()>0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col"> </th>
                        <th scope="col">Product</th>
                    
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
                  
                        <th> </th>
                        <th scope="col" class="text-right">Price</th>
                    </tr>
                </thead>
                <tbody>
                 
                    @foreach($product as $p)
                    
                    <tr>
                    
                    <td><img style="width: 50px;height:50px" src="{{url('ps5.jpg')}}" /> </td>
                    <td><a href="{{route('product',$p->products)}}">{{$p->products->prod_name}}</a> </td>
                        <td><input class="form-control" type="text" value="{{$p->count}}" /></td>
                        <td></td>
                
              
             
                        <td></td>
                        <td>
                            <div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$p->id}}">
                                      <i class="fa fa-trash"></i>
                                </button>
                                <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Item?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Item will be deleted. Are you sure?
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{route('cartDestroy',$p)}}" method="post">
                                          @csrf
                                          <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                 
                                      
                                      
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                        <td class="text-right">   ${{($p->products->prod_price)*($p->count) }}</td>
             
                    </tr>
                    @endforeach
              

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub-Total</td>
                        <td class="text-right">   ${{$sum}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Shipping</td>
                        <td class="text-right">$4</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total: </strong></td>
                        <td class="text-right">${{$sum+4}}<strong></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col mb-2">
        <div class="row">
            <div class="col-sm-12  col-md-6">
                <a  class="btn btn-block btn-light" href="/">Continue Shopping</a>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
      
            <form action="{{route('createOrder',$sum)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Check Out</button>
                  </form>
       
            </div>
        </div>
    </div>
        @else   
        <p>There is no product in your Cart!</p> 
        @endif
  </div>
</div>
@endsection

