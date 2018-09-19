@extends('layouts.master')
@section('title', "| Contact")

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="mb-5">
            <h4 class="mt-1">Оur location</h4>
        </div>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.99162569376!2d2.292292615757778!3d48.85837007928745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel+Tower!5e0!3m2!1sen!2sus!4v1537222075850" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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
