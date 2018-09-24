@extends('layouts-admin.master')
@section('title', "| Manage Soc Icons")

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h3 class="blog-post-title mb-4">Manage Soc Icons</h3>
        <hr>
        
        <form action="{{ route('admin.soc-icons.store') }}" method="post" class="mb-3">
            @csrf

            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" 
                       class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" 
                       id="facebook" 
                       name="facebook" 
                       value="{{ $facebook }}" 
                       required
                >
                @if ($errors->has('facebook'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" 
                       class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" 
                       id="twitter" 
                       name="twitter" 
                       value="{{ $twitter }}" 
                       required
                >
                @if ($errors->has('twitter'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('twitter') }}</strong>
                    </span>
                @endif
            </div> 

            <div class="form-group">
                <label for="google">Google Plus:</label>
                <input type="text" 
                       class="form-control{{ $errors->has('google') ? ' is-invalid' : '' }}" 
                       id="google" 
                       name="google" 
                       value="{{ $google }}" 
                       required
                >
                @if ($errors->has('google'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('google') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="youtube">YouTube:</label>
                <input type="text" 
                       class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" 
                       id="youtube" 
                       name="youtube" 
                       value="{{ $youtube }}" 
                       required
                >
                @if ($errors->has('youtube'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('youtube') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">  
                <button type="submit" class="btn btn-outline-secondary">Set</button>
            </div>
        </form>
    </div>
</div>

@endsection
