<?php @session_start(); 

    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cal-rsvp-mkr-object.php'; 
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cal-rsvp-mkr-submit.php'; 

    get_header(); 

    if(have_posts()) {

    while(have_posts()) { the_post(); 

    $org_event = new Cal_Rsvp_Mkr_Object(); 

    if($_POST['org_post_container'] && $org_event->get_requires_rsvp() == "Yes"):
    

    // lets create our submit object
/*
    $org_event_submit = new Cal_Rsvp_Mkr_Submit();
    
    $org_event_submit->getCurrentEventId();

    $org_event_submit->sanitizeData();
    
    if($org_event_submit->isReady()){
        
        if($org_event_submit->submitData()){
            
            if($org_event_submit->sendToRSVPEmail()){
                
            } else {
                
                
            }
            
        } else {
            
            
        }
        
    } else {
        
        
    }
    */
?>
<?php endif; ?>
<?php if($_SESSION['success']){ ?>
<hr />
<p><b>Thank You!</b> <?php print $_SESSION['success_msg'] ?></p>
<hr />
<?php

// now let us clean the session variable
// just show the success message only once

unset($_SESSION['success']);
unset($_SESSION['success_msg']);

} ?>
<h2><?php the_title(); ?></h2>
Event Information
<?php if($org_event->getEventName()) { ?>
<p><b>Event Name</b>: <?php print $org_event->getEventName() ?></p>
<?php }?>
<?php if($org_event->getDate()) { ?>
<p><b>Date of Event</b>: <?php print $org_event->getDate() ?></p>
<?php }?>
<?php if($org_event->getStartTime()) { ?>
<p><b>Start Time</b>: <?php print $org_event->getStartTime() ?></p>
<?php }?>
<?php if($org_event->getEndTime()) { ?>
<p><b>End Time</b>: <?php print $org_event->getEndTime() ?></p>
<?php }?>
<?php if($org_event->isAllDayEvent()) { ?>
<p><b>End Time</b>: <?php print $org_event->isAllDayEvent() ?></p>
<?php }?>
<?php if($org_event->getBriefDescription()) { ?>
<p><b>Brief Description</b>: <?php print $org_event->getBriefDescription() ?></p>
<?php }?>
<?php if($org_event->getDescription()) { ?>
<p><b>Description</b>: <?php print $org_event->getDescription() ?></p>
<?php }?>
<?php if($org_event->getFlyerUrl()) { ?>
<p><b>Flyer</b>: <a href = "<?php print $org_event->getFlyerUrl() ?>">Download</a></p>
<?php }?>
<?php if($org_event->getImage()) { ?>
<p><b>Event Image</b>: <img src = "<?php print $org_event->getImage() ?>" alt = "event image" /></p>
<?php }?>
<?php if($org_event->getLocationName()) { ?>
<p><b>Location</b>: <?php print $org_event->getLocationName() ?></p>
<?php }?>
<?php if($org_event->getAddress() || $org_event->getAddressOpt()) { ?>
<p><?php print $org_event->getAddress() ?>
<?php print $org_event->getAddressOpt() ?>
<?php print $org_event->getCityTown() . ' ' . $org_event->getStateProvince() . ' ' . $org_event->getZipPostalCode() ?></p>
<?php }?>
<?php if($org_event->getMapUrl()) { ?>
<p><b>Map URL</b>: <?php print $org_event->getMapUrl() ?></p>
<?php }?>
<?php if($org_event->getOrganizerLastName()) { ?>
<p><b>Organizer</b>: <?php print $org_event->getOrganizerLastName() . ", " . $org_event->getOrganizerFirstName() ?></p>
<?php } ?>
<?php if($org_event->getOrganizerTelephone()) { ?>
<p><b>Telephone</b>: <?php print $org_event->getOrganizerTelephone() ?></p>
<?php }?>
<?php if($org_event->getOrganizerEmail()) { ?>
<p><b>Contact E-Mail</b>: <?php print $org_event->getOrganizerEmail() ?></p>
<?php }?>
<?php if($org_event->getOrganizerDept()) { ?>
<p><b>Sponsoring Organization</b>: <?php print $org_event->getOrganizerDept() ?></p>
<?php }?>
<?php if($org_event->getRequiresRsvp()) { ?>
<p><b>Requires RSVP</b>: <?php print $org_event->getRequiresRsvp() ?></p>
<?php }?>
<?php if($org_event->getCitizenship()) { ?>
<p><b>Important Citizenship Requirements</b>: <?php print $org_event->getCitizenship() ?></p>
<?php }?>
<?php if($org_event->getRsvpEmail()) { ?>
<p><b>Send RSVP To</b>: <?php print $org_event->getRsvpEmail() ?></p>
<?php }?>
<?php if($org_event->getOpenTo()) { ?>
<p><b>Open To</b>: <?php print $org_event->getOpenTo() ?></p>
<?php }?>
<?php if($org_event->getRequiresRsvp() == "Yes"): ?>
<hr />
<?php

    // let us check our error count
    // if it is greater then zero, load error form
    // otherwise load our regular form

    if(intval($_SESSION['err_count']) > 0){

    require_once plugin_dir_path( __FILE__ ) . 'public/has-error-form-event.php';
        
    } else {

    require_once plugin_dir_path( __FILE__ ) . 'public/has-no-error-form-event.php';

    }
?>
<?php endif; ?>

<?php } // while loop ?>

<?php } else { ?>

<?php get_template('content', '404'); ?>

<?php } ?>

<?php get_footer(); ?>
