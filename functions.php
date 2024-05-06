<?php require_once(get_template_directory() . "/inc/site.above.brand.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.brand.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.header.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.header.right-section.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.top.menu.customizer.php"); ?>
<?php // require_once(get_template_directory() . "/inc/site.content.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.wholebody.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.frontpage.body.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.secondarypage.body.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.subfooter.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.footer.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.after.footer.customizer.php"); ?>
<?php require_once(get_template_directory() . "/inc/site.utils-functions.php"); ?>
<?php require_once(get_template_directory() . "/inc/news.widget.php"); ?>
<?php require_once(get_template_directory() . "/inc/news-display.widget.php"); ?>
<?php require_once(get_template_directory() . "/inc/academy-member.profile.php"); ?>
<?php // require_once(get_template_directory() . "/inc/rising-star.profile.php"); ?>
<?php require_once(get_template_directory() . "/inc/rising-star.metabox.php"); ?>
<?php

remove_action('wp_head', 'wp_generator');
// add_filter('use_block_editor_for_post', '__return_false');

add_action('widgets_init', 'register_NewsWidget');
add_action('widgets_init', 'register_NewsDisplayWidget');

function register_NewsWidget(){
    
    register_widget('NewsWidget');
    
}

function register_NewsDisplayWidget(){
    
    register_widget('NewsDisplayWidget');
    
}
/////////////////////////////////
//
////////////////////////////////

// Register Custom Post Type
function risingstar_post_type() {

	$labels = array(
		'name'                  => _x( 'Gold Rising Stars', 'Post Type General Name', 'engineering' ),
		'singular_name'         => _x( 'Gold Rising Star', 'Post Type Singular Name', 'engineering' ),
		'menu_name'             => __( 'Gold Rising Star', 'engineering' ),
		'name_admin_bar'        => __( 'Gold Rising Stars', 'engineering' ),
		'archives'              => __( 'Gold Rising Star Archives', 'engineering' ),
		'attributes'            => __( 'Gold Rising Star Attributes', 'engineering' ),
		'parent_item_colon'     => __( 'Parent Gold Rising Star:', 'engineering' ),
		'all_items'             => __( 'All Gold Rising Stars', 'engineering' ),
		'add_new_item'          => __( 'Add New Gold Rising Star', 'engineering' ),
		'add_new'               => __( 'Add New Gold Rising Star', 'engineering' ),
		'new_item'              => __( 'New Gold Rising Star', 'engineering' ),
		'edit_item'             => __( 'Edit Gold Rising Star', 'engineering' ),
		'update_item'           => __( 'Update Gold Rising Star', 'engineering' ),
		'view_item'             => __( 'View Gold Rising Star', 'engineering' ),
		'view_items'            => __( 'View Gold Rising Stars', 'engineering' ),
		'search_items'          => __( 'Search Gold Rising Stars', 'engineering' ),
		'not_found'             => __( 'Not found', 'engineering' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'engineering' ),
		'featured_image'        => __( 'Featured Image', 'engineering' ),
		'set_featured_image'    => __( 'Set featured image', 'engineering' ),
		'remove_featured_image' => __( 'Remove featured image', 'engineering' ),
		'use_featured_image'    => __( 'Use as featured image', 'engineering' ),
		'insert_into_item'      => __( 'Insert into Gold Rising Star', 'engineering' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Gold Rising Star', 'engineering' ),
		'items_list'            => __( 'Gold Rising Stars list', 'engineering' ),
		'items_list_navigation' => __( 'Gold Rising Stars list navigation', 'engineering' ),
		'filter_items_list'     => __( 'Filter Gold Rising Star list', 'engineering' ),
	);
	$args = array(
		'label'                 => __( 'Gold Rising Star', 'engineering' ),
		'description'           => __( 'Post Type Description', 'engineering' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'risingstar-keyword' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-half',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'rising-star', $args );

}

add_action( 'init', 'risingstar_post_type', 0 );


// Register Custom Taxonomy
function risingstar_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Gold Rising Star Categories', 'Taxonomy General Name', 'engineering' ),
		'singular_name'              => _x( 'Gold Rising Star Category', 'Taxonomy Singular Name', 'engineering' ),
		'menu_name'                  => __( 'Gold Rising Star Categories', 'engineering' ),
		'all_items'                  => __( 'All Categories', 'engineering' ),
		'parent_item'                => __( 'Parent Category', 'engineering' ),
		'parent_item_colon'          => __( 'Parent Category:', 'engineering' ),
		'new_item_name'              => __( 'New Category Name', 'engineering' ),
		'add_new_item'               => __( 'Add Category Item', 'engineering' ),
		'edit_item'                  => __( 'Edit Category', 'engineering' ),
		'update_item'                => __( 'Update Category', 'engineering' ),
		'view_item'                  => __( 'View Category', 'engineering' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'engineering' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'engineering' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'engineering' ),
		'popular_items'              => __( 'Popular Categories', 'engineering' ),
		'search_items'               => __( 'Search Categories', 'engineering' ),
		'not_found'                  => __( 'Not Found', 'engineering' ),
		'no_terms'                   => __( 'No categories', 'engineering' ),
		'items_list'                 => __( 'Categories list', 'engineering' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'engineering' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'risingstar-keyword', array( 'rising-star' ), $args );

}
add_action( 'init', 'risingstar_taxonomy', 0 );


////////////////////////////////

// Register Custom Post Type
function advbrd_post_type() {

	$labels = array(
		'name'                  => _x( 'Advisory Board Members', 'Post Type General Name', 'engineering' ),
		'singular_name'         => _x( 'Advisory Board Member', 'Post Type Singular Name', 'engineering' ),
		'menu_name'             => __( 'Advisory Board Member', 'engineering' ),
		'name_admin_bar'        => __( 'Advisory Board Members', 'engineering' ),
		'archives'              => __( 'Advisory Board Member Archives', 'engineering' ),
		'attributes'            => __( 'Advisory Board Member Attributes', 'engineering' ),
		'parent_item_colon'     => __( 'Parent Advisory Board Member:', 'engineering' ),
		'all_items'             => __( 'All Advisory Board Members', 'engineering' ),
		'add_new_item'          => __( 'Add New Advisory Board Member', 'engineering' ),
		'add_new'               => __( 'Add New Advisory Board Member', 'engineering' ),
		'new_item'              => __( 'New Advisory Board Member', 'engineering' ),
		'edit_item'             => __( 'Edit Advisory Board Member', 'engineering' ),
		'update_item'           => __( 'Update Advisory Board Member', 'engineering' ),
		'view_item'             => __( 'View Advisory Board Member', 'engineering' ),
		'view_items'            => __( 'View Advisory Board Members', 'engineering' ),
		'search_items'          => __( 'Search Advisory Board Members', 'engineering' ),
		'not_found'             => __( 'Not found', 'engineering' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'engineering' ),
		'featured_image'        => __( 'Featured Image', 'engineering' ),
		'set_featured_image'    => __( 'Set featured image', 'engineering' ),
		'remove_featured_image' => __( 'Remove featured image', 'engineering' ),
		'use_featured_image'    => __( 'Use as featured image', 'engineering' ),
		'insert_into_item'      => __( 'Insert into Advisory Board Member', 'engineering' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Advisory Board Member', 'engineering' ),
		'items_list'            => __( 'Advisory Board Members list', 'engineering' ),
		'items_list_navigation' => __( 'Advisory Board Members list navigation', 'engineering' ),
		'filter_items_list'     => __( 'Filter Advisory Board Member list', 'engineering' ),
	);
	$args = array(
		'label'                 => __( 'Advisory Board Member', 'engineering' ),
		'description'           => __( 'Post Type Description', 'engineering' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'advisory-board' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'advisoryboard', $args );

}

add_action( 'init', 'advbrd_post_type', 0 );


// Register Custom Taxonomy
function advisory_board_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Advisory Board Member Categories', 'Taxonomy General Name', 'engineering' ),
		'singular_name'              => _x( 'Advisory Board Member Category', 'Taxonomy Singular Name', 'engineering' ),
		'menu_name'                  => __( 'Advisory Board Member Categories', 'engineering' ),
		'all_items'                  => __( 'All Categories', 'engineering' ),
		'parent_item'                => __( 'Parent Category', 'engineering' ),
		'parent_item_colon'          => __( 'Parent Category:', 'engineering' ),
		'new_item_name'              => __( 'New Category Name', 'engineering' ),
		'add_new_item'               => __( 'Add Category Item', 'engineering' ),
		'edit_item'                  => __( 'Edit Category', 'engineering' ),
		'update_item'                => __( 'Update Category', 'engineering' ),
		'view_item'                  => __( 'View Category', 'engineering' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'engineering' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'engineering' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'engineering' ),
		'popular_items'              => __( 'Popular Categories', 'engineering' ),
		'search_items'               => __( 'Search Categories', 'engineering' ),
		'not_found'                  => __( 'Not Found', 'engineering' ),
		'no_terms'                   => __( 'No categories', 'engineering' ),
		'items_list'                 => __( 'Categories list', 'engineering' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'engineering' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'advisory-board', array( 'advisoryboard' ), $args );

}
add_action( 'init', 'advisory_board_taxonomy', 0 );


/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Rational_Meta_Box {
	private $screens = array(
		'advisoryboard',
	);
	private $fields = array(
		array(
			'id' => 'first-name',
			'label' => 'First Name',
			'type' => 'text',
		),
		array(
			'id' => 'last-name',
			'label' => 'Last Name',
			'type' => 'text',
		),
		array(
			'id' => 'job-title',
			'label' => 'Job Title',
			'type' => 'text',
		),
		array(
			'id' => 'company',
			'label' => 'Company',
			'type' => 'text',
		),
		array(
			'id' => 'profile-image',
			'label' => 'Profile Image',
			'type' => 'media',
		),
	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'admin_footer' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'advisory-board-member-information',
				__( 'Advisory Board Member Information', 'engineering' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 * 
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'advisory_board_member_information_data', 'advisory_board_member_information_nonce' );
		$this->generate_fields( $post );
	}

	/**
	 * Hooks into WordPress' admin_footer function.
	 * Adds scripts for media uploader.
	 */
	public function admin_footer() {
		?><script>
			// https://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.rational-metabox-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$("#"+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'advisory_board_member_information_' . $field['id'], true );
			switch ( $field['type'] ) {
				case 'media':
					$input = sprintf(
						'<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
						$field['id'],
						$field['id'],
						$db_value,
						$field['id'],
						$field['id']
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['advisory_board_member_information_nonce'] ) )
			return $post_id;

		$nonce = $_POST['advisory_board_member_information_nonce'];
		if ( !wp_verify_nonce( $nonce, 'advisory_board_member_information_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'advisory_board_member_information_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'advisory_board_member_information_' . $field['id'], '0' );
			}
		}
	}
}
new Rational_Meta_Box;

////////////////////////////////

add_action('wp_enqueue_scripts', 'load_independence_day_css_js');

function load_independence_day_css_js(){

	// remove jQuery
	//	wp_deregister_script( 'jquery' );
	
	// load default style sheets

	wp_enqueue_style('normalize-style', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('foundation-style', get_template_directory_uri() . '/css/foundation.min.css');
	wp_enqueue_style('site-font-style', get_template_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('site-style', get_stylesheet_uri());
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style('jquery-ui-style', get_template_directory_uri() . '/css/jquery-ui.css');
	wp_enqueue_style('video-popup-style', get_template_directory_uri() . '/css/video.popup.css');
	wp_enqueue_style('app-style', get_template_directory_uri() . '/css/app.css');
	
	// load default js
	
	wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('vendor-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js');
	wp_enqueue_script('video-popup-jQuery', get_template_directory_uri() . '/js/video.popup.js');
	wp_enqueue_script('foundation-jQuery', get_template_directory_uri() . '/js/foundation.min.js');

	
}

function independence_day_widgets_init(){
    
	register_sidebar( array(
		'name'          => __( 'Above Branding Bar', 'independence-day' ),
		'id'            => 'above-brand-bar',
		'description'   => __( 'This widget houses the content above the branding bar', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="title-area-widget %2$s row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Right Title Area', 'independence-day' ),
		'id'            => 'righttitlearea',
		'description'   => __( 'This widget houses the content in the top right of the site title bar', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="title-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Menu Bar Area', 'independence-day' ),
		'id'            => 'menu-bar-area',
		'description'   => __( 'This widget houses the content in the menu bar', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="menu-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    
	register_sidebar( array(
		'name'          => __( 'Front Page Banner Area', 'independence-day' ),
		'id'            => 'bannerarea',
		'description'   => __( 'This widget houses the content in the Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Page Banner Area', 'independence-day' ),
		'id'            => 'secondary-page-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Section 1 Banner Area', 'independence-day' ),
		'id'            => 'about-section-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Section 2 Banner Area', 'independence-day' ),
		'id'            => 'academics-section-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Section 3 Banner Area', 'independence-day' ),
		'id'            => 'innovation-section-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Section 4 Banner Area', 'independence-day' ),
		'id'            => 'engage-section-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Section 5 Banner Area', 'independence-day' ),
		'id'            => 'news-section-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Section 6 Banner Area', 'independence-day' ),
		'id'            => 'section-six-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Section 7 Banner Area', 'independence-day' ),
		'id'            => 'section-seven-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Section 8 Banner Area', 'independence-day' ),
		'id'            => 'section-eight-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Section 9 Banner Area', 'independence-day' ),
		'id'            => 'section-nine-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Section 10 Banner Area', 'independence-day' ),
		'id'            => 'section-ten-bannerarea',
		'description'   => __( 'This widget houses the content in the Secondary Page Banner Area', 'independence-day' ),
		'before_widget' => '<div id="%1$s" class="secondary-page-banner-area-widget %2$s long-row">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Front Page Area', 'independence-day' ),
		'id'            => 'frontpage-area',
		'description'   => __( 'This widget houses the content above the footer bar', 'independence-day' ),
		'before_widget' => '<div id="frontpage-area-%1$s" class="frontpage-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class = "rss-widget-bar"><p><span>',
		'after_title'   => '</p></span></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Left Sidebar Area', 'independence-day' ),
		'id'            => 'left-sidebar-area',
		'description'   => __( 'This widget houses the content to left of content', 'independence-day' ),
		'before_widget' => '<div id="left-sidebar-area-%1$s" class="left-sidebar-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class = "rss-widget-bar"><p><span>',
		'after_title'   => '</p></span></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Subfooter Area', 'independence-day' ),
		'id'            => 'sub-footerarea',
		'description'   => __( 'This widget houses the content above the footer bar', 'independence-day' ),
		'before_widget' => '<div id="sub-footerarea-%1$s" class="sub-footerarea-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class = "subfooter-area-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Area', 'independence-day' ),
		'id'            => 'footerarea',
		'description'   => __( 'This widget houses the content in the footer bar', 'independence-day' ),
		'before_widget' => '<div id="footerarea-%1$s" class="footerarea-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    
	register_sidebar( array(
		'name'          => __( 'Below Footer Area', 'independence-day' ),
		'id'            => 'below-footerarea',
		'description'   => __( 'This widget houses the content below the footer bar', 'independence-day' ),
		'before_widget' => '<div id="below-footerarea-%1$s" class="below-footerarea-area-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	
}

add_action('widgets_init', 'independence_day_widgets_init');

function independence_day_theme_setup(){

    // for thumbnails/featured image

	add_theme_support( 'post-thumbnails' );
    
    // post content types
    
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
    
	// This theme uses wp_nav_menu() in two locations.

	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'independence-day' ),
		'social'  => __( 'Social Links Menu', 'independence-day' ),
        'topmenu' => __( 'Top Menu', 'independence-day'),
        'mainmenu' => __( 'Main Menu', 'independence-day'),
        'leftmenu'=> __('Left Menu', 'independence-day'),
        'rightmenu'=> __('Right Menu', 'independence-day'),
        'subfootermenu'=> __('Sub Bottom Menu', 'independence-day'),
        'footermenu'=> __('Bottom Menu', 'independence-day'),
	) );
   
}

add_action( 'after_setup_theme', 'independence_day_theme_setup' );

// nav walker class for Foundation 5 menus

/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );  

        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;  

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   * 
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}

function featured_image_custom_rss() {

		get_template_part( 'feed', 'rss2' );
}

remove_all_actions( 'do_feed_rss2' );

add_action( 'do_feed_rss2', 'featured_image_custom_rss', 10, 1 );


class YouTubePlaylist{

    public $apikey = null, $playlist = null, $channel = null;
    public $json = null, $displayType = array('list', 'table');
    public $v3_url = "", $iconqual = array('default' => 'default', 'medium' => 'medium', 'high' => 'high', 'standard' => 'standard', 'maxres' => 'maxres', );
    public $iconquality = null;
    
function __construct($channel = null, $playlist = null, $apikey = ""){
    
    $this->apikey = $apikey;
    $this->channel = $channel;
    $this->playlist = $playlist;
    
}    

function setIconQuality($quality = ""){
    
    if($quality != 'default' || $quality != 'medium' || $quality != 'high' || $quality != 'standard' || $quality != 'maxres'){
        
    $this->iconquality = $quality;
        
    }
    
}

function getIconQuality(){
    
    return $this->iconquality;
    
}

function initURL(){
    
    if($this->apikey != "" && $this->playlist != null && $this->channel != ""){

    $this->v3_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" . $this->playlist . "&channelId=" . $this->channel . "&key=" . $this->apikey;

    return true;        
        
    } else {
        
    return false;

    }
    
}

function retrieveData(){
    
    $result = null;
    $ch = null;
    $data = null;
    
    if($this->playlist == "" || $this->apikey == "" || $this->channel == ""){
    
    return -1;
        
    }
    
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $this->v3_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec ($ch);
	$this->json = json_decode($result);
    
    if($this->json){
        
    return true;

    } else {

    return false;        
        
    }
        
}

function setJSON_Data($json_data){
    
    $this->json = $json_data;
    
}

function getJSON_Data(){
    
    return $this->json;
    
}

function getPlaylist(){
    
    return $this->playlist;
    
}

function setPlaylist($pl = null){
    
    $this->playlist = $pl;
    
}

function getChannelID(){
    
    return $this->channel;
    
}

function setChannelID($id = null){
    
    $this->channel = $id;
    
}

function setAPIKey($key = null){
    
    $this->apikey = $key;
    
}
    
function getAPIKey(){
        
    return $this->apikey;        
        
}

}

add_shortcode('show_yt_playlist', 'display_yt_playlist_func');

function display_yt_playlist_func($atts){

    $info = array();
    $output = "";
    $yt = new YouTubePlaylist();
    $json = null;
    $i = 0;
    
    $info = shortcode_atts(array(
        'channel' => '',
        'showtitle' => 'yes', 
        'gkey' => '',
        'googleid' => '',
        'maxvideos' => '4',
        'showdescription' => 'no',
        'target' => '_self',
        'playlist' => '',
        'iconquality' => 'standard',
        'tabletype' => 'horizontal',
        'id' => 'no-id',
        'class' => 'no-class',
        'listtype' => 'htable', 
        ), $atts, 'show_yt_playlist' );
    
    if($info['channel'] == "" || $info['gkey'] == "" || $info['playlist'] == ""){
        
    return "Error: Missing channel, api key or playlist information";    
        
    }
    
    $yt->setAPIKey($info['gkey']);
    $yt->setChannelID($info['channel']);
    $yt->setPlaylist($info['playlist']);
    
    $yt->initURL();

    if($yt->retrieveData()){
    
    $json = $yt->getJSON_Data();

    $info['maxvideos'] = intval($info['maxvideos']);
    
        if($info['listtype'] == "vtable"){

        return show_as_vtable($json, $info);

        } else if($info['listtype'] == "htable"){
            
        return show_as_htable($json, $info);
            
        } else if($info['listtype'] == "list"){
            
        return show_as_foundation_list($json, $info);
    
        } else {
            
        return show_as_vtable($json, $info);
            
        }
    
    } else {
        
    return "No Playlist Information Available";
        
    }
    
}

function show_as_foundation_list($json = null, $info = null){
    
    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<ul id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";

    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<li>\n";
    $output = $output . "<a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p>\n";
    $output = $output . "</li>\n";
            
    }

    $output = $output . "</ul>\n";

    return $output;
    
}

function show_as_htable($json = null, $info = null){

    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<table id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";
    $output = $output . "<tr>\n";
            
    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<td valign = 'top'><a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p></td>\n";
            
    }

    $output = $output . "</tr>\n";
    $output = $output . "</table>\n";

    return $output;
    
}

function show_as_vtable($json = null, $info = null){
    
    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<table id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";
            
    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<tr>\n";
    $output = $output . "<td valign = 'top'><a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p></td>\n";
    $output = $output . "</tr>\n";
            
    }

    $output = $output . "</table>\n";

    return $output;
    
}

function foundation_display_accordion_func($atts = ""){
	
    $info = array();
    $output = "";
    $i = 0;
    
    $info = shortcode_atts(array(
        'category' => '',
        'showtitle' => 'yes', 
        'gkey' => '',
        'googleid' => '',
        'maxvideos' => '4',
        'showdescription' => 'no',
        'target' => '_self',
        'playlist' => '',
        'iconquality' => 'standard',
        'tabletype' => 'horizontal',
        'id' => 'no-id',
        'class' => 'no-class',
        'listtype' => 'htable', 
        ), $atts, 'show_yt_playlist' );
	
}

// Shortcode for displaying content post type
// 

add_shortcode('display_acc', 'display_acc_func');

function display_acc_func($atts){

    $info = array();
    $output = "";
    $i = 0;
    $m_query = null;
    $feat_img_url = "";
    
    $info = shortcode_atts(array(
        
        "posttype" => "post",
        "displayno" => 20,
        "order" => "ASC",

        ), $atts, 'display_acc' );

    $m_query = new WP_Query(array(
        
        "post_type" => $info['posttype'],
        "post_status" => "publish",
        "posts_per_page" => $info['displayno'],
        "orderby" => 'title',
        "order" => $info['order'],
        
    ));
    
    if($m_query->have_posts()){
        
        $output = $output . "<ul class=\"accordion\" data-accordion>\n";
        
        while($m_query->have_posts()){ $m_query->the_post();

        $feat_img_url = get_the_post_thumbnail_url($m_query->post->ID);
        
        $output = $output . "  <li class=\"accordion-navigation\">";
        $output = $output . "  <a href=\"#panel$i\">" . get_the_title() . "</a>\n";
        $output = $output . "  <div id=\"panel$i\" class=\"content\">";
        
        if($feat_img_url != ""){
            
        $output = $output . "<img src = \"" . $feat_img_url . "\" width = \"150\" hspace = \"10\" align = \"left\" />";            

        }

        $output = $output . get_the_content();
        $output = $output . "\n  </div>\n";
        $output = $output . "</li>\n";

        $i = $i + 1;
        
        }
        
        $output = $output . "</ul>\n";
        
        
    } else {
        
        $output = "";
    }
    
    wp_reset_postdata();
    
    return $output;
    
}

// Shortcode for displaying content post type
// 

add_shortcode('display_block_grid', 'display_block_grid_func');

function display_block_grid_func($atts){

    $info = array();
    $output = "";
    $i = 0;
    $m_query = null;
    $feat_img_url = "";
    
    $info = shortcode_atts(array(
        
        "posttype" => "post",
        "displayno" => 20,
        "order" => "ASC",

        ), $atts, 'display_acc' );

    $m_query = new WP_Query(array(
        
        "post_type" => $info['posttype'],
        "post_status" => "publish",
        "posts_per_page" => $info['displayno'],
        "orderby" => 'title',
        "order" => $info['order'],
        
    ));
    
    if($m_query->have_posts()){
        
        $output = $output . "<ul class=\"small-block-grid-1 medium-block-grid-2 large-block-grid-3\">\n";
        
        while($m_query->have_posts()){ $m_query->the_post();

        $feat_img_url = get_the_post_thumbnail_url($m_query->post->ID);
        
        $output = $output . "  <li>";
        $output = $output . "  <a href=\"" . get_the_permalink() . "\">" . get_the_title() . "</a>\n";
        $output = $output . "</li>\n";

        }
        
        $output = $output . "</ul>\n";
        
        
    } else {
        
        $output = "";
    }
    
    wp_reset_postdata();
    
    return $output;
    
}
