<?php /* Template Name: Page -- Left Side Menu & No Breadcrumbs*/ ?>
<?php get_header(); ?>
<?php if(is_front_page()){ ?>
<?php } elseif(is_active_sidebar('secondary-page-bannerarea')){ ?>
<div id = "page-banner-bar" class = "long-row">
    <div class = "row">
        <div class = "large-12 custom-column">
    <?php dynamic_sidebar('secondary-page-bannerarea'); ?>
        </div>
    </div>
</div>
<?php } else { ?>
<?php } ?>
<div id = "page-title-bar" class = "long-row">
    <div class = "row">
        <div class = "large-12 column">
            <h2><?php the_title(); ?></h2>    
        </div>
    </div>
</div>
<div class = "row" id = "contentsection">
    <div class = "large-3 column">
    <?php if(is_active_sidebar('left-sidebar-area')): ?>
    <?php dynamic_sidebar('left-sidebar-area'); ?>
    <?php else: ?>
    <p>&nbsp;</p>
    <?php endif; ?>
    </div>
    <div class = "large-9 column">
<?php   if(have_posts()): ?>

<?php   while(have_posts()): the_post(); ?>

<?php   the_content(); ?>

<?php   endwhile; ?>
<?php edit_post_link( __( 'Edit Content', 'independence-day' ), '<hr /><p><span class="txt-white button radius small">', '</span></p>' ); ?>

<?php   else: ?>

<?php get_template_part('content', '404'); ?>

<?php   endif; ?>
    </div>
</div>
<?php get_footer(); ?>
