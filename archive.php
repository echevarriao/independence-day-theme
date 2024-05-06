<?php get_header(); ?>
<div class = "row" id = "contentsection">
    <div class = "large-12 column" id = "content-box">
<h2 class = "content-title">
    <?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'eversource' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'eversource' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'eversource' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'eversource' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'eversource' ) ) . '</span>' );
					else :
						_e( 'Archive Type Not Available', 'eversource' );
					endif;
				?>    
    
</h2>

<ul class = "small-block-grid-1 medium-block-grid-2 large-block-grid-4">
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post(); ?>
	<li>
<?php get_template_part('content', 'archive'); ?>
	</li>
	<?php endwhile; ?>
<?php else: ?>
	<li>
<?php get_template_part('content', '404'); ?>
	</li>
<?php endif; ?>
</ul>
<p><b>Available Archives</b></p>
<ul>
    <?php wp_get_archives('type=yearly'); ?>
</ul>
</div>
<?php get_footer(); ?>
