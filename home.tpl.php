<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

	<div id="promos">
		<div id="introduction_and_tickets" class="content">
			<div id="introduction">
				<h2>December 19th, 2013</h2>
				<h3>at The Mod Club</h3>

				<p>Join us for Toronto’s biggest holiday party, in support of the Daily Bread Food Bank.</p>

				<a href="#" class="button event_details">Event Details</a>
			</div><!--

			--><div id="tickets">
				<a href="/tickets/" class="button buy_tickets">Buy Tickets!</a>
				<a href="#" class="button be_a_sponsor">Become a sponsor</a>
				<a href="#" class="button get_involved">Get involved</a>
			</div>
		</div>

		<div id="news_and_updates" class="content">

			<!--

			Each story box is a link to the article or twitter timeline. Links inside should be stripped as the cause the table-cell to freak out. (Try <a href="#"> inside to see an example)
			
			CSS is representing these blocks as a table to accomodate for same equal height columns				

			-->
			<h2>News &amp; Updates</h2>

			<ul id="stories">
				<li>
					<h2>Article 1 Title</h2>
					<h3>Nov 1, 2013</h3>
					<div class="inner-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, accusamus, ducimus incidunt tempore dolore molestias possimus fugit iure a nam.</div>
				</li>
				<li>
					<h2>Article 2 Title</h2>
					<h3>Oct 25, 2013</h3>
					<div class="inner-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, accusamus, ducimus incidunt tempore dolore molestias possimus fugit iure a nam.</div>
				</li>
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
