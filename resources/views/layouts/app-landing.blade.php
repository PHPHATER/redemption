<!doctype html>
<html @php(language_attributes())>
@include('partials.head')

<body @php(body_class())>
    <div class="wrapper">
        @php(do_action('get_header'))
        @include('partials.header')
        @yield('content')
        @php(do_action('get_footer'))
        @include('partials.footer')
        @php(wp_footer())
    </div>
</body>

</html>
