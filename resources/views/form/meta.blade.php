@extends('main')

@section('content')
    <div>
        {!! Form::open() !!}
        @if (isset($meta))
            @php Form::setModel($meta); @endphp
        @endif
        <p>
            {!! Form::hidden('id', isset($meta) ? $meta->id : '') !!}
            {!! Form::hidden('item_id', isset($item) ? $item->id : $meta->item_id) !!}
            {!! Form::text('meta_label', isset($meta) ? $meta->label : '', ['placeholder' => 'Meta Label']) !!}
            {!! Form::text('meta_value', isset($meta) ? $meta->value : '', ['placeholder' => 'Meta Value']) !!}
        </p>
        <p>
            {!! Form::submit((isset($meta) ? 'Update' : 'Add') . ' Meta') !!}
        </p>
        {!! Form::close() !!}
    </div>
@endsection