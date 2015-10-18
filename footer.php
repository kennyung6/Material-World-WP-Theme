<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpmice
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpmice' ) ); ?>"><?php printf( __( 'Proudly powered by %s "material world" theme | "wpmice" and "bootstrap paper" modyfication and WP implementation', 'wpmice' ), 'WordPress' ); ?></a>
			<br/>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'wpmice' ), 'wpmice', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
