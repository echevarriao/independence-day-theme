<?php


function getProfile($postID){
	
	$inf = array();
	$profile_inf = array();
	
	$inf = get_post_meta($postID);

	if($postID){

	foreach($inf as $key => $value){
		
	$profile_inf[$key] = $value[0];
		
	}
	
	} else {
		
	return null;

	}
	
	return $profile_inf;
	
}

if ( ! function_exists('custom_academy_member_profile_type') ) {

// Register Custom Post Type
function custom_academy_member_profile_type() {

	$labels = array(
		'name'                => _x( 'Academy Member Profiles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Academy Member Profile', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Academy Member Profile', 'text_domain' ),
		'name_admin_bar'      => __( 'Academy Member Profile', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Profile:', 'text_domain' ),
		'all_items'           => __( 'All Profiles', 'text_domain' ),
		'add_new_item'        => __( 'Add New Profile', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Profile', 'text_domain' ),
		'edit_item'           => __( 'Edit Profile', 'text_domain' ),
		'update_item'         => __( 'Update Profile', 'text_domain' ),
		'view_item'           => __( 'View Profile', 'text_domain' ),
		'search_items'        => __( 'Search Profile', 'text_domain' ),
		'not_found'           => __( 'Profile Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Profile Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'post_academy_member_profile', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'          => array( 'academy-keyword', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'academy-profile',
		'capability_type'     => 'post',
	);
	register_post_type( 'academy-profile', $args );
	
    // allow thumbails for posts        
    add_theme_support( 'post-thumbnails' );

}

// Hook into the 'init' action
add_action( 'init', 'custom_academy_member_profile_type', 0 );

}

if ( ! function_exists( 'custom_academy_member_profile_taxonomy' ) ) {

// Register Custom Taxonomy
function custom_academy_member_profile_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Academy Member Profile Keywords', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Academy Member Profile Keyword', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Academy Member Profile Keywords', 'text_domain' ),
		'all_items'                  => __( 'All Keywords', 'text_domain' ),
		'parent_item'                => __( 'Parent Keyword', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Keyword:', 'text_domain' ),
		'new_item_name'              => __( 'New Keyword', 'text_domain' ),
		'add_new_item'               => __( 'Add New Keyword', 'text_domain' ),
		'edit_item'                  => __( 'Edit Keyword', 'text_domain' ),
		'update_item'                => __( 'Update Keyword', 'text_domain' ),
		'view_item'                  => __( 'View Keyword', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove keywords', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Keywords', 'text_domain' ),
		'search_items'               => __( 'Search Keywords', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'rewrite' 					 => array('slug', 'keywords'),
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'academy-keyword',
	);
	register_taxonomy( 'academy-keyword', array( 'academy-profile' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_academy_member_profile_taxonomy', 0 );

}


add_action( 'add_meta_boxes', 'academy_cd_meta_box_add' );

function academy_cd_meta_box_add()
{
//    add_meta_box( 'my-meta-box-id', 'Academy Member Details', 'academy_cd_meta_box_cb', 'academy-profile', 'normal', 'high' );
}

function academy_cd_meta_box_cb( $post )
{


	$academy_year = ((int)date("Y")) + 5;
	
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'post_profile_nonce', 'profile_nonce' );
    
$values = get_post_custom( $post->ID );
	
// var_dump($values);
$member_info_fn = isset( $values['member_info_fn'] ) ? esc_attr( $values['member_info_fn'][0] ) : "";
$member_info_mi = isset( $values['member_info_mi'] ) ? esc_attr( $values['member_info_mi'][0] ) : "";
$member_info_ln = isset( $values['member_info_ln'] ) ? esc_attr( $values['member_info_ln'][0] ) : "";
$member_info_award = isset( $values['member_info_award'] ) ? esc_attr( $values['member_info_award'][0] ) : "";
$member_info_title = isset( $values['member_info_title'] ) ? esc_attr( $values['member_info_title'][0] ) : "";
$member_info_yr_inducted = isset( $values['member_info_yr_inducted'] ) ? esc_attr( $values['member_info_yr_inducted'][0] ) : "";
$member_info_notes = isset( $values['member_info_notes'] ) ? esc_attr( $values['member_info_notes'][0] ) : "";


?>

<table width = "100%">
	<tr>
		<td>
			<p>
				<label for="facultyinfo-fn">First Name</label>
			</p>
		</td>
		<td>
			<input type = "text" name = "member_info_fn" value = "<?php echo $member_info_fn ?>" id = "member_info_fn"/>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-mi">M.I.</label>
			</p>
		</td>
		<td>
			<input type = "text" name = "member_info_mi" value = "<?php echo $member_info_mi ?>" id = "member_info_mi"/>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-ln">Last Name</label>
			</p>
		</td>
		<td>
			<input type = "text" name = "member_info_ln" value = "<?php echo $member_info_ln ?>" id = "member_info_ln"/>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-ln">Title</label>
			</p>
		</td>
		<td>
			<input type = "text" name = "member_info_title" value = "<?php echo $member_info_title ?>" id = "member_info_ln"/>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-ln">Award</label>
			</p>
		</td>
		<td>
			<select name = "member_info_award" id = "member_info_award">
			<option value = "Academy of Distinguished Engineers" <?php selected($member_info_award, "Academy of Distinguished Engineers"); ?>>Academy of Distinguished Engineers</option>
			<option value = "Distinguished Engineering Alumni" <?php selected($member_info_award, "Distinguished Engineering Alumni"); ?>>Distinguished Engineering Alumni</option>
			<option value = "Distinguished Service Award" <?php selected($member_info_award, "Distinguished Service Award"); ?>>Distinguished Service Award</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-dpt">Year Inducted</label>
			</p>
		</td>
		<td>
			<select name = "member_info_yr_inducted" id = "member_info_yr_inducted">
<?php for($i = $academy_year; $i > 1980; $i--){ ?>
				<option value = "<?php print $i; ?>" <?php selected($member_info_yr_inducted, $i); ?>><?php print $i; ?></option>
<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<p>
				<label for="facultyinfo-ln">Profiles Notes<br />(not displayed)</label>
			</p>
		</td>
		<td>
			<textarea style = "width: 100%;height: 100px;" id = "member_info_notes" name = "member_info_notes"><?php print $member_info_notes; ?></textarea>
		</td>
	</tr>
</table>	
    <?php        
}

add_action( 'save_post', 'academy_cd_meta_box_save' );

function academy_cd_meta_box_save( $post_id )
{
	
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['profile_nonce'] ) || !wp_verify_nonce( $_POST['profile_nonce'], 'post_profile_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array();

    if( isset( $_POST['member_info_fn'] ) ){
        update_post_meta( $post_id, 'member_info_fn', esc_attr( $_POST['member_info_fn'], $allowed ) );
    }
    if( isset( $_POST['member_info_mi'] ) ){
        update_post_meta( $post_id, 'member_info_mi', esc_attr( $_POST['member_info_mi'], $allowed ) );
    }
    if( isset( $_POST['member_info_ln'] ) ){
        update_post_meta( $post_id, 'member_info_ln', esc_attr( $_POST['member_info_ln'], $allowed ) );
    }
    if( isset( $_POST['member_info_title'] ) ){
        update_post_meta( $post_id, 'member_info_title', esc_attr( $_POST['member_info_title'], $allowed ) );
    }
    if( isset( $_POST['member_info_award'] ) ){
        update_post_meta( $post_id, 'member_info_award', esc_attr( $_POST['member_info_award'], $allowed ) );
    }
    if( isset( $_POST['member_info_yr_inducted'] ) ){
        update_post_meta( $post_id, 'member_info_yr_inducted', esc_attr( $_POST['member_info_yr_inducted'], $allowed ) );
    }
    if( isset( $_POST['member_info_notes'] ) ){
        update_post_meta( $post_id, 'member_info_notes', esc_attr( $_POST['member_info_notes'], $allowed ) );
    }
	
//	var_dump($_POST);
    
}


class my_Walker_CategoryDropdown extends Walker_CategoryDropdown {


	function start_el(&$output, $category, $depth, $args) {
		$pad = str_repeat(' ', $depth * 3);

		$cat_name = apply_filters('list_cats', $category->name, $category);
		$output .= "\t<option class=\"level-$depth\" value=\"".$category->slug."\"";
		if ( $category->term_id == $args['selected'] )
			$output .= ' selected="selected"';
		$output .= '>';
		$output .= $pad.$cat_name;
		if ( $args['show_count'] )
			$output .= '  ('. $category->count .')';
		if ( $args['show_last_update'] ) {
			$format = 'Y-m-d';
			$output .= '  ' . gmdate($format, $category->last_update_timestamp);
		}
		$output .= "</option>\n";
	}
}

/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 * 
 * Retrieving the values:
 * First Name = get_post_meta( get_the_ID(), 'academy_member_details_first-name', true )
 * Middle Name Name = get_post_meta( get_the_ID(), 'academy_member_details_middle-name-name', true )
 * Last Name = get_post_meta( get_the_ID(), 'academy_member_details_last-name', true )
 * Title = get_post_meta( get_the_ID(), 'academy_member_details_title', true )
 * Award = get_post_meta( get_the_ID(), 'academy_member_details_award', true )
 * Year Inducted = get_post_meta( get_the_ID(), 'academy_member_details_year-inducted', true )
 * Profile Notes = get_post_meta( get_the_ID(), 'academy_member_details_profile-notes', true )
 */
class Academy_Member_Details {
	private $config = '{"title":"Academy Member Details","prefix":"academy_member_details_","domain":"academy-member-details","class_name":"Academy_Member_Details","post-type":["post"],"context":"normal","priority":"high","cpt":"academy-profile","fields":[{"type":"text","label":"First Name","id":"member_info_fn"},{"type":"text","label":"Middle Name Name","id":"member_info_mi"},{"type":"text","label":"Last Name","id":"member_info_ln"},{"type":"text","label":"Title","id":"member_info_title"},{"type":"select","label":"Award","options":"academy-engrs : Academy of Distinguished Engineers\r\ndistinguishedalumni : Distinguished Engineering Alumni\r\ndistinguised-svc-award : Distinguished Service Award","id":"member_info_award"},{"type":"select","label":"Year Inducted","options":"1945 : 1945\r\n1946 : 1946\r\n1947 : 1947\r\n1948 : 1948\r\n1949 : 1949\r\n1950 : 1950\r\n1951 : 1951\r\n1952 : 1952\r\n1953 : 1953\r\n1954 : 1954\r\n1955 : 1955\r\n1956 : 1956\r\n1957 : 1957\r\n1958 : 1958\r\n1959 : 1959\r\n1960 : 1960\r\n1961 : 1961\r\n1962 : 1962\r\n1963 : 1963\r\n1964 : 1964\r\n1965 : 1965\r\n1966 : 1966\r\n1967 : 1967\r\n1968 : 1968\r\n1969 : 1969\r\n1970 : 1970\r\n1971 : 1971\r\n1972 : 1972\r\n1973 : 1973\r\n1974 : 1974\r\n1975 : 1975\r\n1976 : 1976\r\n1977 : 1977\r\n1978 : 1978\r\n1979 : 1979\r\n1980 : 1980\r\n1981 : 1981\r\n1982 : 1982\r\n1983 : 1983\r\n1984 : 1984\r\n1985 : 1985\r\n1986 : 1986\r\n1987 : 1987\r\n1988 : 1988\r\n1989 : 1989\r\n1990 : 1990\r\n1991 : 1991\r\n1992 : 1992\r\n1993 : 1993\r\n1994 : 1994\r\n1995 : 1995\r\n1996 : 1996\r\n1997 : 1997\r\n1998 : 1998\r\n1999 : 1999\r\n2000 : 2000\r\n2001 : 2001\r\n2002 : 2002\r\n2003 : 2003\r\n2004 : 2004\r\n2005 : 2005\r\n2006 : 2006\r\n2007 : 2007\r\n2008 : 2008\r\n2009 : 2009\r\n2010 : 2010\r\n2011 : 2011\r\n2012 : 2012\r\n2013 : 2013\r\n2014 : 2014\r\n2015 : 2015\r\n2016 : 2016\r\n2017 : 2017\r\n2018 : 2018\r\n2019 : 2019\r\n2020 : 2020\r\n2021 : 2021\r\n2022 : 2022\r\n2023 : 2023\r\n2024 : 2024\r\n2025 : 2025\r\n2026 : 2026\r\n2027 : 2027\r\n2028 : 2028\r\n2029 : 2029\r\n2030 : 2030","id":"member_info_yr_inducted"},{"type":"textarea","label":"Profile Notes","id":"member_info_notes"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_text_field( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		$this->fields_table();
	}

	private function fields_table() {
		?><table class="form-table" role="presentation">
			<tbody><?php
				foreach ( $this->config['fields'] as $field ) {
					?><tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'select':
				$this->select( $field );
				break;
			case 'textarea':
				$this->textarea( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : '',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function select( $field ) {
		printf(
			'<select id="%s" name="%s">%s</select>',
			$field['id'], $field['id'],
			$this->select_options( $field )
		);
	}

	private function select_selected( $field, $current ) {
		$value = $this->value( $field );
		if ( $value === $current ) {
			return 'selected';
		}
		return '';
	}

	private function select_options( $field ) {
		$output = [];
		$options = explode( "\r\n", $field['options'] );
		$i = 0;
		foreach ( $options as $option ) {
			$pair = explode( ':', $option );
			$pair = array_map( 'trim', $pair );
			$output[] = sprintf(
				'<option %s value="%s"> %s</option>',
				$this->select_selected( $field, $pair[0] ),
				$pair[0], $pair[1]
			);
			$i++;
		}
		return implode( '<br>', $output );
	}

	private function textarea( $field ) {
		printf(
			'<textarea class="regular-text" id="%s" name="%s" rows="%d">%s</textarea>',
			$field['id'], $field['id'],
			isset( $field['rows'] ) ? $field['rows'] : 5,
			$this->value( $field )
		);
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new Academy_Member_Details;