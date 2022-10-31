<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<article class="entry entry--single o-flow">
		<header class="entry__header o-flow o-container-base">
			<h1 class="entry__title"><?= batch( sprintf(
				'%s%s',
				$single->title(),
				$single->subtitle() ? ': ' . $single->subtitle() : ''
			), 'e|runt' ) ?></h1>
			<div class="entry__byline block-row">
				<?php printf(
					'Estimated Reading Time: %s',
					$single->readingTime()
				) ?>
			</div>
		</header>

		<div class="entry__content o-flow o-container-base">
			<?= $single->content() ?>
		</div>

		<footer class="entry__footer o-flow o-container-base">
			<?= App\render_block( 'blush/entry-terms', [
				'entry'    => $single,
				'label'    => 'Genre:',
				'taxonomy' => 'literary_genre'
			] ) ?>

			<?= App\render_block( 'blush/entry-terms', [
				'entry'    => $single,
				'label'    => 'Form:',
				'taxonomy' => 'literary_form'
			] ) ?>

			<?= App\render_block( 'blush/entry-terms', [
				'entry'    => $single,
				'label'    => 'Technique:',
				'taxonomy' => 'literary_technique'
			] ) ?>
		</footer>
	</article>
</main>

<?php $engine->include( 'parts.footer' ) ?>
