<?php

namespace App\Plugins;

use League\CommonMark\Delimiter\Delimiter;
use League\CommonMark\Node\Inline\Text;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\Util\AttributesHelper;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
//use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\CommonMark\Node\Inline\HtmlInline;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;
use League\CommonMark\Util\HtmlElement;

class MarkdownCite implements InlineParserInterface
{
	protected $validTags = [
		'abbr',
		'acronym',
		'big',
		'cite',
		'dfn',
		'kbd',
		'q',
		'samp',
		'small',
		'span',
		'sub',
		'sup',
		'time',
		'var'
	];

	public function getMatchDefinition(): InlineParserMatch
	{
		return InlineParserMatch::regex( ':([a-zA-Z]+)\[(.*?)\](\(.*?\))?({.*?})?' );
	}

	public function parse( InlineParserContext $inlineContext ): bool
	{
		$cursor  = $inlineContext->getCursor();
		$matches = $inlineContext->getSubMatches();

		// If no tag and content, bail.
		if ( ! isset( $matches[0] ) && ! isset( $matches[1] ) ) {
			return false;
		}

		$element = $matches[0];
		$content = $matches[1];
		$attr    = [];

		if ( ! in_array( $element, $this->validTags ) ) {
			return false;
		}

		if ( isset( $matches[3] ) ) {
			$state = $cursor->saveState();
			$cursor->advanceBy(
				$inlineContext->getFullMatchLength() - mb_strlen( $matches[3] )
			);

		        $attr = AttributesHelper::parseAttributes( $cursor );
			$cursor->restoreState( $state );
		}

		if ( isset( $matches[2] ) && method_exists( $this, $element ) ) {
			preg_match( "/\((.*?)\)/", $matches[2], $identifier );

			if ( isset( $identifier[1] ) ) {
				$attr = $this->$element( $identifier[1], $attr );
			}
		}

		$cursor->advanceBy( $inlineContext->getFullMatchLength() );

		$inlineContext->getContainer()->appendChild( new HtmlInline(
			new HtmlElement( $element, $attr, $content )
		) );

		return true;
	}

	protected function abbr( string $identifier, array $attr ) {
		return array_merge( [
			'title' => trim( $identifier, '"\'' ) // @todo escape
		] );
	}
}
