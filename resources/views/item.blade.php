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
                    <dt>{{ $meta->label }} (<a href="/meta/{!! $meta->id !!}/edit">Edit</a> | <a href="/meta/{!! $meta->id !!}/delete">Delete</a>)</dt>
                    <dd>{{ $meta->value }}</dd>
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