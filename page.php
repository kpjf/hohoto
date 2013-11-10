<?php get_header(); ?>

	<div id="blog_container">
		<div class="content" id="blog">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="articles"><div class="article" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					
						<header class="article-header">
					
							<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>							
					
						</header> <?php // end article header ?>
					
						<section class="entry-content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
						</section> <?php // end article section ?>
					
						
					
					</div> <?php // end article ?></div>

				<?php get_sidebar(); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<div id="post-not-found" class="article hentry clearfix">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
						</footer>
				</div>

			<?php endif; ?>
		</div>
	</div>

			

<?php get_footer(); ?>
