<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<?php $engine->includeWhen( $single, 'parts.collection-header' ) ?>

	<div class="collection collection--category-painting o-flow o-container-base">
		<div class="gallery gallery--grid columns-2 stretch-xl">
			<?php $engine->each( 'parts.entry-grid', $collection, 'entry' ) ?>
		</div>
	</div>

	<?php $engine->includeWhen( $pagination, 'parts.pagination' ) ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
