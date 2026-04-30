@extends('layouts.attrion')

@section('title', __('portfolio.error_expired_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="410"
        :title="__('portfolio.error_expired_title')"
        :message="__('portfolio.error_expired_message')"
        accent="p"
        :back-url="route('shortlink.create')"
        :back-label="__('portfolio.error_expired_create_new')" />
@endsection
