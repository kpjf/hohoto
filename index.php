<?php get_header(); ?>

	<div id="blog_container">
		<div id="blog" class="content">

			<div class="articles">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="article">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<div class="metadata">
							<?php
								printf(__('<span class="date">%2$s</span>, by <span class="author">%3$s</span>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
							?>
						</div>
				
						<section class="entry-content clearfix">
							<?php if ( is_home() ) { ?>
								<?php the_excerpt(); ?>
							<?php } else { ?>
								<?php the_content(); ?>
							<?php } ?>
							
						</section> <!-- end article section -->
					</div>
				
				<?php endwhile; ?>
				
					<?php if (function_exists('bones_page_navi')) { ?>
							<?php bones_page_navi(); ?>
					<?php } else { ?>
							<nav class="wp-prev-next">
									<ul class="clearfix">
										<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
										<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
									</ul>
							</nav>
					<?php } ?>
				
				<?php else : ?>
				
					<div id="post-not-found" class="article hentry clearfix">
							<header class="article-header">
								<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
						</header>
							<section class="entry-content">
								<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
						</footer>
					</div>
				
				<?php endif; ?>
			</div>


			<?php get_sidebar(); ?>
		</div>
		
	</div>
<?php get_footer(); ?>
