<?php $engine->include( 'parts.header' ) ?>

<main class="app-content o-flow">
	<div class="entry entry--single o-flow">
		<header class="entry__header o-flow o-container-base">
			<h1 class="entry__title"><?= runt( e( $single->title() ) ) ?></h1>
		</header>

		<div class="entry__content o-flow o-container-base">
			<p>
			You are browsing the blog archives for
			<?= runt( e( $single->title() ) ) ?>. To see all posts, visit
			the <a href="<?= e( url( 'archives' ) ) ?>">archives</a>
			page. You may also view archives by
			<a href="<?= e( url( 'archives/months' ) ) ?>">month</a> or
			<a href="<?= e( url( 'archives/years' ) ) ?>">year</a>.
			</p>
		</div>
	</div>

	<div class="collection collection--summary o-flow">
		<?php $engine->each( 'parts.entry-summary', $collection, 'entry' ) ?>
	</div>

	<?php $engine->includeWhen( $pagination, 'parts.pagination' ) ?>
</main>

<?php $engine->include( 'parts.footer' ) ?>
