<?php get_header(); ?>
<section id="content" role="main" class="inner">
	<header class="header">
	<h1 class="entry-title"><?php 
	if ( is_day() ) { printf( __( 'Daily Archives: %s', 'ashdown' ), get_the_time( get_option( 'date_format' ) ) ); }
	elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'ashdown' ), get_the_time( 'F Y' ) ); }
	elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'ashdown' ), get_the_time( 'Y' ) ); }
	else { _e( 'Archives', 'ashdown' ); }
	?></h1>
	</header>
	<section class="post-archives">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'entry' ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'nav', 'below' ); ?>
	</section>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>