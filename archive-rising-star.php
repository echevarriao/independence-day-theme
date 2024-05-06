<?php get_header(); ?>
<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$opts = array('post_type' => 'rising-star', 'posts_per_page' => '9999999', 'order' => 'asc', 'orderby' => 'title', 'paged' => $paged);

query_posts($opts);

?>
<?php if(have_posts()){ ?>
<?php $theNav = paginate_links(); ?>
<?php echo "<p>$theNav</p>"; ?>

<form method="get" action="/">
<!--
	
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
		<script type="text/javascript">
		    var dropdown = document.getElementById("cat");
		    function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value != '0' ) {
					location.href = "<?php echo get_option('home');
		?>/?academy-keyword="+dropdown.options[dropdown.selectedIndex].value;
				}
		    }
		    dropdown.onchange = onCatChange;
		</script> </td>
    </tr>
</table>
-->
</form>
<h2 class = "content-title">
	GOLD Rising Star Award
</h2>
<p>The GOLD Rising Star Award recognizes graduates of the last decade (GOLD) alumni who inspire the world around them through their contributions to the field of engineering and/or the greater society while balancing the demands of being a recent graduate.</p>

<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
<?php while(have_posts()): the_post(); ?>
<?php $profile_inf = getProfile(get_the_ID()); ?>
<li><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>, <?php print $profile_inf['member_info_yr_inducted']; ?></li>
<?php endwhile; ?>
</ul>

<?php print paginate_links(); ?>
<?php } else { ?>
<?php get_template_part('content', '404'); ?>
<?php } ?>
<?php get_footer(); ?>
