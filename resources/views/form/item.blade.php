@extends('main')

@section('content')
    <div>
    {!! Form::open() !!}
    @if (isset($item))
        @php
        Form::setModel($item);
        $meta = $item->metas->first();
        // todo: make it show all the meta info in form.
        @endphp
    @endif
        <p>
    {!! Form::hidden('id', isset($item) ? $item->id : '') !!}
    {!! Form::text('label', null, ['placeholder' => 'Item Label']) !!}
    {!! Form::text('description', null, ['placeholder' => 'Item Description']) !!}
    {!! Form::select('container_id', $options, (Route::input('container') ?: $item->container_id)) !!}
        </p>
        <p>
            {!! Form::hidden('meta[id]', isset($meta) ? $meta->id : '') !!}
            {!! Form::hidden('meta[item_id]', isset($item) ? $item->id : '') !!}
            {!! Form::text('meta[label]', isset($meta) ? $meta->label : null, ['placeholder' => 'Meta Label']) !!}
            {!! Form::text('meta[value]', isset($meta) ? $meta->value : null, ['placeholder' => 'Meta Description']) !!}
        </p>
        <p>
    {!! Form::submit((isset($item) ? 'Update' : 'Add') . ' Item') !!}
        </p>
    {!! Form::close() !!}
    </div>
@endsection