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
          {{-- <a class="btn btn-primary" href="{{route('productCreate')}}">Create Product</a> --}}
           <table class="table table-striped table-responsive-sm ">
              <thead>
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">User Email</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Status of Payment</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
             
                <tr>
                  <th >{{$d->id}}</th>
                  <th >{{$d->users->email}}</th>
                  <th >${{$d->total}}</th>
                  <th >
                    @if($d->payment)
                    Paid
                    @else
                    Not Paid
                    @endif
                    
                  </th>
                  <!-- Button trigger modal -->
        
                  <td>
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId{{$d->id}}">
                      Change to Paid
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modelId{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Changed?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            Click Paid if the customer already paid.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route('orderPaid',$d)}}" method="post">
                              @csrf
                              @method('put')
                              <button type="submit" class="btn btn-primary">Paid</button>
                            </form>
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

