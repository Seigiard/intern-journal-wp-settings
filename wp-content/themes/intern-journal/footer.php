<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Intern_Journal
 */

if ( ! is_active_sidebar( 'footer-anounce' )
	&& ! is_active_sidebar( 'footer-copyright' ) ) {
	return;
}
?>
	<footer class="container">
		<div class="column">
			<?php if ( is_active_sidebar( 'footer-anounce' ) ) : ?>
				<div class="anounce full"><?php dynamic_sidebar( 'footer-anounce' ); ?></div>
			<?php endif; ?>
			<div class="full">
				<div class="footer-container footer-copyright">
					<aside class="footer-copyright--column1">
					<?php if ( is_active_sidebar( 'footer-copyright' ) ) : ?>
						<?php dynamic_sidebar( 'footer-copyright' ); ?>
					<?php endif; ?>
					</aside>
					<div class="footer-copyright--column2">
						<?php if ( is_active_sidebar( 'footer-text' ) ) : ?>
							<?php dynamic_sidebar( 'footer-text' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700|IBM+Plex+Serif:600|Montserrat:600,900&amp;subset=cyrillic,cyrillic-ext"
        rel="stylesheet">
</body>
</html>
