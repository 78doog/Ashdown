<?php get_header(); ?>
<section id="content" role="main" class="inner">
	<header class="header">
	<h1 class="entry-title"><?php _e( 'Category Archives: ', 'ashdown' ); ?><?php single_cat_title(); ?></h1>
	<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
		<section class="entry-meta">
			<span class="author vcard"><?php the_author_posts_link(); ?></span>
			<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
		</section>
	</header>
	
	<section class="post-archives">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="entry-summary<?php if ( has_post_thumbnail() ) { ?> thumbnail<?php } ?>">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"> <?php the_post_thumbnail("thumbnail");?></a><?php } ?>
			<?php the_excerpt(); ?>
			<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
		</section>
		<?php endwhile; endif; ?>
		
		<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav id="nav-below" class="pagination" role="navigation">
            <?php html5wp_pagination(); ?>
        </nav>
        <?php } ?>
		
	</section>
	<?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>