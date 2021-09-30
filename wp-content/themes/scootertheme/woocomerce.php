<?php
/* Template Name: woocomerce
 */
get_header(); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php woocommerce_content(); ?>

                <div class="col-xs-12 col-sm-6 col-md-4">

                    <h4><?= $stores['title']; ?></h4>

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>