<entry>
	<title><?= e( $item->title() ) ?></title>
	<link rel="alternate"><?= e( $item->url() ) ?></link>
	<summary><![CDATA[<?= cdata( $item->excerpt() ) ?>]]></summary>

	<published><?= e( $item->published( DATE_ATOM )  ) ?></published>

	<?php if ( $author = $item->author() ) : ?>
		<author>
			<name><?= e( $author->title() ) ?></name>
		</author>
	<?php endif ?>

	<?php foreach ( $item->terms( 'category' ) as $term ) : ?>
		<category term="<?= e( $term->name() ) ?>" label="<?= e( $term->title() ) ?>" />
	<?php endforeach ?>

	<?php if ( $media = $item->media() ) : ?>
		<?php printf(
			'<link rel="enclosure" href="%s" length="%s" type="%s"/>',
			e( $media->url() ),
			e( $media->size() ),
			e( $media->mimeType() )
		) ?>
	<?php endif ?>

	<content><![CDATA[<?= cdata( $item->content() ) ?>]]></content>
</entry>
