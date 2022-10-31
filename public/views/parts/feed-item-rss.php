<item>
	<title><?= e( $item->title() ) ?></title>
	<link><?= e( $item->url() ) ?></link>
	<description><![CDATA[<?= cdata( $item->excerpt() ) ?>]]></description>
	<pubDate><?= e( $item->published( DATE_RSS ) ) ?></pubDate>

	<?php if ( $author = $item->author() ) : ?>
		<author><?= e( $author->title() ) ?></author>
	<?php endif ?>

	<?php foreach ( $item->terms( 'category' ) as $term ) : ?>
		<category><?= e( $term->title() ) ?></category>
	<?php endforeach ?>

	<?php if ( $media = $item->media() ) : ?>
		<?php printf(
			'<enclosure url="%s" length="%s" type="%s"/>',
			e( $media->url() ),
			e( $media->size() ),
			e( $media->mimeType() )
		) ?>
		<?php printf(
			// Media RSS Spec: https://www.rssboard.org/media-rss
			'<media:content url="%s" fileSize="%s" type="%s" medium="%s" isDefault="true"/>',
			e( $media->url() ),
			e( $media->size() ),
			e( $media->mimeType() ),
			e( $media->type() )
		) ?>
	<?php endif ?>

	<content:encoded><![CDATA[<?= cdata( $item->content() ) ?>]]></content:encoded>
</item>
