@extends('layouts.email')

@section('body')
    {{ $enquiry }}<br>
    Sent by {{ $name }} ({{ $email }} {{ $phone }})
@endsection
