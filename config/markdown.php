<?php
# Markdown configuration.
#
# Blush uses the League\CommonMark package for handling Markdown and Front
# Matter conversion of content into HTML.  Users modify the configuration and
# add their preferred extensions below.

use League\CommonMark\Extension\{
	Attributes\AttributesExtension,
	Autolink\AutolinkExtension,
	CommonMark\CommonMarkCoreExtension,
	DescriptionList\DescriptionListExtension,
	DisallowedRawHtml\DisallowedRawHtmlExtension,
	Footnote\FootnoteExtension,
	HeadingPermalink\HeadingPermalinkExtension,
	SmartPunct\SmartPunctExtension,
	Strikethrough\StrikethroughExtension,
	TableOfContents\TableOfContentsExtension,
	Table\TableExtension,
	TaskList\TaskListExtension
};

use App\Plugins\MarkdownCite;

return [
	// Customize the configuration.
	// https://commonmark.thephpleague.com/2.2/configuration/
	// https://commonmark.thephpleague.com/2.2/security/
	'config' => [
		'renderer' => [
			'soft_break' => '<br />'
		],
		'disallowed_raw_html' => [
			'disallowed_tags' => [
				'title',
				'textarea',
				'style',
				'xmp',
				'noembed',
				'noframes',
				'script',
				'plaintext'
			],
		],
		'footnote' => [
			'container_add_hr'   => false,
			'container_class'    => 'footnotes',
			'ref_class'          => 'footnotes__ref',
			'footnote_class'     => 'footnotes__note',
			'backref_class'      => 'footnotes__backref',
		],
		'heading_permalink' => [
			'html_class'      => 'block-heading__permalink',
			'id_prefix'       => '',
			'fragment_prefix' => '',
			'title'           => '',
			'symbol'          => ' '
		],
		'table_of_contents' => [
			'html_class'  => 'block-table-of-contents',
			'position'    => 'placeholder',
			'placeholder' => '{block:table-of-contents}'
		]
	],

	// Register extensions by adding extension class names.
	// https://commonmark.thephpleague.com/2.2/extensions/overview/
	'extensions' => [
		AttributesExtension::class,
		AutolinkExtension::class,
		CommonMarkCoreExtension::class,
		DescriptionListExtension::class,
		DisallowedRawHtmlExtension::class,
		FootnoteExtension::class,
		HeadingPermalinkExtension::class,
		SmartPunctExtension::class,
		StrikethroughExtension::class,
		TableOfContentsExtension::class,
		TableExtension::class,
		TaskListExtension::class
	],

	'inline_parsers' => [
		MarkdownCite::class
	]
];
