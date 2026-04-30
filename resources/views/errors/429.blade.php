@extends('layouts.attrion')

@section('title', __('portfolio.error_429_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="429"
        :title="__('portfolio.error_429_title')"
        :message="__('portfolio.error_429_message')"
        accent="y" />
@endsection
