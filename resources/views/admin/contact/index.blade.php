@extends('layouts-admin.master')
@section('title', "| Contact Location")

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h4 class="blog-post-title mb-4">Set Contact Page Location</h4>
        <hr>

        <div class="our-location mb-4">
            {!! $location !!}
        </div>
        
        <form action="{{ route('admin.contact.store') }}" method="post" class="mb-3" id="admin-contact-location">
            @csrf

            <div class="form-group">
                <label for="facebook">Location:</label>
                <input type="text" 
                       class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" 
                       id="location" 
                       name="location" 
                       value="{{ $location }}" 
                       autocomplete="off" 
                       required
                >
                @if ($errors->has('location'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('location') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">  
                <button type="submit" class="btn btn-outline-success">Set</button>
                <button type="button" class="btn btn-outline-danger" id="clean-form">Clean form</button>
            </div>
        </form>
    </div>
</div>

@endsection
