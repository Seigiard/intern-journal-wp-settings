<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Intern_Journal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block-article container'); ?>>
	<main class="column">
		<header class="article--header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

			<div class="lead full"><p><? the_field('lead_text'); ?></p></div>

			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="interviewer entry-meta">
					<?php
					intern_journal_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php //intern_journal_post_thumbnail(); ?>
			<? get_field_wrapped('intro_text', 'article--intro'); ?>
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'intern-journal' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'intern-journal' ),
				'after'  => '</div>',
			) );
			?>
	</main>
</article><!-- #post-<?php the_ID(); ?> -->

<footer class="article--footer container">
	<div class="column">
		<div class="likely likely-big">
			<div class="facebook">Поделиться</div>
			<div class="vkontakte">Поделиться</div>
			<div class="twitter">Твитнуть</div>
			<div class="telegram">Отправить</div>
		</div>
		<div class="article--outro">
			<?php the_field('outro_text'); ?>
			<p>
				<a href="https://t-do.ru/studentbureau" class="link__channel">Подписаться на новые статьи</a>
			</p>
		</div>
		<? get_field_wrapped('release_group', 'release-group'); ?>
	</div>

</footer><!-- .entry-footer -->