<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

	<div id="promos">
		<div id="introduction_and_tickets" class="content">
			<div id="introduction">
				<h2>December 11th, 2014</h2>
				<h3>at The Mod Club</h3>

				<p>With over $40,000 raised last year, and more than $300,000 to date, join us again for Toronto’s biggest holiday party in support of the Daily Bread Food Bank.</p>

				<a href="/tickets/" class="button event_details">Event Details</a>
			</div><!--

			--><div id="tickets">
				<a href="/tickets/" class="button buy_tickets">Buy Tickets!</a>
				<a href="/become-a-sponsor/" class="button be_a_sponsor">Become a sponsor</a>
				<a href="/how-can-i-help/ " class="button get_involved">Get involved</a>
			</div>
		</div>

		<div id="news_and_updates" class="content">

			<!--

			Each story box is a link to the article or twitter timeline. Links inside should be stripped as the cause the table-cell to freak out. (Try <a href="#"> inside to see an example)
			
			CSS is representing these blocks as a table to accomodate for same equal height columns				

			-->
			<h2>News &amp; Updates</h2>

			<ul id="stories">
			<?php

			// The Query
			$the_query = new WP_Query( array(
				'posts_per_page' => 2
			) );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
			?>
			<li>

				<h2><?php the_title(); ?></h2>
				<h3><?php echo get_the_time(get_option('date_format')); ?></h3>
				<div class="inner-content"><?php the_excerpt(); ?></div>
			</li>

			<?php
					}
				}
			wp_reset_postdata();
			?>
				<li class="tweets">
					<h2>Latest Tweets <a href="http://twitter.com/hohoto">@hohoto</a></h2>
					<div id="tweets">
						<ul></ul>
					</div>
				</li>
			</ul>
			
		</div>
	</div>

<?php get_footer(); ?>
