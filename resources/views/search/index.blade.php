@extends('layouts.master')
@section('title', "| Search")

<style>
    .app-search-form {
        position: relative;

    }

    .app-search-form button {
        position: absolute;
        right: 0;
        top: 0;
    }
</style>

@section('content')

<div class="row">
    <div class="col-12">
        <form action="" class="app-search-form">
            <input type="text" class="form-control" name="search" value="{{ old('name') }}" placeholder="Product Search">
            <button class="btn"><span class="fa fa-search fa-2x"></span></button>
        </form>

        <form action="" class="">
            <input type="text" class="form-control" name="search" value="{{ old('name') }}" placeholder="Product Search">
        </form>
    </div>
</div>

@endsection
