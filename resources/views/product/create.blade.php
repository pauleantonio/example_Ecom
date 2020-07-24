@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">

  <div class="row">

    <div class="col-sm-12">
      <a class="btn btn-primary" href="{{route('productIndex')}}">Back</a>
      <br>
      <form action="{{route('productStore')}}" method="POST">
        @csrf

        <div class="form-group">
        
          <label for="">Product Name</label>
          <input type="text" name="prod_name" id="prod_name" value="" class="form-control" placeholder="" aria-describedby="helpId">
          @error('prod_name')
            <small id="helpId" class="text-muted">{{ $message }}</small>
          @enderror
          
          <label for="">Product Price</label>
          <input type="number" name="prod_price" id="prod_price" class="form-control" aria-describedby="helpId" value="" step="0.01">
          <small id="helpId" class="text-muted">Help text</small>
          @error('prod_price')
          <small id="helpId" class="text-muted">{{ $message }}</small>
        @enderror


          <br>
          <label for="prod_description">Product Description</label>
          <br>
          <textarea style="width:100%" name="prod_description" id="prod_description"  rows="10"></textarea>
          @error('prod_description')
          <small id="helpId" class="text-muted">{{ $message }}</small>
        @enderror

          <button type="submit" class="btn btn-primary">Create Item</button>

        </div>

      </form>
 
       
  
             
        



    </div>
    <!-- /.col-lg-3 -->

 

  </div>
  <!-- /.row -->

</div>
@endsection

