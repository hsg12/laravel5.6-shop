@extends('layouts-admin.master')
@section('title', "| All categories")

@section('content')

<h4 class="mt-3 mb-4">All Categories</h4>

@if($categories->count() <= 0)
	<h5>Categories list is empty</h5>
@else
	<div class="table-responsive">
		<table class="table table-striped table-hover mb-5">
			<tr>
				<th>#</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Order</th>
                <th>Is visible</th>
                <th>Actions</th>
			</tr>
			@foreach($categories as $category)
            <tr>
                <td>{{ ++$cnt }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent() }}</td>              
                <td>{{ $category->category_order }}</td>              
                <td>{{ $category->is_visible ? 'Yes' : 'No' }}</td>              
                <td>
                    <a href="{{ route('categories.edit', ['name' => $category->name]) }}">Edit</a>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                    <form action="{{ route('categories.destroy', ['name' => $category->name]) }}" method="post" class="app-delete-form confirm-plugin-delete">

                        @csrf
                        @method('delete')

                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
		</table>
	</div>
	<br>
	<br>
	<br>
@endif

@endsection
