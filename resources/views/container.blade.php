@extends('main')

@section('content')
<div class="title m-b-md">
    Container {{ $container->id }}
</div>
<script>
    const items = {!! json_encode($container->items) !!} ;
</script>
<div class="content">
    <div class="padded">
        <div>{{ $container->label }} (<a href="/">Back to List</a>)</div>
        <div>
            <ul>
        @forelse ($container->items as $item)
               <li>{{ $item->label }} - {{ $item->description }} (<a href="/item/{{ $item->id }}/edit">Edit</a> | <a href="/item/{{ $item->id }}/delete">Delete</a>)</li>
            @if (
                strpos(Route::current()->uri, 'container') === false
                and $loop->count > 6
                and $loop->iteration >= 3
                )
                <li><a href="/container/{{ $container->id }}">More...</a></li>
                @break
            @endif

        @empty
               <li>Nothing here.</li>
        @endforelse
                <li><a href="{{ $container->id }}/item/create/">Add Item</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection