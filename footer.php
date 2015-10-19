<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpmaterialdesign
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpmaterialdesign' ) ); ?>"><?php printf( __( 'Proudly powered by %s "material world" theme | "wpmaterialdesign" and "bootstrap paper" modyfication and WP implementation', 'wpmaterialdesign' ), 'WordPress' ); ?></a>
			<br/>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'wpmaterialdesign' ), 'wpmaterialdesign', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
