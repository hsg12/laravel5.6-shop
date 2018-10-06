<div class="row">
    <div class="col-12">
        @if($categories && count($categories) > 0)
            <div class="sidebar-module">
                <ul class="topnav list-unstyled">

                    @foreach($categories as $category)
                    <li>
                        <!-- <a href="{{ url('/') }}/{{ $category->name }}">{{ $category->name }}</a> -->
                        <a href="{{ route('category', ['category' => $category->name]) }}">{{ $category->name }}</a>
                        @if(count($category->children))
                            <!-- sortNestedCategories is a helper -->
                            @include('layouts.categories',['children' => sortNestedCategories($category->children)])
                        @endif
                    </li>
                    @endforeach

                </ul>
            </div>
        @endif
    </div>
</div>

<div class="row my-5">
    <div class="col-12 sidebar-soc-icons">
        <p>We are in social networks</p>
        <div>
            <a href="{{ $facebook }}" target="_blank">
                <img src="{{ asset('storage/soc-icons-images/facebook.png') }}" alt="Facebook" width="40" class="img-fluid">
            </a>
            <a href="{{ $twitter }}" target="_blank">
                <img src="{{ asset('storage/soc-icons-images/twitter.png') }}" alt="Twitter" width="40" class="img-fluid">
            </a>
            <a href="{{ $google }}" target="_blank">
                <img src="{{ asset('storage/soc-icons-images/google-plus.png') }}" alt="Google" width="40" class="img-fluid">
            </a>
            <a href="{{ $youtube }}" target="_blank">
                <img src="{{ asset('storage/soc-icons-images/youtube.png') }}" alt="Youtube" width="40" class="img-fluid">
            </a>
        </div>
    </div>
</div>