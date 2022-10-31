<?php

use App\Plugins\OpenGraph\{
	Description,
	Image,
	ImageAlt,
	Title,
	Url,
	LinkCanonical,
	MetaDescription,
	MetaKeywords,
	MetaThemeColor,
	MetaViewport,
	TwitterCard,
	TwitterCreator,
	TwitterSite
};

return [
	'tags' => [
		'metaDescription' => MetaDescription::class,
		'metaKeywords'    => MetaKeywords::class,
		'metaViewport'    => MetaViewport::class,
		'metaThemeColor'  => MetaThemeColor::class,
		'linkCanonical'   => LinkCanonical::class,
		'ogDescription'   => Description::class,
		'ogImage'         => Image::class,
		'ogImageAlt'      => ImageAlt::class,
		'ogTitle'         => Title::class,
		'ogUrl'           => Url::class,
		'twitterCard'     => TwitterCard::class,
		'twitterCreator'  => TwitterCreator::class,
		'twitterSite'     => TwitterSite::class
	]
];
