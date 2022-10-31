<?= '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<?= '<?xml-stylesheet href="' . asset( 'xsl/sitemap.xsl' ) . '" type="text/xsl"?>' . PHP_EOL  ?>
<urlset
	xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:blush="https://justintadlock/blush/rss"
>
	<blush:stylesheet href="<?= e( asset( 'css/sitemap.css' ) ) ?>"/>
	<blush:favicon-180 href="<?= e( asset( 'img/favicon-180.png' ) ) ?>"/>
	<blush:favicon-96 href="<?= e( asset( 'img/favicon-96.png' ) ) ?>"/>
	<blush:favicon-48 href="<?= e( asset( 'img/favicon-48.png' ) ) ?>"/>
	<blush:favicon-32 href="<?= e( asset( 'img/favicon-32.png' ) ) ?>"/>
	<blush:favicon-16 href="<?= e( asset( 'img/favicon-16.png' ) ) ?>"/>

	<?php foreach ( $collection as $entry ) {
		printf(
			"<url>\n\t\t<loc>%s</loc>\n\t\t<lastmod>%s</lastmod>\n\t</url>\n\t",
			e( $entry->url() ),
			e( $entry->updated( DATE_W3C ) )
		);
	} ?>
</urlset>
