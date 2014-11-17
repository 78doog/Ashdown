<?php get_header(); ?>
<section id="content" role="main" class="inner">
	<header class="header">
	<h1 class="entry-title"><?php _e( 'Category Archives: ', 'ashdown' ); ?><?php single_cat_title(); ?></h1>
	<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
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