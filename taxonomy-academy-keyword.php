<?php get_header(); ?>
<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts($query_string . "&post_type=academy-profile&posts_per_page=999999&orderby=title&order=asc&paged=$paged");

?>

<form method="get" action="/">
<table border = "0" style = "border: 0;">
    <tr>
        <td><label><b>Search </b></label> </td>
        <td><?php $args = array(
            'orderby' => 'title',
            'order' => 'desc',
			'show_option_all'    => '-- Choose One --',
			'taxonomy'           => 'academy-keyword',
			'walker' => new my_Walker_CategoryDropdown
		);

		wp_dropdown_categories( $args ); ?>
		<script type="text/javascript"><!--
		    var dropdown = document.getElementById("cat");
		    function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value != '0' ) {
					location.href = "<?php echo get_option('home');
		?>/?academy-keyword="+dropdown.options[dropdown.selectedIndex].value;
				}
		    }
		    dropdown.onchange = onCatChange;
		--></script> </td>
    </tr>
</table>
</form>

<?php if(have_posts()){ ?>
<?php

$theNav = paginate_links();

print $theNav;

?>
<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
<?php while(have_posts()): the_post(); ?>
<?php $profile_inf = getProfile(get_the_ID()); ?>
<li><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>, awarded in <?php print $profile_inf['member_info_yr_inducted']; ?></li>
<?php endwhile; ?>
</ul>

    </div>

<?php print $theNav; ?>
<?php   } else { ?>

<?php get_template_part('content', '404'); ?>

<?php   } ?>
<?php get_footer(); ?>