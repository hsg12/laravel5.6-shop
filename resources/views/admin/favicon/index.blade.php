@extends('layouts-admin.master')
@section('title', "| Set favicon")

@section('content')

<div class="blog-post">
    <h4 class="mt-3 mb-4">Set favicon</h4>
    <p>Only .ico extension is allowed</p>

    <form action="{{ route('admin.favicon.store') }}" method="post" class="mb-3" enctype="multipart/form-data">
        @csrf
        
        <div class="my-5">
            <img src="{{ asset('storage/favicon/favicon.ico') }}" class="img-fluid admin-img-edit" alt="image" width="100">
        </div>
        
        <div class="form-group">             
            <label for="favicon">Favicon image:</label> 
            <input type="file" name="favicon" id="favicon" class="jfilestyle" required>
            @if ($errors->has('favicon'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('favicon') }}</strong>
                </span>
            @endif
        </div>

        <hr>
        
        <div class="form-group">  
            <button type="submit" class="btn btn-outline-secondary">Set</button>
        </div>
    </form>
</div>

@endsection
