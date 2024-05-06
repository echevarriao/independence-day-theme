<?php get_header(); ?>
<div class = "large-12 column" id = "content-box">
<?php if(have_posts()): ?>

<?php while(have_posts()): the_post(); ?>

<?php get_template_part('content', 'author'); ?>

<?php endwhile; ?>

<?php else: ?>

<?php get_template_part('content', '404'); ?>

<?php endif; ?>
</div>
<?php get_footer(); ?>