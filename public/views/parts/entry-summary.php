<?php $format = $entry->metaSingle( 'format', 'standard' ); ?>

<?php if ( 'aside' === $format ) : ?>

	<article class="entry <?= e( "entry--format-{$format}" ) ?> o-flow o-container-base">
		<div class="entry__content o-flow">
			<?= $entry->content() ?>
		</div>
	</article>

<?php else : ?>

	<article class="entry <?= e( "entry--format-{$format}" ) ?> o-flow">

		<header class="entry__header o-flow o-container-base">
			<div class="entry__byline block-row">
				<?= e( $entry->published() ) ?>
			</div>
			<h2 class="entry__title">
				<a href="<?= e( $entry->url() ) ?>"><?= batch( $entry->title(), 'e|runt' ) ?></a>
			</h2>
		</header>

		<div class="entry__summary o-flow o-container-base">
			<?= $entry->excerpt( 50, sprintf(
				' &hellip; <a class="entry__more-link" href="%s">Continue reading&nbsp;&rarr;</a>',
				e( $entry->url() )
			) ) ?>
		</div>

	</article>

<?php endif ?>
