<article @php(post_class('col-md-2'))>
    <header>
        @if (has_post_thumbnail())
            <a href="{{ get_permalink() }}">
            {!! the_post_thumbnail('medium_large', array( 'class' => 'img-fluid') ) !!}
            </a>
        @endif
        <h2 class="entry-title h5"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
        @include('partials/entry-meta')
    </header>

    {{--
    <div class="entry-summary">
        @php(the_excerpt())
    </div>
    --}}
</article>
