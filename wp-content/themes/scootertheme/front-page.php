<?php
/* Template Name: Testing */

get_header();
?>

<div class = "main">
<div class = "primary">
<?php
echo do_shortcode('[smartslider3 slider="4"]');
?>


<?php the_content(); ?>


<?php
echo do_shortcode('[smartslider3 slider="5"]'); //storrea slider
?>



</div>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
<?php endif; ?>
</div>

<?php get_footer(); ?>