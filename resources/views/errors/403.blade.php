@extends('layouts.attrion')

@section('title', __('portfolio.error_403_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="403"
        :title="__('portfolio.error_403_title')"
        :message="__('portfolio.error_403_message')"
        accent="p" />
@endsection
