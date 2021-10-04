<?php
/**
 * Här visas alla sökresultat.
 *
 */
 
get_header(); ?>
<main>
    <section>
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-8 col-md-offset-2">
 
            <?php if ( have_posts() ) : ?>
 
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header><!-- .page-header -->
 
                
 
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content-page', 'search' ); ?>
 
                <?php endwhile; ?>
 
                
 
            <?php else : ?>
 
                <?php get_template_part( 'no-results', 'search' ); ?>
 
            <?php endif; ?>
 
                </div><!-- #content .site-content -->
            </div>
        </div>
    </section><!-- #primary .content-area -->
</main>
<?php get_footer(); ?>