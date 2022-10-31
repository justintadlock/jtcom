<div class="entry entry--single o-flow">
	<header class="entry__header o-flow o-container-base">
		<h1 class="entry__title"><?= batch( $single->title(), 'e|runt' ) ?></h1>
	</header>

	<?php if ( $content = $single->content() ) : ?>
		<div class="entry__content o-flow o-container-base">
			<?= $content ?>
		</div>
	<?php endif ?>
</div>
