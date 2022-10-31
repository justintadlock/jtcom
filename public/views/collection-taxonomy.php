<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<?php $engine->includeWhen( $single, 'parts.collection-header' ) ?>

	<div class="collection collection--list o-flow o-container-base">
		<ul>
			<?php foreach ( $collection as $entry ) : ?>
				<li><a href="<?= e( $entry->url() ) ?>"><?= runt( e( $entry->title() ) ) ?></a></li>
			<?php endforeach ?>
		</ul>
	</div>

	<?php $engine->includeWhen( $pagination, 'parts.pagination' ) ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
