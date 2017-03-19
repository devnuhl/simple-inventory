@extends('main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});
        });
    </script>
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
            @unset($meta)
            @if ($item->metas)
                @php $tooltip = "" @endphp
                @foreach($item->metas as $meta)
                @php $tooltip .= "<br>{$meta->label}: {$meta->value}"; @endphp
                @endforeach
            @endif
               <li>
                   <a href="/item/{!! $item->id !!}/show" rel="tooltip" data-toggle="tooltip" data-html="true" title="{{ $tooltip }}">{{ $item->label }} - {{ $item->description }}</a>
                       | <a class="btn-default btn-xs" href="/item/{{ $item->id }}/edit">Edit</a> <a class="btn-default btn-xs" href="/item/{{ $item->id }}/delete">Delete</a>
               </li>
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
            <div class="padded">
                <a class="btn-default btn-lg" href="{{ $container->id }}/item/create/">Add Item</a>
            </div>
        </div>

    </div>
</div>
@endsection