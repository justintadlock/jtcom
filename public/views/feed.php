<?= '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<?= '<?xml-stylesheet href="' . asset( 'xsl/feed.xsl' ) . '" type="text/xsl"?>' . PHP_EOL  ?>
<rss
	version="2.0"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:blush="https://justintadlock/blush/rss"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:media="http://search.yahoo.com/mrss/"
>
	<blush:stylesheet href="<?= e( asset( 'css/feed.css' ) ) ?>"/>
	<blush:favicon-180 href="<?= e( asset( 'img/favicon-180.png' ) ) ?>"/>
	<blush:favicon-96 href="<?= e( asset( 'img/favicon-96.png' ) ) ?>"/>
	<blush:favicon-48 href="<?= e( asset( 'img/favicon-48.png' ) ) ?>"/>
	<blush:favicon-32 href="<?= e( asset( 'img/favicon-32.png' ) ) ?>"/>
	<blush:favicon-16 href="<?= e( asset( 'img/favicon-16.png' ) ) ?>"/>

	<channel>
		<title><?= e( $feed->title() ) ?></title>
		<link><?= e( $feed->url() ) ?></link>
		<description><![CDATA[<?= cdata( $feed->description() ) ?>]]></description>

		<atom:link href="<?= e( $feed->feedUrl() ) ?>" type="application/rss+xml" rel="self"/>

		<?php if ( $language = $feed->language() ) : ?>
			<language><?= e( $language ) ?></language>
		<?php endif ?>

		<?php if ( $published = $feed->published() ) : ?>
			<pubDate><?= e( $published ) ?></pubDate>
		<?php endif ?>

		<?php if ( $updated = $feed->updated() ) : ?>
			<lastBuildDate><?= e( $updated ) ?></lastBuildDate>
		<?php endif ?>

		<?php if ( $ttl = $feed->ttl() ) : ?>
			<ttl><?= e( $ttl ) ?></ttl>
		<?php endif ?>

		<?php $engine->each( 'parts.feed-item-rss', $collection, 'item' ) ?>
	</channel>
</rss>
