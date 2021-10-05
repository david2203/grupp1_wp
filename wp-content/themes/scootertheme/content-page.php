<?php

/**
 * Template som används för att visa data i search.php
 */
?>

<div id="primary" class="col-xs-12 col-md-9">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
        <a href="<?php the_permalink(); ?>">
            <h1 class="title"><?php the_title(); ?></h1>
        </a>
        <ul class="meta">
            <li>
                <i class="fa fa-calendar"></i><?php the_date(); ?>
            </li>
            <li>
                <i class="fa fa-user"></i><?php the_author_posts_link(); ?>
            </li>

            <li>
                <i class="fa fa-tag"></i><a href="kategori.html"><?php the_category(); ?></a>
            </li>
        </ul>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'shape'), 'after' => '</div>')); ?>
            <?php edit_post_link(__('Edit', 'shape'), '<span class="edit-link">', '</span>'); ?>
        </div>
    </article>
</div>