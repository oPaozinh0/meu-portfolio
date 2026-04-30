@extends('layouts.attrion')

@section('title', __('portfolio.error_404_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="404"
        :title="__('portfolio.error_404_title')"
        :message="__('portfolio.error_404_message')"
        accent="c"
        :back-label="__('portfolio.error_404_back_home')" />
@endsection
