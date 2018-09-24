@extends('layouts-admin.master')
@section('title', "| Count Per Page")

@section('content')

<h4 class="mt-3 mb-1">Products count</h4>




    <div class=" @if ($errors->has('per-page') || $errors->has('per-category-page')) show @endif">
        <br>
        <div class="per-page-input">
            <label for="perPage" class="col-form-label">Per main page:</label>
            <form action="{{ route('per-page') }}" method="post" class="form-inline mt-2">
                @csrf
                
                <div class="form-group">
                    <input type="text" 
                           class="text-center form-control mx-1" 
                           name="per-page" 
                           id="perPage" 
                           size="20" 
                           value="{{ old('per-page') ?? $pageCountInHome }}"
                    >
                </div>

                <button type="submit" class="btn btn-outline-secondary">Change</button>
            </form>

            @if ($errors->has('per-page'))
                <div><small class="text-danger">{{ $errors->first('per-page') }}</small></div>
            @endif
        </div>

        <div class="per-category-page-input">
            <label for="perCategoryPage" class="col-form-label">Per category page:</label>
            <form action="{{ route('per-category-page') }}" method="post" class="form-inline mp-2">
                @csrf

                <div class="form-group">
                    <input type="text" 
                           class="text-center form-control mx-1" 
                           name="per-category-page" 
                           id="perCategoryPage" 
                           size="20" 
                           value="{{ old('per-category-page') ?? $pageCountInCategory }}"
                    >
                </div>

                <button type="submit" class="btn btn-outline-secondary">Change</button>
            </form>

            @if ($errors->has('per-category-page'))
                <div><small class="text-danger">{{ $errors->first('per-category-page') }}</small></div>
            @endif
        </div>

    </div>



@endsection
