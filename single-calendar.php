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
            <h2>Academy Profile: <?php the_title(); ?></h2>    
        </div>
    </div>
</div>
<div class = "row" id = "contentsection">
    <div class = "large-12 column" id = "content-box">
<?php custom_breadcrumbs() ?>
&nbsp;
<?php if(have_posts()){ ?>

<?php while(have_posts()): the_post(); ?>

<?php get_template_part('content', get_post_type()); ?>

<?php endwhile; ?>

<?php } else { ?>

<?php get_template_part('content', 'none'); ?>

<?php } ?>
    </div>
</div>

<?php get_footer(); ?>
