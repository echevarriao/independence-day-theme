<?php /* Template Name: Page -- No Title & Open Area */ ?>
<?php get_header(); ?>

<?php   if(have_posts()): ?>

<?php   while(have_posts()): the_post(); ?>

<?php   the_content(); ?>

<?php   endwhile; ?>

<?php   else: ?>

<?php get_template_part('content', '404'); ?>

<?php   endif; ?>
<?php get_footer(); ?>