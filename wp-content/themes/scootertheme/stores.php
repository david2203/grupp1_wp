
<?php 
/* Template Name: Stores */
get_header();
$args = array( 'post_type' => 'store', 'posts_per_page' => 10 );
$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<h2><?php the_title(); ?></h2>
<div class="entry-content">
<?php the_content(); ?> 
</div>
<iframe
  width="600"
  height="450"
  style="border:0"
  loading="lazy"
  allowfullscreen
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC2pHj1ik6_vwmv5X2x_qpRjJEddQhQ7XI
    &q=<?php the_title()?>">
</iframe>
<?php endwhile;
wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php /* gets code from footer.php */ get_footer() ?>