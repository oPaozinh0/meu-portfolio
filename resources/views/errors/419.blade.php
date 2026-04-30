@extends('layouts.attrion')

@section('title', __('portfolio.error_419_title') . ' · Davi Oliveira')

@section('content')
    <x-error-page
        code="419"
        :title="__('portfolio.error_419_title')"
        :message="__('portfolio.error_419_message')"
        accent="y">
        <button type="button"
                onclick="window.location.reload()"
                class="tb-btn-ghost">
            {{ __('portfolio.error_reload') }}
        </button>
    </x-error-page>
@endsection
