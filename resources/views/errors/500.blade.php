@extends('layouts.attrion')

@section('title', __('portfolio.error_500_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="500"
        :title="__('portfolio.error_500_title')"
        :message="__('portfolio.error_500_message')"
        accent="p" />
@endsection
