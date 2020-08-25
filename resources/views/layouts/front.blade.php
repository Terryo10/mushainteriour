<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">

<!-- Mirrored from www.goddardlittlefair.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Jun 2020 00:42:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel')}}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="{{asset('fontawsome/css/all.css')}}" rel="stylesheet">
<!-- This site is optimized with the Yoast SEO plugin v7.7.3 - https://yoast.com/wordpress/plugins/seo/ -->
<meta name="description" content="Interior Designers and Hospitality Designers London - Goddard Littlefair: interior design, hospitality design and residential interior designers"/>
<link rel="canonical" href="index.html" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Interior Designers London | Hospitality Designers | Luxury Interior Design" />
<meta property="og:description" content="Interior Designers and Hospitality Designers London - Goddard Littlefair: interior design, hospitality design and residential interior designers" />
<meta property="og:url" content="http://www.goddardlittlefair.com/" />
<meta property="og:site_name" content="Goddard Littlefair" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Interior Designers and Hospitality Designers London - Goddard Littlefair: interior design, hospitality design and residential interior designers" />
<meta name="twitter:title" content="Interior Designers London | Hospitality Designers | Luxury Interior Design" />
<!-- / Yoast SEO plugin. -->
  <!-- Styles  laravel bootstrap-->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <script src="{{ asset('js/app.js') }}" defer></script>
<link rel='dns-prefetch' href='http://s.w.org/' />
<link rel="alternate" type="application/rss+xml" title="Musha Interior &raquo; Feed" href="feed/index.html" />
<link rel="alternate" type="application/rss+xml" title="Musha Interior &raquo; Comments Feed" href="comments/feed/index.html" />
<link rel='stylesheet' id='wp-pagenavi-css'  href='{{asset('front/wp-content/plugins/wp-pagenavi/pagenavi-css44fd.css?ver=2.70')}}' type='text/css' media='all' />
<link rel='stylesheet' id='xtheme-layout-css'  href='{{asset('front/wp-content/themes/GoddardLittlefair2016/css/layout5152.css?ver=1.0')}}' type='text/css' media='all' />
<script type='text/javascript' src='{{asset('front/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4')}}'> </script>
<link rel='https://api.w.org/' href='wp-json/index.html' />
<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed97f1.json?url=http%3A%2F%2Fwww.goddardlittlefair.com%2F" />
<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embedc216?url=http%3A%2F%2Fwww.goddardlittlefair.com%2F&amp;format=xml" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <meta name="msapplication-TileImage" content="/win8-tile-icon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
      </head>
  <body id="body" class="home page-template-default page page-id-4 body" style="background-color:#ffffff;">
  <div id="app">
    <div class="page-wrapper">
        <header class="header">
            <a class="logo" href="/" title="Musha Interiours">
                <img class="logo-img" src="{{asset('front/wp-content/themes/GoddardLittlefair2016/images/Musha Interiors-01.svg')}}" alt="MUSHA INTERIOR">
            </a>
            <a class="nav-toggle" href="#"><span class="navicon"></span>Menu</a>
            <nav class="main-nav" id="main-nav">
                <ul id="menu-main-menu" class="menu">

                        <li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a href="/about">About</a></li>
<li id="menu-item-43" class="menu-item menu-item-type-post_type_archive menu-item-object-projects menu-item-has-children menu-item-43"><a href="/projects">Projects</a>
<ul class="sub-menu">
    @foreach ($projectcat as $proj )
<li id="menu-item-48" class="menu-item menu-item-type-taxonomy menu-item-object-project_category menu-item-48"><a href="/projects_cat/{{$proj->id}}">{{$proj->name}}</a></li>
    @endforeach
	
</ul>
</li>
<li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a href="/blog">Blog</a></li>
<li id="menu-item-52" class="menu-item menu-item-type-post_type_archive menu-item-object-awards menu-item-52"><a href="/shop">Shop</a></li>
<li id="menu-item-44" class="menu-item menu-item-type-post_type_archive menu-item-object-press menu-item-44"><a href="/contact">Contact</a></li>
@guest

    @else
    <li id="menu-item-44" class="menu-item menu-item-type-post_type_archive menu-item-object-press menu-item-44"><a href="/home">My Account</a></li>
    @endguest
<li id="menu-item-44" class="menu-item menu-item-type-post_type_archive menu-item-object-press menu-item-44"><a href="/cart">Cart({{ $quantity ?? 0 }})</a></li>
</ul>                <a class="content-toggle" href="#"></a>
                            </nav>
        </header>
        <main class="main" role="main">
        @include('inc.message')
        @yield('content')
</main>
        <footer class="footer">
            <div class="footer-container">
                @guest
                <a class="footer-text" href="{{ route('login') }}">{{ __('Login') }}</a>
                @else
                <a class="footer-text" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
                @endif
                <ul class="social-navigation">
                    <li class="menu-item"><a href="https://twitter.com/goddardlittle?lang=en"></a></li>
                    <li class="menu-item"><a href="https://www.linkedin.com/company/6065616?trk=tyah&amp;trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A6065616%2Cidx%3A2-1-3%2CtarId%3A1453389051140%2Ctas%3AGoddard%20Littlefair"></a></li>
                    <li class="menu-item"><a href="https://uk.pinterest.com/Goddardlittle/"></a></li>
                    <li class="menu-item"><a href="https://www.instagram.com/goddardlittlefair/"></a></li>
                    <li class="menu-item"><a href="https://www.facebook.com/goddardlittlefair/?fref=ts"></a></li>
                    <li class="menu-item"><a href="#"></a></li>
                </ul>
                <a class="footer-text" href="https://designave.co.zw/">POWERED BY DESIGNAVE</a>
            </div>
        </footer>
    </div><!-- .page-wrapper -->
    <div class="webstat">
        <script type="text/javascript" language="JavaScript" src="http://hv3.webstat.com/cgi-bin/wsv2.cgi?144268"></script>
        <noscript>
            <a href="http://www.webstat.com/">
            <img src="http://hv3.webstat.com/scripts/wsb.php?ac=144268" border="0" alt="Website Analytics and Website Statistics by WebSTAT" /></a>
        </noscript>
    </div>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"http:\/\/www.goddardlittlefair.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
/* ]]> */
</script>
<script type='text/javascript' src='{{asset('front/wp-content/plugins/contact-form-7/includes/js/scriptsce52.js?ver=5.0.2')}}'></script>
<script type='text/javascript' src='{{asset('front/wp-content/themes/GoddardLittlefair2016/js/site.min5152.js?ver=1.0')}}'></script>
<script type='text/javascript' src='{{asset('front/wp-includes/js/wp-embed.mind8f3.js?ver=4.9.12')}}'></script>
</div>
</body>

<script>
function increment(id) {

  var jj = document.getElementById('quantity'+id);
  var jk = parseInt(jj.value) + 1;

  // window.alert(jk)
  jj.value = jk;


}

function decrement(id) {

  var jj = document.getElementById('quantity'+id);

  if (parseInt(jj.value) > 1) {
      var jk = parseInt(jj.value) - 1;
       jj.value = jk;
  }else{
       window.alert("Product Quantity cannot be less than 1")
      jj.value = 1;
  }
}
</script>
</html>
