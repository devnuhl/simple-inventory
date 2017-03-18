@extends('main')

@section('content')
    {!! Form::open() !!}
    @if (isset($item))
        @php
        Form::setModel($item)
        @endphp
    @endif
    {!! Form::hidden('id', isset($item) ? $item->id : '') !!}
    {!! Form::text('label') !!}
    {!! Form::text('description') !!}
    {!! Form::select('container_id', $options, (Route::input('container') ?: $item->container_id)) !!}

    {!! Form::submit('Add Item') !!}
    {!! Form::close() !!}
@endsection