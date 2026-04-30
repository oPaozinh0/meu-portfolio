@extends('layouts.attrion')

@section('title', __('portfolio.error_503_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="503"
        :title="__('portfolio.error_503_title')"
        :message="__('portfolio.error_503_message')"
        accent="y" />
@endsection
