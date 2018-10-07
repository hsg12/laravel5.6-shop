@extends('layouts.master')
@section('title', "| Contact")

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="mb-5">
            <h4 class="mt-1">Оur location</h4>
        </div>
        <div class="our-location">
            {!! $location !!}
        </div>
    </div>
</div>

<hr class="d-block my-5">

<div class="row mb-5">
    <div class="col-sm-12">
        <div class="mt-3 mb-5">
            <h4 class="mt-1">Form for contact</h4>
        </div>

        <form action="{{ route('contact.message') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" 
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                       name="email" 
                       aria-describedby="emailHelp" 
                       placeholder="Enter email"
                       value="{{ old('email') }}"
                >
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Your Message</label>
                <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" 
                          name="message" 
                          rows="3"
                >{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </form>
        
    </div>
</div>

@endsection
