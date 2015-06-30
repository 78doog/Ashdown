<?php get_header(); ?>
<section id="content" role="main" class="inner">
    <header class="header">
    <?php the_post(); ?>
        <h1 class="entry-title author"><?php _e( 'Author Archives', 'ashdown' ); ?>: <?php the_author_link(); ?></h1>
    <?php if ( '' != get_the_author_meta( 'user_description' ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . get_the_author_meta( 'user_description' ) . '</div>' ); ?>
    <?php rewind_posts(); ?>
    </header>
    <?php while ( have_posts() ) : the_post(); ?>
	<section class="entry-summary<?php if ( has_post_thumbnail() ) { ?> thumbnail<?php } ?>">
		<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"> <?php the_post_thumbnail("thumbnail");?></a><?php } ?>
		<?php the_excerpt(); ?>
		<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
	</section>
    <?php endwhile; ?>
	<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
	<nav id="nav-below" class="pagination" role="navigation">
	    <?php html5wp_pagination(); ?>
	</nav>
	<?php } ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>  