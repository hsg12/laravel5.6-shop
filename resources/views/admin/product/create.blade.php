@extends('layouts-admin.master')
@section('title', "| Create product")

@section('content')

<h4 class="mt-3 mb-4">Create Product</h4>

<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="mb-5">
    @csrf

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}">
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
                <label for="content">Category:</label>
                <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" name="category_id" value="{{ old('category_id') }}" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="price">Price:</label>
                <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price" type="text" name="price" value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="file" 
                       class="jfilestyle form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" 
                       data-text="Upload image" 
                       name="image" 
                >
                @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label class="custom-checkbox">Is Visible:
                    <input type="checkbox" name="is_visible" value="on" class="form-checkbox{{ $errors->has('is_visible') ? ' is-invalid' : '' }}">
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

    <button class="btn btn-outline-secondary mt-3">Create</button>
</form>

@endsection
