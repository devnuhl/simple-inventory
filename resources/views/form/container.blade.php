@extends('main')

@section('content')
    {!! Form::open() !!}
    {!! Form::text('label') !!}
    {!! Form::submit('Add Container') !!}
    {!! Form::close() !!}
@endsection