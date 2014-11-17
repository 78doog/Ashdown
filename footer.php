
	<footer id="footer" role="contentinfo">
		<section class="footer-inner inner">

			<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
				<ul id="footer-one" class="footer-list">
					<?php dynamic_sidebar( 'footer-one' ); ?>
				</ul>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
				<ul id="footer-two" class="footer-list">
					<?php dynamic_sidebar( 'footer-two' ); ?>
				</ul>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
				<ul  id="footer-three"class="footer-list">
					<?php dynamic_sidebar( 'footer-three' ); ?>
				</ul>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-four' ) ) : ?>
				<ul id="footer-four" class="footer-list">
					<?php dynamic_sidebar( 'footer-four' ); ?>
				</ul>
			<?php endif; ?>
			
						
			<div id="copyright">
				<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'ashdown' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'ashdown' ), '<a href="http://dougal.co/">Dougal</a>' ); ?>
			</div>
		</section>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>