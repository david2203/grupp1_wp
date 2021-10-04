<!-- hämtar headern -->
<?php get_header();?>
		<main>
			<section>
				<div class="container">
					<div class="row">
						<div id="primary" class="col-xs-12 col-md-8 col-md-offset-2">
							<div class="searchform-wrap">
							</div>
							<?php
                            /* hanterar sökfunktionen */
                                $s=get_search_query();
                                $args = array(
                                                's' =>$s
                                            );
                                    // The Query
                                $the_query = new WP_Query( $args );
                                if ( $the_query->have_posts() ) {
                                        _e("<h2 style='font-weight:bold;color:#000'>Sökresultat för: ".get_query_var('s')."</h2>");
                                        while ( $the_query->have_posts() ) {
                                        $the_query->the_post();
                                                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                 <?php
        }
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Inga resultat</h2>
        <div class="alert alert-info">
          <p>Tyvärr så hittade vi inget enligt dina sökkriterier. Försök igen med andra ord.</p>
        </div>
<?php } ?>
						
						</div>
					</div>
				</div>
			</section>
		</main>
        <!-- hämtar footer -->
<?get_footer();?>