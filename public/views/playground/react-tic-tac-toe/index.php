<!doctype html>
<html lang="en">
<head>
	<?= $doctitle->render() ?>
	<?= App\meta_viewport() ?>
	<?= App\meta_description( $single ) ?>
	<?= App\og_description( $single ) ?>
	<?= App\meta_keywords( $single ) ?>
	<?= App\og_image( $single ) ?>
	<?= App\twitter_image( $single ) ?>
	<?= App\twitter_card( $single ) ?>
	<?= App\twitter_creator() ?>
	<?= App\twitter_site() ?>
	<?= App\twitter_text_title( $single ) ?>
	<?= App\theme_color() ?>

	<script defer="defer" src="<?= e( asset( 'views/playground/react-tic-tac-toe/main.js' ) ) ?>"></script>
	<link href="<?= e( asset( 'views/playground/react-tic-tac-toe/main.css' ) ) ?>" rel="stylesheet">
</head>

<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	<div id="root"></div>
</body>
</html>
