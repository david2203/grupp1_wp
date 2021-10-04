<?php  /* gets the code from header.php*/ get_header() ?>

<main class = "blogg">
	<section>
		<div class="container">
			<div class="row">
				<div id="primary" class="col-xs-12 col-md-9">
					<h1>Blogg</h1>

                    
					<?php /* Code for the loop */if (have_posts()) :

						while (have_posts()) : the_post();

					?>
							<article>
								<img src="<?php /* Fetches the thumbnail url for chosen posts */ echo get_the_post_thumbnail_url(); ?>" />
								<a href="<?php /* Fetches the permalink for chosen posts */ the_permalink(); ?>">
									<h1 class="title"><?php /* Fetches the title for chosen posts */ the_title(); ?></h1>
								</a>
								<!-- <ul class="meta">
									<li>
										<i class="fa fa-calendar"></i><?php /* Fetches the edited/released date for chosen posts */ the_date(); ?>
									</li>
									<li>
										<i class="fa fa-user"></i> <?php /* Fetches the author of chosen posts */ the_author_posts_link(); ?>
									</li>

									<li>
										<i class="fa fa-tag"></i> <a href="kategori.html"><?php  /* Fetches the category of chosen posts */ the_category(", "); ?></a>
									</li>
								</ul> -->
								<p><?php /* Fetches an excerpt of the content of chosen posts */ the_content(); ?></p>
									
							</article>

					<?php
                    /* end of loop */
						endwhile;
					else :
                        /* message if there would be no fetchable posts */
						_e('Inga blogginlägg tillgängliga', 'textdomain');
					endif;
					?>

					<nav class="navigation pagination">
						<?php
						global $wp_query;

						$big = 999999999; // need an unlikely integer
                        /* paginatation */
						echo paginate_links(array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total' => $wp_query->max_num_pages,
						));
						?>
					</nav>
				</div>
				
			</div>
		</div>
	</section>
</main>

<?php /* gets code from footer.php */ get_footer() ?>