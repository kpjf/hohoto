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
						<span>8pm - late</span>
					</li><li class="location">
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_location.png"/>
						<h2>The Mod Club</h2>
						<span>722 College St</span>
					</li>

				</ul>

				<div id="eventbrite_iframe">

					Placeholder for Ticket Widget

				</div>

				<h2>Holiday Party Central</h2>
				<p>Party with 600 of your favourite startup, tech, social media, and design friends.</p>
				
				<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/logo_dbfb.png" id="img_logo_dbfb" />
				<h2>In support of the Daily Bread Food Bank</h2>
				<p>100% of proceeds go directly to the food bank.</p>

				<h3>Featuring</h3>
				<ul id="featuring">
					<li>Massive main floor dance floor and bar</li><li>
					Exclusive main room bar for big givers</li><li>
					Raffle and conversation room upstairs</li>
				</ul>

			</div><div id="features">
				
				<ul id="activities">
					<li>
						<h3>Benefit Raffle</h3>
						<p>Try your luck at the benefit raffle for some great sports, tech, reading, foodie, and other prizes.</p>
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
					?>
						<li>
						<img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/hold_headshot.png"/><!--
						--><h4><?php the_title(); ?></h4><!--
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

			<form>
				<input type="text" name="email_address" placeholder="Your email address" />
				<input type="submit" value="Join"/>
			</form>

		</div><!--

		--><div id="share">
			<h2>Tell your friends</h2>
			<p>Share HoHoTO with everyone you care about.</p>

			<a href="#" class="share facebook"><img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_facebook.png"/></a><!--
			--><a href="#" class="share twitter"><img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_twitter.png"/></a><!--
			--><a href="#" class="share google"><img alt="" src="<?php echo get_template_directory_uri(); ?>/library/images/icon_google.png"/></a>
		</div>
	</div>

<?php get_footer(); ?>