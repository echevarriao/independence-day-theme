<?php get_header(); ?>
<div class = "row" id = "contentsection">
<?php custom_breadcrumbs(); ?>
    <div id = "content-box">
        <div class = "large-3 column">
<h3 class = "content-title">Navigation</h3>
<?php

$child_pages = list_child_pages();

?>
<?php if($child_pages): ?>
<?php print $child_pages; ?>
<?php else: ?>
    <?php if(is_active_sidebar('left-sidebar-area')): ?>
    <?php dynamic_sidebar('left-sidebar-area'); ?>
    <?php else: ?>
    <ul id = "child-pages">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="http://www.business.uconn.edu/">School of Business</a>
        </li>
        <li>
            <a href="http://www.engr.uconn.edu/">School of Engineering</a>
        </li>
        <li>
            <a href="http://www.uconn.edu/">University of Connecticut</a>
        </li>
    <?php endif; ?>

<?php endif; ?>

        </div>
        <div class = "large-9 column" role = "main">
<?php   if(have_posts()): ?>
<?php   while(have_posts()): the_post(); ?>
<h2 class = "content-title"><?php the_title(); ?></h2>
<?php the_content(); ?>
<?php   endwhile; ?>
<?php   else: ?>
<?php get_template_part('content', '404'); ?>
<?php   endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
