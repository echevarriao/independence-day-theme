<?php require_once(get_template_directory() . "/inc/newsfeed.class.php"); ?>
<?php
class NewsWidget extends WP_Widget{

function __construct(){
    
    parent::__construct('newsWidget',
    __('RSS Feed Display Widget', 'custom_news_widget'),
    array('description' => __('This widget allows you to display a news feed with photos provided that the news feed has a Photo Element. If it does not have a Photo tag, it will not display a photo.', 'newsWidget_class')));        
    
}

public function widget($argv, $instance){
    
    $widget_title = apply_filters('widget_title', $instance['rss_title']);
    
    $news = new NewsFeed($instance['rss_feed'], $instance['rss_category']);
        
    print $argv['before_widget'];
    
    if($widget_title != "" || $widget_title != null){

    print $argv['before_title'];
    print $widget_title;
    print $argv['after_title'];
    
    }

    // lets out put our widget information
print "<!-- here you go -->";
print $instance['rss_category'];        

    if($news->feedCount() > 0){

    print '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">';

    for($i = 0; $i < $instance['rss_display_count']; $i++){

    $news->setIndex($i);

    print "<li>";
    
        if($instance['rss_display_image'] == 'Y'){
        
        ?>
        <p><img src = "<?php print $news->getIcon(); ?>" class = "newsImages" alt = "<?php print $news->getIcon(); ?>" /></p>
        <?php
            
        }

    print '<p><b><a href = "' . $news->getUrl() . '">' . $news->getTitle() . '</a></b></p>';
    
        if($instance['rss_display_excerpt'] == 'Y'){
        
    print "<p>" . substr($news->getExcerpt(), 0, 150) . " . . .</p>";
            
        }

        if($instance['rss_display_pubdate'] == 'Y'){
            
        print "<p><b>Published: </b>" . mysql2date("M d, Y", $news->getPubDate()) . "</p>";
            
        }

    print "</li>";
    
    }
    
    print '</ul>';
    
        if($instance['rss_display_section_readmore'] == 'Y'){
        
?>
     <p><a href = "<?php print $instance['rss_section_readmore_url'] ?>" class = "moreLinks">Click Here to Read More Stories</a></p>   
<?php
            
        }
    
    } else {
        
    
    }

    print $argv['after_widget'];
    
}

public function form($widget){
    
?>
<p>
<label for="<?php echo $this->get_field_id( 'rss_title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'rss_title' ); ?>" name="<?php echo $this->get_field_name( 'rss_title' ); ?>" type="text" value="<?php echo esc_attr( $widget['rss_title'] ); ?>" />    
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_feed' ); ?>"><?php _e( 'RSS URL:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'rss_feed' ); ?>" name="<?php echo $this->get_field_name( 'rss_feed' ); ?>" type="text" value="<?php echo esc_attr( $widget['rss_feed'] ); ?>" />    
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_category' ); ?>"><?php _e( 'Category:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'rss_category' ); ?>" name="<?php echo $this->get_field_name( 'rss_category' ); ?>" type="text" value="<?php echo esc_attr( $widget['rss_category'] ); ?>" />    
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_image' ); ?>"><?php _e( 'Display News Icon(if available):' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_image' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_image' ); ?>">
<?php if($widget['rss_display_image'] == "Y"): ?>
    <option value = "Y" selected>Yes</option>
    <option value = "N">No</option>
<?php else: ?>
    <option value = "Y">Yes</option>
    <option value = "N" selected>No</option>
<?php endif; ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_count' ); ?>"><?php _e( 'Amount of News to Display: ' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_count' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_count' ); ?>">
<?php for($i = 4; $i < 12; $i = $i + 2){ ?>
<?php if($i == $widget['rss_display_count']): ?>
    <option value = "<?php print $i ?>" selected><?php print $i ?></option>
<?php else: ?>
    <option value = "<?php print $i ?>"><?php print $i ?></option>
<?php endif; ?>
<?php } ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_pubdate' ); ?>"><?php _e( 'Display Publication Date:' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_pubdate' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_pubdate' ); ?>">
<?php if($widget['rss_display_pubdate'] == "Y"): ?>
    <option value = "Y" selected>Yes</option>
    <option value = "N">No</option>
<?php else: ?>
    <option value = "Y">Yes</option>
    <option value = "N" selected>No</option>
<?php endif; ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_excerpt' ); ?>"><?php _e( 'Display Excerpt/Teaser:' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_excerpt' ); ?>">
<?php if($widget['rss_display_excerpt'] == "Y"): ?>
    <option value = "Y" selected>Yes</option>
    <option value = "N">No</option>
<?php else: ?>
    <option value = "Y">Yes</option>
    <option value = "N" selected>No</option>
<?php endif; ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_readmore' ); ?>"><?php _e( 'Display Story "Read More" Link' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_readmore' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_readmore' ); ?>">
<?php if($widget['rss_display_readmore'] == "Y"): ?>
    <option value = "Y" selected>Yes</option>
    <option value = "N">No</option>
<?php else: ?>
    <option value = "Y">Yes</option>
    <option value = "N" selected>No</option>
<?php endif; ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_display_section_readmore' ); ?>"><?php _e( 'Display News Section "Read More" Link' ); ?></label>
<select id="<?php echo $this->get_field_id( 'rss_display_section_readmore' ); ?>" name="<?php echo $this->get_field_name( 'rss_display_section_readmore' ); ?>">
<?php if($widget['rss_display_section_readmore'] == "Y"): ?>
    <option value = "Y" selected>Yes</option>
    <option value = "N">No</option>
<?php else: ?>
    <option value = "Y">Yes</option>
    <option value = "N" selected>No</option>
<?php endif; ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id( 'rss_section_readmore_url' ); ?>"><?php _e( 'Section "Read More" URL:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'rss_section_readmore_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_section_readmore_url' ); ?>" type="text" value="<?php echo esc_attr( $widget['rss_section_readmore_url'] ); ?>" />    
</p>
<?php
    
}

public function update($new_instance, $old_instance){
    
    $instance = $old_instance;
    
    $instance['rss_title'] = $new_instance['rss_title'];
    $instance['rss_feed'] = ( ! empty( $new_instance['rss_feed'] ) ) ? strip_tags( $new_instance['rss_feed'] ) : '';
    $instance['rss_display_image'] = ( ! empty( $new_instance['rss_display_image'] ) ) ? strip_tags( $new_instance['rss_display_image'] ) : '';
    $instance['rss_display_pubdate'] = ( ! empty( $new_instance['rss_display_pubdate'] ) ) ? strip_tags( $new_instance['rss_display_pubdate'] ) : '';
    $instance['rss_display_count'] = ( ! empty( $new_instance['rss_display_count'] ) ) ? strip_tags( $new_instance['rss_display_count'] ) : '';
    $instance['rss_category'] = ( ! empty( $new_instance['rss_category'] ) ) ? strip_tags( $new_instance['rss_category'] ) : '';
    $instance['rss_display_excerpt'] = ( ! empty( $new_instance['rss_display_excerpt'] ) ) ? strip_tags( $new_instance['rss_display_excerpt'] ) : '';
    $instance['rss_display_readmore'] = ( ! empty( $new_instance['rss_display_readmore'] ) ) ? strip_tags( $new_instance['rss_display_readmore'] ) : '';
    $instance['rss_display_section_readmore'] = ( ! empty( $new_instance['rss_display_section_readmore'] ) ) ? strip_tags( $new_instance['rss_display_section_readmore'] ) : '';
    $instance['rss_section_readmore_url'] = ( ! empty( $new_instance['rss_section_readmore_url']) && filter_var($new_instance['rss_section_readmore_url'], FILTER_VALIDATE_URL) ) ? strip_tags( $new_instance['rss_section_readmore_url'] ) : '';

    return $instance;
    
}
    
}

?>
