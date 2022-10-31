<?php
# App configuration.
#
# Configuration settings for your site.

return [
	// URL to the site.
	'url' => env( 'APP_URL', 'http://localhost' ),

	// A custom title for the site.
	'title' => 'Justin Tadlock',

	// Custom tagline for the site.
	'tagline' => 'Ramblings on Life, Art, Dev, and Other Stuff',

	// Select from a list of supported timezones:
	// https://www.php.net/manual/en/timezones.php
	'timezone' => 'America/Chicago',

	// Select from a list of supported date and time formats:
	// https://www.php.net/manual/en/datetime.formats.date.php
	'date_format' => 'F j, Y',
	'time_format' => 'g:i a',

	// Set the homepage to show a custom content type collection. This
	// should be the content type name/type (e.g., `post`) set in the
	// `/config/content.php` configuration file.  Leave empty to show the
	// normal homepage.
	'home_alias' => 'post',

	// Register service providers.
	'providers' => [
		\App\Provider::class
	],

	// Register static proxies classes.
	'proxies' => []
];
