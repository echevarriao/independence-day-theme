<?php if(has_post_thumbnail($post->ID)):?><img src = "<?php the_post_thumbnail_url(); ?>" alt = "" /><?php endif; ?>
                <p><strong><?php the_title(); ?></strong></p>
        <p><?php print substr(get_the_excerpt(), 0, 150); ?>. . .</p>
        <p><em>Published: <?php print get_the_date(); ?></em></p>
        <p><a href="<?php the_permalink(); ?>">read more</a></p>

