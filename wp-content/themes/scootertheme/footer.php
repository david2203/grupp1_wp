<?php wp_footer(); ?>

<footer id="footer">
			<div class="container">
					
					
					<div class="contact">
						<h4>Kontakt</h4>
						<p>Huvudkontoret:</p>
						<p>Västberga Allé 36A, 126 30 Hägersten</p>
						<p>
							Tel: 0123456789<br />
							E-post: <a href="">info@scooterhaven.com</a>
						</p>
						<br />
                        <p> Vardagar: 10:00-18:00</p>
                        <p> Lördagar: 10:00-15:00</p>
						<p> Söndagar: Stängt</p>
					</div>
					<div class="social-media">
						
						<?php
$args = array( 'post_type' => 'Footer', 'posts_per_page' => 10 );
$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) : ?>
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<h4><?php the_title(); ?></h4>
<div class="entry-content">
<?php the_content(); ?> 
</div>

<?php endwhile;
wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


						
					</div>
					<div class="betalmetoder">
							<h4>Betalmetoder</h4>
							<p>Klarna</p>
							<p>Swish</p>
							<p>PayPal</p>
							
					</div>


					<div class="about-us">
						<h4>Om oss</h4>
						<p>
                        Scooter Haven säljer scootrar som är effektiva, miljövänliga och billiga transportmedel. <br />
                        Letandet efter parkeringsplats är ett minne blott. Vägtullar, bilköer, höga bensinkostnader kommer du inte behöva bry dig om. <br />
                        Med en scooter så kommer du alltid ha en låg totalkostnad
                        </p>
					</div>
					
				</div>
				<hr />

				<div class="copyright">
					<div class="">
						<p>Copyright &copy; Grupp 1, Medieinstitutet, inriktning E-handel, 2021</p>
					</div>
			</div>
		</footer>

        </div>

  

</body>
</html>