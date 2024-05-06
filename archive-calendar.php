<?php get_header(); ?>
<?php if(is_front_page()){ ?>
<?php } elseif(is_active_sidebar('about-section-bannerarea')){ ?>
<div id = "page-banner-bar" class = "long-row">
    <div class = "row">
        <div class = "large-12 custom-column">
    <?php dynamic_sidebar('about-section-bannerarea'); ?>
        </div>
    </div>
</div>
<?php } else { ?>
<?php } ?>
<div id = "page-title-bar" class = "long-row">
    <div class = "row">
        <div class = "large-12 column">
            <h2>Academy Member Profile(s)</h2>    
        </div>
    </div>
</div>
<div class = "row" id = "contentsection">
    <div class = "large-12 column">
<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$opts = array('post_type' => 'academy-profile', 'posts_per_page' => '9999999', 'order' => 'asc', 'orderby' => 'title', 'paged' => $paged);

query_posts($opts);

?>
<?php custom_breadcrumbs() ?>
<?php if(have_posts()){ ?>
<?php $theNav = paginate_links(); ?>
<?php echo "<p>$theNav</p>"; ?>

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

<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
<?php while(have_posts()): the_post(); ?>
<?php $profile_inf = getProfile(get_the_ID()); ?>
<li><b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>, awarded in <?php print $profile_inf['member_info_yr_inducted']; ?></li>
<?php endwhile; ?>
</ul>

<?php print paginate_links(); ?>
<?php } else { ?>
<?php get_template_part('content', '404'); ?>
<?php } ?>
    </div>
</div>
<?php get_footer(); ?>