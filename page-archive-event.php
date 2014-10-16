<?php
/*
Template Name: Archived Event
*/
?>

<?php get_header(); ?>

	<div id="event_container">
					
		<div id="overview_and_features" class="content">

			<div id="overview">
				<ul id="date_and_location">
					<li class="date">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_date.png"/>
						<h2>Thursday, December 19th, 2013</h2>
						<span>7pm - late</span>
					</li><li class="location">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_location.png"/>
						<h2>The Mod Club</h2>
						<span>722 College St</span>
					</li>

				</ul>

				<!-- Ticket Code -->
				<div class="ticket_container">
					<h2>We raised over $40,000 for the Daily Bread Food Bank in 2013 Paragraph: Thanks to everyone for their support. <a href="/tickets/">Join us again this year</a></h2>
				</div>

				
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