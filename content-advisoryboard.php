<h2 class = "content-title"><?php the_title(); ?></h2>
<?php

        $m_index = get_the_ID();
        $feat_img_url = get_the_post_thumbnail_url($m_index);

?> 
<?php if($feat_img_url != "") { ?>
<img src ="<?php print $feat_img_url; ?>" width ="150" align ="left" class = "advisory-board-img" alt = "advisory board photo" />
<?php } ?>
    <?php the_content(); ?>
<p><em>Published: <?php print get_the_date(); ?></em></p>
