<?= '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<?= '<?xml-stylesheet href="' . asset( 'xsl/feed-atom.xsl' ) . '" type="text/xsl"?>' . PHP_EOL  ?>
<feed
	xmlns="http://www.w3.org/2005/Atom"
	xmlns:blush="https://justintadlock/blush/rss"
>
	<blush:stylesheet href="<?= asset( 'css/feed.css' ) ?>"/>
	<blush:favicon-180 href="<?= e( asset( 'img/favicon-180.png' ) ) ?>"/>
	<blush:favicon-96 href="<?= e( asset( 'img/favicon-96.png' ) ) ?>"/>
	<blush:favicon-48 href="<?= e( asset( 'img/favicon-48.png' ) ) ?>"/>
	<blush:favicon-32 href="<?= e( asset( 'img/favicon-32.png' ) ) ?>"/>
	<blush:favicon-16 href="<?= e( asset( 'img/favicon-16.png' ) ) ?>"/>

	<id><?= e( $feed->url() ) ?></id>
	<title><?= e( $feed->title() ) ?></title>
	<link rel="self" href="<?= e( $feed->feedUrl() ) ?>" />

	<?php if ( $updated = $feed->updated() ) : ?>
		<updated><?= e( $updated ) ?></updated>
	<?php endif ?>

	<subtitle><![CDATA[<?= cdata( $feed->description() ) ?>]]></subtitle>

	<?php if ( $url = $feed->feedUrl() ) : ?>
		<link href="<?= e( $url ) ?>" rel="self"/>
	<?php endif ?>

	<?php $engine->each( 'parts.feed-item-atom', $collection, 'item' ) ?>
</feed>
