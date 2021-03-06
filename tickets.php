<?php
/*
Template Name: Tickets Page
*/
?>

<?php get_header(); ?>

	<div id="event_container">
					
		<div id="overview_and_features" class="content">

			<div id="overview">
				<ul id="date_and_location">
					<li class="date">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_date.png"/>
						<h2>Thursday, December 19th</h2>
						<span>7pm - late</span>
					</li><li class="location">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_location.png"/>
						<h2>The Mod Club</h2>
						<span>722 College St</span>
					</li>

				</ul>

				<!-- Ticket Code -->
				<div class="ticket_container">

					<h2><img src="<?php echo get_template_directory_uri(); ?>/library/images/icons/icon_ticket.png"/>General Admission Tickets</h2>
					<a href="https://www.uniiverse.com/listings/hohoto-2014-supporting-the-daily-bread-food-bank-tickets-toronto-LKY03" class="button">Buy Tickets</a>

					 <ul class="tickets">
					 	<li>
					 		<ol>
						 		<li class="price">$35</li>
						 		<li class="details">
									<span>SUPER Early-bird admission</span>
								</li>
							</ol>
						</li>
					 	<li>
					 		<ol>
						 		<li class="price">$40</li>
						 		<li class="details">
									<span>Early-bird admission</span>
								</li>
							</ol>
						</li>
					 	<li>
					 		<ol>
						 		<li class="price">$45</li>
						 		<li class="details">
									<span>Regular admission</span>
								</li>
							</ol>
						</li>
					</ul>

				</div>
				<div class="ticket_container">

					<h2><img src="<?php echo get_template_directory_uri(); ?>/library/images/icons/icon_ticket.png"/>Group Tickets</h2>
					<a href="https://www.uniiverse.com/listings/hohoto-2014-supporting-the-daily-bread-food-bank-tickets-toronto-LKY03" class="button">Buy Group Tickets</a>

					 <ul class="tickets">
					 	<li>
					 		<ol>
						 		<li class="price">$35</li>
						 		<li class="details">
									<span>Regular admissions. <br>For groups of 5 or more.</span>
								</li>
							</ol>
						</li>
					</ul>

				</div>
				<div class="ticket_container">

					<h2><img src="<?php echo get_template_directory_uri(); ?>/library/images/icons/icon_ticket.png"/>Student Tickets</h2>
					<a href="https://www.uniiverse.com/listings/hohoto-2014-supporting-the-daily-bread-food-bank-tickets-toronto-LKY03" class="button">Buy Student Tickets</a>

					 <ul class="tickets">
					 	<li>
					 		<ol>
						 		<li class="price">$25</li>
						 		<li class="details">
									<span>Regular admission. <br> For students and recent graduates.</span>
								</li>
							</ol>
						</li>
					</ul>

				</div>

				<div class="raffle_container">

					 <h2><img src="<?php echo get_template_directory_uri(); ?>/library/images/icons/icon_raffle.png"/>Raffle Ticket Pre-order*</h2>
					 <a href="https://www.uniiverse.com/listings/hohoto-2014-supporting-the-daily-bread-food-bank-tickets-toronto-LKY03" class="button">Add Raffle Tickets</a>

					 <ul class="tickets">

					 	<li>
					 		<ol>
						 		<li class="price">$20</li>
						 		<li class="details">
									<span>20 tickets</span>
								</li>
							</ol>
						</li>
						<li>
							<ol>
								<li class="price">$100</li>
						 		<li class="details">
									<span>150 tickets</span>
								</li>
								</li>
							</ol>
						</li>
					</ul>

					 <span class="fine_print">*does not include admission.</span>
				</div>

				<div class="sponsor_container">

					 <h2><img src="<?php echo get_template_directory_uri(); ?>/library/images/icons/icon_sponsor.png"/>Sponsorship</h2>
					 <a href="/become-a-sponsor" class="button">Become a sponsor</a>

				</div>

				<h2>Holiday Party Central</h2>
				<p>Party with 600 of your favourite startup, tech, social media, and design friends.</p>
				
				<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/logo_dbfb.png" id="img_logo_dbfb" />
				<h2>In support of the Daily Bread Food Bank</h2>
				<p>100% of proceeds go directly to the food bank.</p>

				<h3>Featuring</h3>
				<ul id="featuring">
					<li>Massive main floor dance floor and bar</li><li>
					Exclusive main room VIP bar for big givers.</li><li>
					Raffle and conversation room upstairs</li>
				</ul>

			</div><div id="features">
				
				<ul id="activities">
					<li>
						<h3>Raffle</h3>
						<p>Try your luck at the raffle for some great sports, tech, reading, foodie, and other prizes.</p>
					</li><li>
						<h3>Photo Booth</h3>
						<p>Give a little, play a lot with the prop-infested photo booth.</p>
					</li>
				</ul>
				<h3>Entertainment</h3>
				<?php
					$entertainment = new WP_Query(array(
						'post_type' => 'sponsor', 
						'posts_per_page' => -1, 
						'sponsor_tier' => 'entertainment',
						'sponsor_year' => '2014',
						'order'=>'ASC'
					));
				?>
				<ul id="entertainment">
					<?php
						while ( $entertainment->have_posts() ) : $entertainment->the_post();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
							$url = get_post_meta( get_the_ID(), 'sponsor_url', true );
					?>
						<li>

						<a href="<?php echo $url; ?>"><img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(); ?>" /></a><!--
						--><h4><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h4><!--
						--><span><?php echo get_the_excerpt(); ?></span>
					</li>
					<?php endwhile; ?> 
				</ul>

			</div>


		</div>
		
	</div>

	<div id="connect_and_share" class="content">

		<div id="stay_connected">
			<h2>Stay connected</h2>
			<p>Join our mailing list to stay up to date on event comings and going.</p>

			<form action="http://hohoto.us6.list-manage2.com/subscribe/post?u=67a33ff465a0ef22fdc2184b8&amp;id=076c32d755" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your email address" />

				<input type="submit" name="subscribe" id="mc-embedded-subscribe" value="Join"/>

				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>
			</form>

		</div><!--

		--><div id="share">
			<h2>Get Social</h2>
			<p>Connect with HoHoTO on your favourite social network.</p>
			<a href="https://www.facebook.com/HoHoTO" class="share facebook"><img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_facebook.png"/></a><!--
			--><a href="http://twitter.com/hohoto" class="share twitter"><img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_twitter.png"/></a>
		</div>
	</div>

<?php get_footer(); ?>