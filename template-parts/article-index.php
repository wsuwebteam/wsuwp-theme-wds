<?php namespace WSUWP\Theme\WDS;

$context = ( ! empty( $args['context'] ) ) ? $args['context'] : 'page';

?>
<article class="wsu-article wsu-card wsu-card--horizontal">
	<div class="wsu-card__content">
		<h2 class="wsu-title wsu-title--large">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php Template::get_template_part( 'template-component/component-post-published-date', 'article-index', $context ); ?>
		<?php Template::get_template_part( 'template-component/component-post-caption', 'article-index', $context ); ?>
		<?php Template::get_template_part( 'template-component/component-post-published-by', 'article-index', $context ); ?>
		<?php Template::get_template_part( 'template-component/component-post-categories', 'article-index', $context ); ?>
		<?php Template::get_template_part( 'template-component/component-post-tags', 'article-index', $context ); ?>
	</div>
</article>
