<!doctype html>
<html @php(language_attributes())>
@include('partials.head')

<body @php(body_class())>
    <div class="site-wrapper">
        @php(do_action('get_header'))
        @include('partials.header')
        @yield('pre-container')


            @if ( !App\is_landing_template() )
            <div class="wrap site-container container" role="document">
                <div class="site-content content row">
                    <main class="main">
            @endif

                        @yield('content')

            @if ( !App\is_landing_template() )
                    </main>

                    @if (App\display_sidebar())
                    <aside class="sidebar">
                        @include('partials.sidebar')
                    </aside>
                    @endif
                </div>
            </div>
            @endif

        @php(do_action('get_footer'))
        @include('partials.footer')
        @php(wp_footer())
    </div>
</body>

</html>
