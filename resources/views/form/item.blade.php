@extends('main')

@section('content')
    {!! Form::open() !!}
    {!! Form::text('label') !!}
    {!! Form::text('description') !!}
    {!! Form::select('container', $options, Route::input('container')) !!}

    {!! Form::submit('Add Item') !!}
    {!! Form::close() !!}
@endsection