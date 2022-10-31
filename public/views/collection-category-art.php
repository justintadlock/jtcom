<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<?php $engine->includeWhen( $single, 'parts.collection-header' ) ?>

	<div class="collection collection--category-art o-flow o-container-base">
		<div class="gallery gallery--grid columns-3 stretch-xl">
			<?php $engine->each( 'parts.entry-grid', $collection, 'entry' ) ?>
		</div>
	</div>

	<?php $engine->includeWhen( isset( $pagination ), 'parts.pagination' ) ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
