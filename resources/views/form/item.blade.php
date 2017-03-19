@extends('main')

@section('content')
    <div>
    {!! Form::open() !!}
    @if (isset($item))
        @php
        Form::setModel($item)
        @endphp
    @endif
        <p>
    {!! Form::hidden('id', isset($item) ? $item->id : '') !!}
    {!! Form::text('label', null, ['placeholder' => 'Item Label']) !!}
    {!! Form::text('description', null, ['placeholder' => 'Item Description']) !!}
    {!! Form::select('container_id', $options, (Route::input('container') ?: $item->container_id)) !!}
        </p>
        <p>
            {!! Form::hidden('meta_id', isset($meta) ? $meta->id : '') !!}
            {!! Form::hidden('item_id', isset($item) ? $item->id : '') !!}
            {!! Form::text('meta_label', null, ['placeholder' => 'Meta Label']) !!}
            {!! Form::text('meta_description', null, ['placeholder' => 'Meta Description']) !!}
        </p>
        <p>
    {!! Form::submit((isset($item) ? 'Update' : 'Add') . ' Item') !!}
        </p>
    {!! Form::close() !!}
    </div>
@endsection