@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if( @auth())
                    {{ __('You are logged in as Admin!') }}
                  
                    @else
                    not auth
                    @endif
                </div>
       
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
           
                    <a class="btn btn-primary" href="{{route('productIndex')}}">View Products</a>
                <a class="btn btn-primary" href="{{route('orderIndex')}}">View Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
