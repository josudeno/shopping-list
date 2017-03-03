<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <title>Smashing HTML5!</title>
</head>
<body>
@section('header')
    <header id="banner" class="body container">
        <h1>Don't forget to buy...</h1>
        <nav>
            <ul>
                <li><a href="#">current List</a></li>
                <li><a href="#">search</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">contact</a></li>
            </ul>
        </nav>
    </header><!-- /#banner -->
@show

@section('aside')
    <aside id="featured" class="body container">
        <article>
            <figure>
                {{ Html::image('img/cart.png', 'cart', ['class' => 'trolley']) }}
            </figure>
            <hgroup>

                <h2>Featured Article</h2>
                <h3><a href="#">HTML5 in Smashing Magazine!</a></h3>
            </hgroup>

        </article>
    </aside><!-- /#featured -->
@show

<section id="content" class="container">
    @yield('content')
</section>

@section('footer')
    <footer id="contentinfo" class="body">
        <address id="about" class="vcard body">
        <span class="primary">
          <span class="role">Shopping cart</span>
        </span><!-- /.primary -->
            {{ Html::image('img/carts.png', 'cart', ['class' => 'photo']) }}
            <span class="bio">Where you can easily create shopping lists.</span>

        </address><!-- /#about -->
    </footer><!-- /#contentinfo -->
@show

@section('includes')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{ Html::style('css/style.css') }}

@show

</body>
</html>