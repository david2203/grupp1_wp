<?php
/* Template Name: Testing */

get_header();
?>
<div class="col-xs-12 col-sm-6 col-md-4">
						
						<h4><?= $butiker['butik1']; ?></h4>
						
				</div>
<?php
echo do_shortcode('[smartslider3 slider="4"]');
?>

<?php get_footer(); ?>