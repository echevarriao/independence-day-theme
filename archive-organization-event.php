<?php get_header(); ?>
<?php

// custom_breadcrumbs();

$event_actions = array();

$event_actions['month'] = "display_month";
$event_actions['year'] = "display_year";
$months = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$the_months = array('January' => 1, 'February' => 2, 'March' => 3, 'April' => 4, 'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12 );

require_once WP_PLUGIN_DIR . '/cal-rsvp-mkr/public/class-cal-rsvp-mkr-object.php';  

?>&nbsp;
<form action="" method="post" class = "rsvp-form-container">
<table>
    <tr>
        <td><label>Search </label></td>
        <td><select id = "mth" name = "mth">
<option value = "-">Select Month</option>    
<?php for($i = 1; $i < count($months); $i++) {?>
    <option value = "<?php print $i; ?>" <?php selected(date('n'), $i)?>><?php print $months[$i]; ?></option>
<?php } ?>
</select>
</td>
        <td><select id = "yr" name = "yr">
<option value = "-">Select Year</option>    
<?php for($i = 2000; $i <= 2025; $i++) {?>
    <option value = "<?php print $i; ?>" <?php selected(date('Y'), $i)?>><?php print $i; ?></option>
<?php } ?>
</select>
</td>
        <td><input type = "submit" value = "Submit" id = "submitBtn" name = "submitBtn" /></td>
    </tr>
</table>
<input type = "submit" name = "go" value = "&laquo; Previous" id = "go" /> | <input type = "submit" name = "go" value = "Next &raquo;" id = "go" />
<p>&nbsp;</p>
<?php
    
        if($_POST['go'] == 'Next »' || $_POST['go'] == '« Previous'){

        $action = $_POST['go'];

        $m = sanitize_text_field($_POST['curr_month']);
        $m = (int)$m;

        $y = sanitize_text_field($_POST['curr_year']);
        $y = $_POST['curr_year'];

            if($action == 'Next »'){
                
            $m = $m + 1;
        
                if($m > 12){
            
                $m = 1;
                $y = (int)$y + 1;
                
                } 

            } elseif($action == "« Previous"){
                
            $m = $m - 1;
        
                if($m < 1){
            
                $m = 12;
                $y = (int)$_POST['curr_year'] - 1;
                
                } 
            }
        } elseif(isset($_POST['submitBtn']) && count($_POST) > 1 && isset($_POST['mth']) && isset($_POST['yr'])){

        $args = null;
        $m = sanitize_text_field($_POST['mth']);
        $y = sanitize_text_field($_POST['yr']);
        
        } else {

        $m = sanitize_text_field(date('n'));
        $y = sanitize_text_field(date('Y'));

        }

        $args = array('post_type' => 'organization-event',
              'relation' => 'and',
              'post_status' => 'published',
                'paged'               => $paged,
                'meta_query' => array(
                    array(
                        'key' => 'date_information_month',
                        'value' => $months[$m]
                        ),
                    array(
                          'key' => 'date_information_year',
                          'value' => $y),
                ),
              'meta_key' => 'date_information_day',
              'orderby' => 'meta_value_num',
              'order' => 'asc',
              );
              
            $q = new WP_Query( $args );

                if($q->have_posts()):

                paginate_links();
                
                while($q->have_posts()):
                
                $q->the_post();

                $org_event = new Cal_Rsvp_Mkr_Object(get_the_ID());


?>

<p><b><?php print the_title(); ?></b><br />
<b>Date</b>: <?php print $org_event->getMonthDate() . ' ' . $org_event->getDayDate() . ', ' . $org_event->getYearDate() ?><br />
<?php if($org_event->getLocationName()): ?>
<b>Location</b>: <?php print $org_event->getLocationName(); ?><br />
<?php endif; ?>
<b>Brief Description</b>: <?php print $org_event->getBriefDescription();?><br />
<a href = "<?php the_permalink(); ?>" class = "button radius small">Event Details</a>
</p>
<?php           endwhile;

                paginate_links();

                else:

?>
<p>There are no events for this month of <?php print $months[$m] . ' ' . $y ?></p>
<?php           endif;

wp_reset_postdata();

?>
<div style = "display: none;">
<?php if(count($_POST) > 1 && isset($_POST['mth']) && isset($_POST['yr'])){ ?>
    <input type = "hidden" name = "curr_month" id = "curr_month" value = "<?php print $m; ?>" />
    <input type = "hidden" name = "curr_year" id = "curr_year" value = "<?php print $y; ?>" />
<?php } else { ?>
    <input type = "hidden" name = "curr_month" id = "curr_month" value = "<?php print date('n') ?>" />
    <input type = "hidden" name = "curr_year" id = "curr_year" value = "<?php print date('Y'); ?>" />
<?php } ?>
</div>
</form>
<?php get_footer(); ?>