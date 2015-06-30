<?php get_header(); ?>
<section id="content" role="main" class="inner">
	<header class="header">
	<h1 class="entry-title"><?php _e( 'Tag Archives: ', 'ashdown' ); ?><?php single_tag_title(); ?></h1>
	</header>
	
	<section class="post-archives">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <?php edit_post_link(); ?>
				<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
			</header>	
			<section class="entry-summary<?php if ( has_post_thumbnail() ) { ?> thumbnail<?php } ?>">
				<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"> <?php the_post_thumbnail("thumbnail");?></a><?php } ?>
				<?php the_excerpt(); ?>
				<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
			</section>
			<footer class="entry-footer">
				<span class="cat-links"><?php _e( 'Categories: ', 'ashdown' ); ?><?php the_category( ', ' ); ?></span>
				<span class="tag-links"><?php the_tags(); ?></span>
				<?php if ( comments_open() ) { 
				echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'ashdown' ) ) . '</a></span>';
				} ?>
			</footer> 
		</article>
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