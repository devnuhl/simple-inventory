<div class="left padded{{ ($key % 3 == 0) ? ' clear' : '' }}">
    @if (strpos(Route::current()->uri, 'container') !== false)
    <div>{{ $container->label }} (<a href="/">Back to List</a>)</div>
    @else
    <div><a href="/container/{{ $container->id }}">{{ $container->label }}</a></div>
    @endif
    <div>
        <ul>
    @forelse ($container->items as $item)
           <li>{{ $item->label }} - {{ $item->description }}</li>
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
        </ul>
    </div>
</div>