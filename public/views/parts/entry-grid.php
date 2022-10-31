<?php if ( $media = $entry->media( 'image' ) ) : ?>

	<figure class="entry__image">
		<a href="<?= e( $entry->url() ) ?>"><?php printf(
			'<img src="%s" width="%s" height="%s" alt="%s" />',
			e( $media->url() ),
			e( $media->width() ),
			e( $media->height() ),
			e( $entry->metaSingle( 'image:alt' ) )
		) ?></a>
		<figcaption><?= batch( $entry->title(), 'e|runt' ) ?></figcaption>
	</figure>

<?php endif ?>
