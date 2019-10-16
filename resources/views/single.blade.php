@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @section('pre-container')
        @include('partials.page-header')
    @endsection
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
