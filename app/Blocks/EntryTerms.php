<?php
namespace App\Blocks;

class EntryTerms
{
	protected array $options = [];
	public function __construct( array $options = [] )
	{
		$this->options = $options;
	}
	public function render(): string
	{
		if ( ! $this->options['entry'] || ! $this->options['taxonomy'] ) {
			return '';
		}

		$terms = $this->options['entry']->terms( $this->options['taxonomy'] );

		if ( ! $terms || ! $terms->hasEntries() ) {
			return '';
		}

		$block = '<div class="entry-terms">%s</div>';

		$label = isset( $this->options['label'] ) ? e( $this->options['label'] ) : '';

		if ( $label ) {
			$label = sprintf(
				'<span class="entry-terms__label">%s </span>',
				$label
			);
		}

		$list = '';

		foreach ( $terms as $term ) {
			$list .= sprintf(
				'<a class="entry-terms__term" href="%s"><span class="entry-terms__prefix">#</span>%s</a>',
				e( $term->url() ),
				e( $term->title() )
			);
		}

		$list = sprintf( '<span class="entry-terms__list">%s</span>', $list );

		return sprintf( $block, $label . $list );
	}
}
