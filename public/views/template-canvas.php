<?php $engine->include( 'parts.header' ) ?>

<main class="app-content app-content--canvas o-flow">
	<article class="entry entry--single o-flow">
		<div class="entry__content o-flow o-container-base">
			<?= $single->content() ?>
		</div>
	</article>
</main>

<?php $engine->include( 'parts.footer' ) ?>
