@extends('layouts-admin.master')
@section('title', "| Create category")

@section('content')

<h4 class="mt-3 mb-4">Create Category</h4>

<form action="{{ route('categories.store') }}" method="post">
    @csrf

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
			<div class="form-group">
                <label for="parent_id">Parent:</label>
                <select class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" id="parent_id" name="parent_id" value="{{ old('parent_id') }}" >
                    <option value="0">Has no parent</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('parent_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

	<div class="row">
        <div class="col-sm-6">
			<div class="form-group my-4">
                <label class="custom-checkbox">Is Visible:
                    <input type="checkbox" class="category-checkbox{{ $errors->has('is_visible') ? ' is-invalid' : '' }}" name="is_visible" value="on">
                    <span class="checkmark"></span>
                </label>
                @if ($errors->has('is_visible'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('is_visible') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
			<div class="form-group">
                <label for="category_order">Order:</label>
                <input type="text" class="form-control{{ $errors->has('category_order') ? ' is-invalid' : '' }}" id="category_order" name="category_order" required size="10" value="{{ old('category_order') }}">
                @if ($errors->has('category_order'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('category_order') }}</strong>
	                </span>
	            @endif
            </div>
        </div>
    </div>

    <button class="btn btn-outline-secondary mt-3" type="submit">Create</button>
</form>

@endsection
