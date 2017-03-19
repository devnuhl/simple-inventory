@extends('main')

@section('content')
    <div>
        {!! Form::open() !!}
        @if (isset($meta))
            @php Form::setModel($meta); @endphp
        @endif
        <p>
            {!! Form::hidden('id', isset($meta) ? $meta->id : '') !!}
            {!! Form::hidden('item_id', $item->id) !!}
            {!! Form::text('meta_label', null, ['placeholder' => 'Meta Label']) !!}
            {!! Form::text('meta_value', null, ['placeholder' => 'Meta Value']) !!}
        </p>
        <p>
            {!! Form::submit((isset($meta) ? 'Update' : 'Add') . ' Meta') !!}
        </p>
        {!! Form::close() !!}
    </div>
@endsection