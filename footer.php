		<?php
			$santas = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'santa',
				'order'=>'ASC'
			));

			$mrsclaus = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'mrs-claus',
				'order'=>'ASC'
			));

			$elf = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'elf',
				'order'=>'ASC'
			));

			$reindeer = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'reindeer',
				'order'=>'ASC'
			));

			$snowflake = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'snowflake',
				'order'=>'ASC'
			));

			$gingerbread = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'gingerbread',
				'order'=>'ASC'
			));

			$candycane = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'candycane',
				'order'=>'ASC'
			));

			$inkind = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'in-kind',
				'order'=>'ASC'
			));

			$inkindish = new WP_Query(array(
				'post_type' => 'sponsor', 
				'posts_per_page' => -1, 
				'sponsor_tier' => 'in-kind-2',
				'order'=>'ASC'
			));


		?>
		
		<div id="sponsor_container">
			<div id="sponsors" class="content">
				<h2>Our incredible sponsors</h2>

				<?php if ( count($santas->posts) > 0 ) { ?>
				<h3>Santa</h3>
				<div class="kind_is santa">

					<?php while ( $santas->have_posts() ) { 
						$santas->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
					
				</div>
				<?php } ?>
				
				<?php if ( count($mrsclaus->posts) > 0 ) { ?>
				<h3>Mrs. Claus</h3>
				<div class="kind_is mrsclaus">
					<?php while ( $mrsclaus->have_posts() ) { 
						$mrsclaus->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
				</div>
				<?php } ?>

				
				<?php if ( count($elf->posts) > 0 ) { ?>
				<h3>Elf</h3>
				<div class="kind_is elf">
					<?php while ( $elf->have_posts() ) { 
						$elf->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
				</div>
				<?php } ?>

				<?php if ( count($reindeer->posts) > 0 ) { ?>
				<h3>Reindeer</h3>
				<div class="kind_is reindeer">
					<?php while ( $reindeer->have_posts() ) { 
						$reindeer->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
				</div>
				<?php } ?>
				
				<?php if ( count($snowflake->posts) > 0 ) { ?>
				<h3>Snowflake</h3>
				<div class="kind_is snowflake">
					<?php while ( $snowflake->have_posts() ) { 
						$snowflake->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
				</div>
				<?php } ?>

				<?php if ( count($gingerbread->posts) > 0 ) { ?>
				<h3>Gingerbread</h3>
				<div class="kind_is gingerbread">
					<?php while ( $gingerbread->have_posts() ) { 
						$gingerbread->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?>
					</a><?php } ?>
				</div>
				<?php } ?>

				<?php if ( count($candycane->posts) > 0 ) { ?>
				<h3>Candycane</h3>
				<div class="kind_is candycane">
					<?php while ( $candycane->have_posts() ) { 
						$candycane->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>"><?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?></a>
					<?php } ?>
				</div>
				<?php } ?>

				<h3>In Kind</h3>
				<div class="kind_is in-kind">
					<?php while ( $inkind->have_posts() ) { 
						$inkind->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?></a><?php } ?>
				</div>

				<div class="kind_is in-kind-2">
					<?php while ( $inkindish->have_posts() ) { 
						$inkindish->the_post(); 
						if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
						} else {
							$image = null;
						}
					?><a href="<?php echo get_post_meta( get_the_ID(), 'sponsor_url', true ); ?>">
						<?php
							if ( $image[0] ) {
								echo '<img src="'.$image[0].'" alt="'.get_the_title().'" />';
							}
						?></a><?php } ?>
				</div>
			</div>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <?php // end page. what a ride! ?>
