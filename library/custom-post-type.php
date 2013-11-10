<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function sponsors_setup () { 
	// creating (registering) the custom type 
	register_post_type( 'sponsor', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Sponsors', 'bonestheme'), /* This is the Title of the Group */
				'singular_name' => __('Sponsor', 'bonestheme'), /* This is the individual type */
				'all_items' => __('All Sponsors', 'bonestheme'), /* the all items menu item */
				'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
				'add_new_item' => __('Add New Sponsor', 'bonestheme'), /* Add New Display Title */
				'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
				'edit_item' => __('Edit Sponsor', 'bonestheme'), /* Edit Display Title */
				'new_item' => __('New Sponsor', 'bonestheme'), /* New Display Title */
				'view_item' => __('View Sponsor', 'bonestheme'), /* View Display Title */
				'search_items' => __('Search Sponsors', 'bonestheme'), /* Search Custom Type Title */ 
				'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Sponsor custom type.', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/brew-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'sponsors', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'sponsors', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'brew');
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'brew');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'sponsors_setup');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'brew_cat', 
		array('sponsor'), /* if you change the name of register_post_type( 'brew', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */             
			'labels' => array(
				'name' => __( 'Availability', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Sponsor Availability', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search availability', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All availability options', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Availability Option', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Availability Option', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Availability option', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Availability Option', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'tier' ),
		)
	);   
	
	add_action( 'admin_init', 'admin_init' );
	function admin_init () {
		wp_enqueue_style( 'custom-type-brew-styles', get_stylesheet_directory_uri() . '/library/css/custom-type-brew.css', array(), '', 'all' );
		wp_enqueue_script( 'custom-type-brew-script', get_stylesheet_directory_uri() . '/library/js/custom-type-brew.js', array(), '', true );

		add_meta_box("sponsor_info", "Sponsor Information", "render_sponsor_info", "sponsor", "side", "default");
	}

	add_action( 'save_post', 'save_sponsor_info' );
	function save_sponsor_info ( $post_id ) {
		// Check if our nonce is set.
		if ( ! isset( $_POST['sponsor_info_nonce'] ) )
			return $post_id;

		$nonce = $_POST['sponsor_info_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'sponsor_info' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, its safe for us to save the data now. */

		// echo $post_id.'-----';
		// var_dump( $_POST['brew_info'] );
		// Sanitize the user input.
		// $mydata = sanitize_text_field( $_POST['brew_info'] );

		$data = array();
		$brewInformation = isset($_POST['sponsor_info']) ? $_POST['sponsor_info'] : array();

		foreach($brewInformation as $key=>$val) {
			$data[$key] = $val;
		}

		// print_r( $brewInformation );

		// print_r( $imageData );

		// Update the meta field.
		update_post_meta( $post_id, 'sponsor_info', $data );
	}


	function render_sponsor_info ( $post ) { 
		wp_nonce_field( 'sponsor_info', 'sponsor_info_nonce' );
		$collection = get_post_meta( $post->ID, 'sponsor_info', true );

		
	?>

		<div id="brew-info-brew-banner" class="field field-image">
			<div class="banner-preview">

			<?php 
				if ( isset( $collection['brew_banner'] ) && !empty($collection['brew_banner']) ) {	
					$src = wp_get_attachment_image_src( $collection['brew_banner'], 'full' );
			?>
			<img src="<?php echo $src[0]; ?>" />
			<a class="remove close media-modal-icon" href="#" title="Remove"></a>
			<input type="hidden" name="brew_info[brew_banner]" value="<?php echo $collection['brew_banner']; ?>" />

			<?php } ?>
				
			</div>
			<p class="label">
				<input type="button" class="button add-image" value="Add Image" />
				<label for="brew_info_brew_number"><span class="desc">Banner Image</span> <span class="required">*</span></label>
			</p>
		</div>

		<div id="brew-info-brew-number" class="field field_type-text">
			<p class="label">
				<label for="brew_info_brew_number">Brew No. <span class="desc">( Brew Number )</span> <span class="required">*</span></label>
			</p>
			<div>
				<input id="brew_info_brew_number" type="text" value="<?php echo isset($collection['brew_number'])?$collection['brew_number']:null; ?>" name="brew_info[brew_number]" placeholder="">
			</div>
		</div>

		<div id="" class="field field_type-text">
			<p class="label">
				<label for="brew_info_brew_abr">ABV <span class="desc">( Alcohol By Volume )</span> <span class="required">*</span></label>
			</p>
			<div>
				<input id="brew_info_brew_abr" type="text" value="<?php echo isset($collection['abv']) ? $collection['abv']: null; ?>" name="brew_info[abv]" placeholder="">
			</div>
		</div>

		<div id="" class="field field_type-text">
			<p class="label">
				<label for="brew_info_brew_ibu">IBU <span class="desc">( International Bitterness Units )</span> <span class="required">*</span></label>
			</p>
			<div>
				<input id="brew_info_brew_ibu" type="text" value="<?php echo isset($collection['ibu']) ? $collection['ibu'] : null; ?>" name="brew_info[ibu]" placeholder="IBU">
			</div>
		</div>

		<div id="" class="field field_type-text">
			<p class="label">
				<label for="brew_info_untappd_id">Untappd ID <span class="desc">( Untappd Product ID )</span> <span class="required">*</span></label>
			</p>
			<div>
				<input id="brew_info_untappd_id" type="text" value="<?php echo isset($collection['ut_id']) ? $collection['ut_id'] : null; ?>" name="brew_info[ut_id]" placeholder="Untappd ID">
			</div>
		</div>

		
		<?php
			
	}