<?php get_header(); ?>
<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$opts = array('post_type' => 'advisoryboard', 'posts_per_page' => '9999999', 'order' => 'asc', 'orderby' => 'title', 'paged' => $paged);

query_posts($opts);

?>
<?php if(have_posts()){ ?>
<?php $theNav = paginate_links(); ?>
<?php echo "<p>$theNav</p>"; ?>

<p>The School of Engineering has an active, engaged, and diverse advisory board representing industry, government, alumni, and higher education. The board meets as a group twice a year, but sub-groups may meet more often to provide timely input on issues of importance to the school. Members are also contacted by the dean when guidance or support is needed. Members are appointed for renewable three-year terms.</p>

<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
<?php while(have_posts()): the_post(); ?>
<li>
	<b>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</b>
	<br />
	<span><?php print get_post_meta(get_the_ID(), 'advisory_board_member_information_job-title', true); ?> </span>
</li>
<?php endwhile; ?>
</ul>

<?php print paginate_links(); ?>
<?php } else { ?>
<?php get_template_part('content', '404'); ?>
<?php } ?>
<?php get_footer(); ?>
