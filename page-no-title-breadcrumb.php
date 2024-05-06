<?php /* Template Name: Page -- No Title & Breadcrumbs*/ ?>
<?php get_header(); ?>
<div class = "row" id = "contentsection">
    <div class = "large-12 column" id = "content-box">
<?php   if(have_posts()): ?>

<?php   while(have_posts()): the_post(); ?>

<?php   the_content(); ?>

<?php   endwhile; ?>

<?php   else: ?>

<?php get_template_part('content', '404'); ?>

<?php   endif; ?>
    </div>
</div>
<?php get_footer(); ?>