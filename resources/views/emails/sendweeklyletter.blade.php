@extends('layouts.email')

@section('header')
    {{ $title }}
@endsection

@section('body')
    {!! html_entity_decode($content) !!}
@endsection

