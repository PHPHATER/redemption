<section id="section-hero" class="section section-hero section-hero--single-page">

    @if (has_post_thumbnail())
    <div class="section__background">
        {!! the_post_thumbnail('background-half', array( 'class' => 'section__backgroundimage') ) !!}
    </div>
    @endif

    <div class="container">

        @if (is_woocommerce_activated())
        {!! woocommerce_breadcrumb() !!}
        @endif

        <h1>{!! App::title() !!}</h1>

        @if (has_excerpt())
            {!! the_excerpt() !!}
        @endif

    </div>

</section>
