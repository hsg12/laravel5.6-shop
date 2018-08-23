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
