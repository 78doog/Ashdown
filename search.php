<?php get_header(); ?>
<section id="content" role="main" class="inner">
    <?php if ( have_posts() ) : ?>
    <header class="header">
        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'ashdown' ), get_search_query() ); ?></h1>
    </header>
    <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>">
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

    <?php endwhile; ?>
    
    <?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
    <nav id="nav-below" class="pagination" role="navigation">
        <?php html5wp_pagination(); ?>
    </nav>
    <?php } ?>
		
    <?php else : ?>
    <article id="post-0" class="post no-results not-found">
        <header class="header">
            <h2 class="entry-title"><?php _e( 'Nothing Found', 'ashdown' ); ?></h2>
        </header>
        <section class="entry-content">
            <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'ashdown' ); ?></p>
            <?php get_search_form(); ?>
        </section>
    </article>
<?php endif; ?>
</section>
<?php get_sidebar(); ?> 
<?php get_footer(); ?> 