@extends('products.layout')

@section('content')

<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
 <h2>Edit Product</h2>
</div>
<div class="pull-right">
 <a class="btn btn-primary" href="{{route('products.index')}}">Back</a>
</div>
</div>
</div>

@if ($errors->any())
    <div class="btn btn-danger">
     <strong>Whoop!</strong>There we problems with your input <br><br>
     <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
     </ul>
    </div>
@endif
<form action="{{route("products.update", $product->id)}}" method="POST">
@csrf
@method('PUT')

<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
  <div class="form-group">
   <strong>Name:</strong>
   <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="name">
  </div>
 </div>
  <div class="form-control">
   <strong>Details:</strong>
   <textarea name="Details" class="form-control" style="height:150px" rows="10">{{$product->details}}</textarea>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
   <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection