@extends('main')

@section('content')
<div class="title m-b-md">
    Containers
</div>
<div class="content">
    @forelse($containers as $container)
        <!-- {{ $loop->iteration }} -->
        <div class="left padded{{ ($loop->index % 3 == 0) ? ' clear' : '' }}">
            <div><a href="/container/{{ $container->id }}">{{ $container->label }}</a></div>
            <div>
                <ul>
                    @forelse ($container->items as $item)
                        <li>{{ $item->label }} - {{ $item->description }}</li>
                        @if ($loop->count > 6 and $loop->iteration >= 3)
                            <li><a href="/container/{{ $container->id }}">More...</a></li>
                            @break
                        @endif
                    @empty
                        <li>Nothing here.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @empty
        <div>No containers found.</div>
    @endforelse
    {{--@each('container', $containers, 'container')--}}
</div>
@endsection