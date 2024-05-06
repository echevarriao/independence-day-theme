<?php get_header(); ?>
<div class = "row" id = "contentsection">
    <div class = "large-12 column" id = "content-box" role = "main">

        <?php if(have_posts()): ?>

<?php while(have_posts()): the_post(); ?>

<?php get_template_part('content', get_post_type()); ?>
   
<?php endwhile; ?>

<?php else: ?>

<?php get_template_part('content', '404'); ?>

<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
