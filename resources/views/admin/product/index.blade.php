@extends('layouts-admin.master')
@section('title', "| All products")

@section('content')

<h4 class="mt-3 mb-4">All Products</h4>

@if($products->count() <= 0)
	<h5>Products list is empty</h5>
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
				<td>{{ ++$cnt }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>${{ $product->price }}</td>
				<td>
					<img src="{{ asset('storage/products/' . $product->image) }}" alt="img" height="40px">
				</td>
				<td>{{ $product->created_at }}</td>
				<td>
					<a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a> |

					<form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post" class="app-delete-form confirm-plugin-delete">

                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="delete">
                        <input type="submit" name="delete" value="Delete">
                    </form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
@endif

@endsection
