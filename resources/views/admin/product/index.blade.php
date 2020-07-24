@extends('admin.layouts.main')

@section('content')

<!-- Datatables -->
<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Additional_info</th>
                        <th>Price</th>
						<th>Category</th>
						<th>Edit</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
						@if(count($products)>0)
                      @foreach($products as $product)
                      <tr>
                        <td><img src="{{Storage::url($product->image)}}" alt="product" width="150"></td>
                        <td>{{$product->name}}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{!! $product->additional_info !!}</td>
                        <td>$ {{$product->price}}</td>
						<td>{{$product->category->name}}</td>
						<td>
							<a href="{{route('product.edit',[$product->id])}}"><button class="btn btn-primary">Edit</button></a>
						</td>
						<td>
						<form action="{{route('product.destroy',[$product->id])}}" method="POST" onSubmit="return confirmDelete()">
							  @csrf
							  {{method_field('DELETE')}}
							  <button type="submit" class="btn btn-danger">Delete</button>
						  </form>
						</td>
					  </tr>
					  @endforeach
					  @else
					  <td>No product to display</td>
					  @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


@stop