@extends('layouts.master')
@section('title', "| Home")

@section('content')
<div class="mb-5">
    <h4 class="mt-1 mb-4">Portfolio</h4>

    <div class="row mb-4">

        @foreach($portfolio as $item)
        <div class="col-md-4 portfolio-item mb-4">
            <div class="">
                <div class="portfolio-background">

                    <a href="{{ $item->url }}" target="_blank">
                        <img src="{{ asset('storage/portfolio/' . $item->title . '.png') }}" 
                             alt="{{ $item->title }}-site" class="img-fluid"
                        >
                        <span class="portfolio-title">{{ $item->title }}</span>
                    </a> 

                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>  
@endsection
