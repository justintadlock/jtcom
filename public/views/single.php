<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<article class="entry entry--single o-flow">
		<header class="entry__header o-flow o-container-base">
			<h1 class="entry__title"><?= batch( $single->title(), 'e|runt' ) ?></h1>
		</header>

		<div class="entry__content o-flow o-container-base">
			<?= $single->content() ?>
		</div>
	</article>

	<?php if ( $collection ) : ?>
		<div class="collection o-flow o-container-base">
			<?php $engine->each( 'parts.entry-summary', $collection, 'entry' ) ?>
		</div>
	<?php endif ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
