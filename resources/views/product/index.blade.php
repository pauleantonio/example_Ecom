@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-sm-12">

      <div class="container">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @elseif (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <a class="btn btn-primary" href="{{route('admin')}}">Back to Dashboard</a>
          <a class="btn btn-primary" href="{{route('productCreate')}}">Create Product</a>
           <table class="table table-striped table-responsive-sm ">
              <thead>
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Added</th>
                  <th scope="col">Product Updated</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Image</th>
               
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
             
                <tr>
                  <th >{{$d->id}}</th>
                  <td>{{$d->prod_name}}</td>
                  <td class="sample">{{$d->prod_description}}</td>
                  <td>{{$d->created_at}}</td>
                  <td>{{$d->updated_at}}</td>
                  <td>${{$d->prod_price}}</td>
                  <td>@if(!$d->prod_img==null)
                    {{$d->prod_img}}
                  @else
                  NULL
                  @endif</td>
                  <td>
                  <a class="btn btn-primary" href="{{route('productShow',$d)}}">View</a>
                    <a class="btn btn-warning" href="{{route('productEdit',$d)}}">Edit</a>
                    <div>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$d->id}}">
                        Delete
                      </button>
                      <div class="modal fade" id="exampleModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <form action="{{route('productDestroy',$d)}}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                              </form>
                       
                            
                            
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
               
            
                  </td>
           
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $data->onEachSide(3)->links() }}
  
             
        
      </div>


    </div>
    <!-- /.col-lg-3 -->

 

  </div>
  <!-- /.row -->

</div>
@endsection

