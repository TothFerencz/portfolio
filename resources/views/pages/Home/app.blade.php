@extends('app')

@section('content')
    @include('sections.header', ['variant' => 'variant-headline-first'])
    @include('sections.about-me', ['variant' => 'about-me'])
@endsection
