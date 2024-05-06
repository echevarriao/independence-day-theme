<form method="get" action="/">
<table border = "0" style = "border: 0;">
    <tr>
        <td><label><b>Search </b></label> </td>
        <td><?php $args = array(
            'orderby' => 'title',
            'order' => 'desc',
			'show_option_all'    => '-- Choose One --',
			'taxonomy'           => 'risingstar-keyword',
			'walker' => new my_Walker_CategoryDropdown
		);

		wp_dropdown_categories( $args ); ?>
		<script type="text/javascript"><!--
		    var dropdown = document.getElementById("cat");
		    function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value != '0' ) {
					location.href = "<?php echo get_option('home');
		?>/?risingstar-keyword="+dropdown.options[dropdown.selectedIndex].value;
				}
		    }
		    dropdown.onchange = onCatChange;
		--></script> </td>
    </tr>
</table>
</form>
<?php $inf = getProfile(get_the_ID()); ?>
<p><b>Year Inducted / Awarded:</b> <?php print $inf['rising_star_mbyear-inducted']; ?></p>
<p><b>Member Award: </b> <?php print $inf['rising_star_mbaward']; ?></p>
<?php the_content(); ?>
<p><b>Categories | Keywords:</b>
<?php
$terms = get_the_terms( $post->ID , 'risingstar-keyword' );
$output = "";

$separator = ", ";

if($terms){
    
foreach ( $terms as $term ) {

	$output .= '<a href="'.get_category_link($term).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ) . '">'.$term->name.'</a>'.$separator;

}

} else {
    
    $output = "No keywords available";
    
}

print trim($output, $separator);

?></p>

<p><em>Published: <?php print get_the_date(); ?></em></p>
