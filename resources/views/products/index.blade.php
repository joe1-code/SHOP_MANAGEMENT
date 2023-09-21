@extends('products.layout')

@section('content')
<div class="row">
 <div class="col-lg-12 margin-tb" style="background-color: whitesmoke; display:flex; flex-direction:column; align-items:center; justify-content:center;" >
  <div class="pull-left">
     <h2>Product Registration</h2>
  </div>
  <div class="pull-right">
   <a class="btn btn-success" href="{{route("products.create")}}">Create New Product</a>
  </div>
 </div>
</div>    

@if ($message=Session::get('success'))
 <div class="alert alert-success">
   <span>{{$message}}</span>
 </div>

@endif

<div class="table-responsive">
   <table class="table" style="border-collapse: collapse; width: 100%;">
<tr>
 <th>No</th>
 <th>Name</th>
 <th>Details</th>
 <th width="280px">Action</th>
</tr>

@foreach ($products as $product)
<tr>
  <td>{{++$i}}</td>
  <td>{{$product->name}}</td>
  <td>{{$product->details}}</td>
  <td>
   <form action="{{route('products.destroy', $product->id)}}" method="POST">
   
    <a class="btn btn-info" href="{{route('products.show', $product->id)}}">show</a>
    <a class="btn btn-primary" href="{{route('products.edit', $product->id)}}">Edit</a>

     @csrf
     @method('DELETE')

     <button type="submit" class="btn btn-danger">Delete</button>
   </form>
  </td>
</tr>
@endforeach
</table>
</div>

@endsection
