<ul class="byline author vcard nav menu menu--author">
    <li class="nav-item menu__item menu__item--avatar">
        <img src="{{ get_avatar_url(get_the_author_meta('ID')) }}" class="img-fluid avatar photo" alt="{{ get_the_author() }}">
    </li>
    <li class="nav-item menu__item menu__item--author">
        <span class="by">{{ __('By', 'sage') }}</span>
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
        {{ get_the_author() }}
        </a>
        <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    </li>
</ul>
