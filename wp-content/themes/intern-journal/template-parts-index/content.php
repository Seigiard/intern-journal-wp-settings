<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Intern_Journal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('teaser'); ?>>
	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="teaser--posted-date">
			<?php
				intern_journal_posted_date();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php
		the_title( '<h2 class="teaser--title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	?>
	<p class="teaser--lead-text"><? the_field('lead_text'); ?></p>
</article><!-- #post-<?php the_ID(); ?> -->
