<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<article class="entry entry--single o-flow">

		<header class="entry__header o-flow o-container-base">
			<div class="entry__byline block-row">
				<?= e( $single->published() ) ?>
			</div>
			<h1 class="entry__title"><?= batch( $single->title(), 'e|runt' ) ?></h1>
		</header>

		<div class="entry__content o-flow o-container-base">
			<?= $single->content() ?>
		</div>

		<footer class="entry__footer o-flow o-container-base">
			<?= App\render_block( 'blush/entry-terms', [
				'entry'    => $single,
				'label'    => 'Topics:',
				'taxonomy' => 'category'
			] ) ?>
		</footer>
	</article>
</main>

<?php $engine->include( 'parts.footer' ) ?>
