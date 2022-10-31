<!DOCTYPE html>
<html>
<head>
	<?php
	echo $doctitle->render() . PHP_EOL;
	echo $engine->metaViewport();
	echo $engine->metaDescription();
	echo $engine->ogImage( asset( 'img/featured.png' ) );
	echo $engine->ogImageAlt();
	echo $engine->twitterCard();
	echo $engine->twitterCreator( '@justintadlock' );
	echo $engine->twitterSite( '@justintadlock' );
	echo $engine->metaThemeColor( '#2b6cb0' );
	echo $engine->linkCanonical();
	?>
	<link rel="manifest" href="<?= e( asset( 'json/manifest.json' ) ) ?>">
	<link rel="alternate" type="application/rss+xml" href="<?= e( url( 'feed' ) ) ?>" />
	<link rel="alternate" type="application/atom+xml" href="<?= e( url( 'feed/atom' ) ) ?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?= e( asset( 'img/favicon-180.png' ) ) ?>" />
	<link rel="icon" type="image/png" sizes="96x96" href="<?= e( asset( 'img/favicon-96.png' ) ) ?>" />
	<link rel="icon" type="image/png" sizes="48x48" href="<?= e( asset( 'img/favicon-48.png' ) ) ?>" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?= e( asset( 'img/favicon-32.png' ) ) ?>" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= e( asset( 'img/favicon-16.png' ) ) ?>" />
	<link rel="preload" href="<?= e( public_url( 'fonts/caveat/caveat.woff2' ) ) ?>" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?= e( public_url( 'fonts/figtree/figtree.woff2' ) ) ?>" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?= e( public_url( 'fonts/karla/karla.woff2' ) ) ?>" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="stylesheet" media="screen" href="<?= e( asset( 'css/style.css' ) ) ?>" />
	<link rel="stylesheet" media="print" href="<?= e( asset( 'css/print.css' ) ) ?>" />
	<?= App\view_style( $single ) . PHP_EOL ?>
</head>
<body>

<div class="app o-container-full">

	<header class="app-header">

		<div class="app-header__branding">
			<h1 class="app-header__title">
				<a class="app-header__link" href="<?= e( url() ) ?>"><?= config( 'app.title' ) ?></a>
			</h1>
		</div>

		<div class="toggle toggle--menu-primary">
			<button class="toggle__button">
				<span class="screen-reader-text">Open Menu</span>
				<svg class="toggle__open" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
				<svg class="toggle__close hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"></path>
				</svg>
			</button>
		</div>

		<nav class="menu-primary hidden">
			<ul class="menu-primary__items">
				<li class="menu-primary__item">
					<a class="menu-primary__link" href="<?= e( url( 'about' ) ) ?>">About</a>
				</li>
				<li class="menu-primary__item">
					<a class="menu-primary__link" href="<?= e( url( 'archives' ) ) ?>">Archives</a>
				</li>
				<li class="menu-primary__item">
					<a class="menu-primary__link" href="<?= e( url( 'contact' ) ) ?>">Contact</a>
				</li>
				<li class="menu-primary__item">
					<a class="menu-primary__link" href="<?= e( url( 'writing' ) ) ?>">Writing</a>
				</li>
				<li class="menu-primary__item">
					<a class="menu-primary__link" href="<?= e( url( 'feed' ) ) ?>">Feed</a>
				</li>
			</ul>
		</nav>

	</header>

	<div class="wrap">
		<div class="inner">
</div>
</div>
