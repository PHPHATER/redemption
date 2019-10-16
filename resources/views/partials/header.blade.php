<header class="site-header banner">
  	<div class="container">

		<nav class="navbar navbar-collapse navbar-light bg-light">

            @if (has_nav_menu('primary_navigation'))
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse--left-js" aria-controls="navbar-collapse--left-js" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
            </button>
            @endif

            {!! get_custom_logo() !!}

            @if (has_nav_menu('primary_navigation_right'))
			<button class="navbar-toggler--right navbar-toggler--right-js" type="button" data-toggle="collapse" data-target="#navbar-collapse--right-js" aria-controls="navbar-collapse--right-js" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon icon--user"></span>
            </button>
            @endif

            @if (has_nav_menu('primary_navigation'))
			<div class="collapse navbar-collapse navbar-collapse--left-js navbar-collapse--first" id="navbar-collapse--left-js">
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav navbar-nav--first mr-auto']) !!}
            </div>
            @endif

            @if (has_nav_menu('primary_navigation_right'))
            <div class="collapse navbar-collapse navbar-collapse--right-js navbar-collapse--second" id="navbar-collapse--right-js">
                {!! wp_nav_menu(['theme_location' => 'primary_navigation_right', 'menu_class' => 'navbar-nav navbar-nav--second ml-auto']) !!}
            </div>
            @endif

        </nav>

  	</div>
</header>
