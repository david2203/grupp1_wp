<?php
/* Template Name: Testing */

get_header();
?>

<?php
echo do_shortcode('[smartslider3 slider="4"]');
?>


<?php the_content(); ?>


<?php
echo do_shortcode('[smartslider3 slider="5"]'); //storrea slider
?>




<?php get_footer(); ?>