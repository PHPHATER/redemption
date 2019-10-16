@extends('layouts.app')

@section('content')
    @section('pre-container')
        @include('partials.page-header')
    @endsection

        @if (!have_posts())
        <div class="alert alert-warning">
            {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
    @endif
@endsection
