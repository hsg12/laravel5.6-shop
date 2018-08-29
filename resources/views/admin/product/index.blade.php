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
				<th>Name</th>
				<th>Category</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Visibility</th>
				<th>Created at</th>
				<th>Actions</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td>{{ ++$cnt }}</td>
				<td>
					<span title="{{ $product->name }}" data-toggle='tooltip' data-placement='right'>
						{{ getTitle($product->name, 10) }}
					</span>
				</td>
				<td>{{ $product->category->name }}</td>
				<td>
					<span title="{{ $product->description }}" data-toggle='tooltip' data-placement='right'>
						{{ getTitle($product->description, 10) }}
					</span>
				</td>
				<td>${{ $product->price }}</td>
				<td>
					<img src="{{ asset('storage/products/' . $product->image) }}" alt="img" height="40px">
				</td>
				<td>{{ $product->is_visible ? 'Yes' : 'No' }}</td> 
				<td>{{ $product->created_at->toFormattedDateString() }}</td>
				<td>
					<a href="{{ route('products.edit', ['id' => $product->id]) }}">Edit</a> |

					<form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post" class="app-delete-form confirm-plugin-delete">

                        @csrf
                        @method('delete')

                        <input type="submit" name="delete" value="Delete">
                    </form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>

	<ul class="my-5 pagination justify-content-center">
		{{ $products->links() }}
	</ul>
@endif

@endsection
