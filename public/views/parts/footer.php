	<footer class="app-footer o-flow">
		<div class="o-flow">
			<?php $engine->include( 'parts.menu-social' ) ?>
		</div>
		<p class="app-footer__credit">
			<span class="app-footer__copyright">&copy; 2003&ndash;<?= date( 'Y' ) ?> Justin Tadlock.</span>
			<br />
			<span class="app-footer__poweredby"><?= Blush\PoweredBy::render() ?></span>
		</p>
	</footer>

</div><!-- .app -->

<script>
	let menu   = document.querySelector( '.menu-primary' );
	let toggle = document.querySelector( '.toggle--menu-primary .toggle__button' );
	let open   = document.querySelector( '.toggle--menu-primary .toggle__open' );
	let close  = document.querySelector( '.toggle--menu-primary .toggle__close' );

	if ( null !== menu && null !== toggle ) {
		toggle.onclick = () => {
			menu.classList.toggle( 'hidden' );
			open.classList.toggle( 'hidden' );
			close.classList.toggle( 'hidden' );
		}
	}

	let images = document.querySelectorAll( 'img' );

	images.forEach( ( image ) => {
		let classes = image.classList;

		image.onload = () => {
			if ( ( classes.contains( 'alignleft' ) || classes.contains( 'alignright' ) ) && 300 >= image.naturalWidth ) {
				classes.add( 'is-small' );
			}
		}
	} );
</script>

</body>
</html>
