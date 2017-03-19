@extends('main')

@section('content')
    <div class="sm-title m-b-md">
        {{ $item->label }} - {{ $item->description }}
    </div>
    <div class="content">
        <div class="padded">
            <p>Meta Information</p>
            @forelse($item->metas as $meta)
                @if ($loop->first)
                <dl>
                @endif
                    <dt>{{ $meta->label }}</dt>
                    <dd>{{ $meta->value }} | <a class="btn-default button-xs" href="/meta/{!! $meta->id !!}/edit">Edit</a> <a class="btn-default button-xs" href="/meta/{!! $meta->id !!}/delete">Delete</a></dd>
                @if ($loop->last)
                </dl>
                @endif
            @empty
            <p>No Meta Information Available.</p>
            @endforelse
        </div>
        <div class="padded">
            <a href="/item/{!! $item->id !!}/meta/create">Add Info</a>
        </div>
    </div>
@endsection