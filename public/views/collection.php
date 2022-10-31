<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<?php $engine->includeWhen( $single, 'parts.collection-header' ) ?>

	<div class="collection collection--summary o-flow">
		<?php $engine->each( 'parts.entry-summary', $collection, 'entry' ) ?>
	</div>

	<?php $engine->includeWhen( $pagination, 'parts.pagination' ) ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
