@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-center">
			<section class="gallery-wrap">
			<div class="img-big-wrap">
			  <div> <a href="#">
			  	<img width="400" src="{{Storage::url($product->image)}}"></a>
			  </div>
			</div>

			</section>
		</aside>
		<aside class="col-sm-7">
			<section class="card-body p-5">
				<h3 class="title mb-3">{{$product->name}}</h3>
<p class="price-detail-wrap">
	<span class="price h3 text-danger">
		<span class="currency">US $</span>{{$product->price}}
	</span>
</p> <!-- price-detail-wrap .// -->
  <h3>Description</h3>
  <p>{!!$product->description!!}</p>
  <h3>Additional information</h3>
  <p>{!!$product->additional_info!!}</p>
<hr>
	<a href="#" class="btn btn-lg btn-outline-primary text-uppercase">  Add to cart </a>
</section>
		</aside>
	</div>
</div>
@if(count($productFromSameCategories)>0)
<div class="jumbotron">
<div class="row">
		  @foreach($productFromSameCategories as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
			  <img src="{{Storage::url($product->image)}}" style="width: 100%" height="200" alt="">
            <div class="card-body">
				<p class="text-center"><b>{{$product->name}}</b></p>
              <p class="card-text text-center">{!! Str::limit($product->description,120) !!}.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('product.view',[$product->id])}}"><button type="button" class="btn btn-sm btn-outline-success">View product</button></a>
                  <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
				</div>
				<br>
                <small class="text-muted">$ {{$product->price}}</small>
              </div>
            </div>
		  </div>

		</div>
		@endforeach
      </div>
</div>
@endif
</div>
@endsection