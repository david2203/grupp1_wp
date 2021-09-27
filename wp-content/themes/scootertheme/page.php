<?php get_header(); ?>
<div class="content-wrap ninecol clearfix">
    <div class="row clearfix">
        <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                 <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                 <?php the_content(); ?>

            <?php endwhile; endif; ?>
        </div>
    <div>
</div>
<?php get_footer(); ?>