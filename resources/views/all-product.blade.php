@extends('layouts.app')

@section('content')
<div class="container">
	<form action="{{route('more.product')}}" method="GET">
		<div class="form-row">
			<div class="col-md-8">
				<input type="text" name="search" class="form-control" placeholder="search...">
			</div>
			<div class="col">
				<button type="submit" class="btn btn-secondary">Search</button>
			</div>
		</div>
	</form>
	<br>
	<div>
		<a href="{{route('more.product')}}"><button class="btn btn-secondary">back</button></a>
	</div>
	<br>
<div class="row">
		  @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
			  <img src="{{Storage::url($product->image)}}" style="width: 100%" height="200" alt="">
            <div class="card-body">
				<p class="text-center"><b>{{$product->name}}</b></p>
              <p class="card-text text-center">{!! Str::limit($product->description,120) !!}.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View product</button></a>
                  <a href="{{route('add.cart',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
				</div>
				<br>
                <small class="text-muted">$ {{$product->price}}</small>
              </div>
            </div>
		  </div>

		</div>
		@endforeach
	  </div>
	  {{$products->render()}}
</div>
@stop