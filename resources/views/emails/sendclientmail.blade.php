@extends('layouts.email')

@section('header')
    Message From Team Piccolo
@endsection

@section('body')
    {!! html_entity_decode($content) !!}
@endsection

