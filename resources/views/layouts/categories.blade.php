<ul class="list-unstyled">
    @foreach($children as $child)
        <li>
            <!-- <a href="{{ url('/') }}/{{ $child->name }}">{{ $child->name }}</a> -->
            <a href="{{ route('category', ['category' => $child->name]) }}">{{ $child->name }}</a>
            @if(count($child->children))
                <!-- sortNestedCategories is a helper -->
                @include('layouts.categories',['children' => sortNestedCategories($child->children)])
            @endif
        </li>
    @endforeach
</ul>
