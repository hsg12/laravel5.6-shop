@extends('layouts-admin.master')
@section('title', "| All products")

@section('content')

<h4 class="mt-3 mb-5">All Products</h4>

@if(!$products->count() > 0)
	<h4>Products list is empty</h4>
@else
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<tr>
				<th>#</th>
				<th>Product name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Created at</th>
				<th>Actions</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td>1</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ $product->price }}</td>
				<td>
					<img src="{{ asset('storage/products/' . $product->image) }}" alt="img" width="50px" height="50px">
				</td>
				<td>{{ $product->created_at }}</td>
				<td>
					<a href="#">Edit</a> |
					<a href="#">Delete</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
@endif

@endsection
