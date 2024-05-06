<?php if(is_single() || is_archive()) { ?>
</div>
    </div>
<?php } ?>
<?php require(get_template_directory() . "/inc/site.css-init.customizer.php"); ?>
        </div>
    </div>
<?php if(is_active_sidebar('sub-footerarea')): ?>
    <!-- sub-footer area, if necessary -->
    <div class = "long-row" id = "subfooter-box">
        <div class = "row">
            <?php dynamic_sidebar('sub-footerarea'); ?>
        </div>
    </div>
<?php endif; ?>

    <!-- footer area -->
    <div class = "long-row" id = "footer-box" role = "contentinfo">
        <div class = "row">
            <div class = "large-12 column">
                <?php if(is_active_sidebar('footerarea')): ?>
                <?php dynamic_sidebar('footerarea'); ?>
                <?php else: ?>
                <ul id = "default-footer">
                    <li><a href = "http://www.uconn.edu/az">A-Z Index</a></li>
                    <li><a href = "http://www.uconn.edu/">UConn Home</a></li>
                    <li><a href = "http://uconn.edu/disclaimers-privacy-copyright/">Disclaimers, Privacy, &amp; Copyright</a></li>
                    <li><a href = "http://www.uconn.edu/">&copy; <?php print date('Y'); ?> University of Connecticut</a></li>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php if(is_active_sidebar('below-footerarea')): ?>
    <!-- under footer area -->
    <div class = "long-row" id = "below-footer-box">
        <div class = "row">
            <?php dynamic_sidebar('below-footerarea'); ?>
        </div>
    </div>
<?php endif; ?>
</div>
<!-- footer color: <?php print $freedom_props["page_body_branding_bg_type"] ?> -->
<?php wp_footer(); ?>
<style type = "text/css">
    /* dynamic overrides goes here */
#above-header{

<?php if($freedom_props['above_brand_show'] == "show"): ?>
    width: 100%;
    line-height: 1.0;
    min-height: 25px;
    display: block;
    text-align: <?php print $freedom_props['above_brand_align']; ?>;
<?php   if($freedom_props['above_brand_height']): ?>
    height: <?php print $freedom_props['above_brand_height']; ?>;
<?php   endif; ?>
<?php   if($freedom_props['above_brand_txt_color']): ?>
    color: <?php print $freedom_props['above_brand_txt_color']; ?>;
<?php   endif; ?>
<?php   if($freedom_props['above_brand_bg_type'] == 'solid'): ?>
    background-color: <?php print $freedom_props['above_brand_solid_bg_color'] ?>;
<?php   else: ?>

    /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?> 0%, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?> 0%, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?> 0%, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?>), color-stop(100, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?> 0%, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['above_brand_first_gradient_bg_color'] ?> 0%, <?php print $freedom_props['above_brand_second_gradient_bg_color'] ?> 100%);

<?php endif; ?>

<?php else: ?>
    display: none;
<?php endif; ?>
    
}

#above-header a{

<?php if($freedom_props['above_brand_show'] == "show"): ?>
<?php if($freedom_props['above_brand_link_color']): ?>
    color: <?php print $freedom_props['above_brand_link_color'] ?>;
<?php endif; ?>

<?php endif; ?>
    
}

#above-header a:hover{
<?php if($freedom_props['above_brand_show'] == "show"): ?>

<?php if($freedom_props['above_brand_hover_link_color']): ?>
    color: <?php print $freedom_props['above_brand_hover_link_color'] ?>;
    transition: 0.25;
<?php endif; ?>

<?php endif; ?>
}

body{

<?php if($freedom_props["whole_body_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['whole_body_solid_bg_color']; ?>;

<?php elseif($freedom_props["whole_body_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?>;

     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['whole_bodyy_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
}

#header-bar{

<?php if($freedom_props["the_brand_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['brand_solid_bg_color']; ?>;

<?php elseif($freedom_props["the_brand_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['brand_first_gradient_bg_color']; ?>;

     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['brand_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['brand_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['brand_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['brand_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['brand_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['brand_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['brand_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['brand_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['brand_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['brand_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['brand_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['brand_second_gradient_bg_color']; ?> 100%);

<?php else: ?>
    background-color: #000e2f;
<?php endif; ?>
    
}

span#uconn-signature a{

<?php

    if($freedom_props['brand_uconn_txt_color']):
    println("color: " . $freedom_props['brand_uconn_txt_color'] . ";");
    endif;
    
?>
    
}

#separator{

<?php

    if($freedom_props['brand_separator_txt_color']):
    println("color: " . $freedom_props['brand_separator_txt_color'] . ";");
    endif;

?>

}

span#uconn-fullname a{

<?php

    if($freedom_props['brand_univct_txt_color']):
    println("color: " . $freedom_props['brand_univct_txt_color'] . ";");
    endif;

?>
    
}

#title-bar{
    
<?php if($freedom_props["header_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['header_solid_bg_color']; ?>;

<?php elseif($freedom_props["header_bg_type"] == "gradient"): ?>

    background-color: <?php $freedom_props['header_first_gradient_bg_color']; ?>

    background-color: <?php print $freedom_props['brand_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['header_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['header_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['header_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['header_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['header_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['header_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['header_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['header_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['header_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['header_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['header_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['header_second_gradient_bg_color']; ?> 100%);

<?php else: ?>
<?php endif; ?>
    
}

<?php if($freedom_props['primary_org_name_link_color']): ?>
h6 a.primary-org-name {
    font-size: 14px;
    color: <?php print $freedom_props['primary_org_name_link_color'] ?>;
    padding-left: 15px;
    letter-spacing: 1px;
    font-family: 'Proxima Nova', arial, helvetica, sans-serif;
}
<?php endif; ?>

<?php if($freedom_props['primary_org_name_hover_color']): ?>
h6 a.primary-org-name:hover {
    color: <?php print $freedom_props['primary_org_name_hover_color'] ?>;
}
<?php endif; ?>

<?php if($freedom_props['org_separator_color']): ?>
.org-separator{
color: <?php print $freedom_props['org_separator_color'] ?>
}
<?php endif; ?>
<?php if($freedom_props['secondary_org_name_link_color']): ?>
h6 a.secondary-org-name {
    font-size: 14px;
    color: <?php print $freedom_props['secondary_org_name_link_color'] ?>;
    letter-spacing: 1px;
    font-family: 'Proxima Nova', arial, helvetica, sans-serif;
}
<?php endif; ?>

<?php if($freedom_props['secondary_org_name_hover_color']): ?>
h6 a.secondary-org-name:hover {

    color: <?php print $freedom_props['secondary_org_name_hover_color'] ?>;

}
<?php endif; ?>

<?php if($freedom_props['header_primary_title_txt_color']): ?>
h2 span#site-name a{
    color: <?php print $freedom_props['header_primary_title_txt_color'] ?>;
}
<?php endif; ?>

<?php if($freedom_props['header_primary_title_hover_color']): ?>
h2 span#site-name a:hover{
    color: <?php print $freedom_props['header_primary_title_hover_color'] ?>;
}
<?php endif; ?>

.top-bar-section li:not(.has-form) a:not(.button), #top-menu-bar,  .top-bar{

<?php if($freedom_props["top_menu_display_toggle"] == "hide"): ?>
    display: none;
<?php endif; ?>
<?php if($freedom_props["top_menu_bg_type"] == "solid"): ?>

<?php if($freedom_props['top_menu_solid_bg_color']): ?>
    background-color: <?php print $freedom_props['top_menu_solid_bg_color']; ?>;
<?php else: ?>
    background-color: #eeeff1;
<?php endif; ?>

<?php elseif($freedom_props["top_menu_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?>
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['top_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['top_menu_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
    
}

#mainmenu{

<?php if($freedom_props['top_menu_align'] == "right"): ?>
    position: relative;
    float: right;
<?php elseif($freedom_props['top_menu_align'] == "center"): ?>
    position: relative;
    margin-left: auto;
    margin-right: auto;
<?php elseif($freedom_props['top_menu_align'] == "left"): ?>
    position: relative;
    float: left;
<?php endif; ?>

}

#mainmenu li a{

<?php if($freedom_props['top_menu_txt_color'] != ""): ?>
    color: <?php print $freedom_props['top_menu_txt_color'] ?>;
<?php endif; ?>
<?php if($freedom_props['top_menu_item_bg_color'] != ""): ?>
    background-color: <?php print $freedom_props['top_menu_item_bg_color'] ?>;
    
<?php endif; ?>

}

#mainmenu li a:hover{

<?php if($freedom_props['top_menu_txt_hover_color'] != ""): ?>

    color: <?php print $freedom_props['top_menu_txt_hover_color'] ?>;
<?php endif; ?>
<?php if($freedom_props['top_menu_item_hover_bg_color'] != ""): ?>
    background-color: <?php print $freedom_props['top_menu_item_hover_bg_color'] ?>;
<?php endif; ?>

}

#main-menu-bar{

<?php if($freedom_props["main_menu_branding_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['main_menu_solid_bg_color']; ?>;
<?php elseif($freedom_props["main_menu_branding_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['main_menu_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['main_menu_second_gradient_bg_color']; ?> 100%);
<?php endif; ?>

}

/* website body */
body {

<?php if($freedom_props["whole_body_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['whole_body_solid_bg_color']; ?>;
<?php elseif($freedom_props["whole_body_branding_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['whole_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['whole_body_second_gradient_bg_color']; ?> 100%);
<?php endif; ?>

}

/* front page section body */

body#frontpage #body-box{

<?php if($freedom_props["front_page_body_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['front_page_body_solid_bg_color']; ?>;
<?php elseif($freedom_props["front_page_body_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['front_page_body_solid_bg_color']; ?>;
    
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['front_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_body_second_gradient_bg_color']; ?> 100%);
<?php endif; ?>
    
}

body#frontpage #content-box, body#frontpage #contentsection{

<?php if($freedom_props["front_page_content_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['front_page_content_solid_bg_color']; ?>;
<?php elseif($freedom_props["front_page_content_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['front_page_content_solid_bg_color']; ?>;
    
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['front_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['front_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['front_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['content_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['front_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['front_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['front_page_content_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
    
}

/* secondary page section body */

body#secondarypage #body-box{

<?php if($freedom_props["sec_page_body_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['sec_page_body_solid_bg_color']; ?>;
<?php elseif($freedom_props["sec_page_body_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['sec_page_body_solid_bg_color']; ?>;
    
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['sec_page_body_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_body_second_gradient_bg_color']; ?> 100%);
<?php endif; ?>
    
}

body#secondarypage #content-box, body#secondarypage #contentsection{

<?php if($freedom_props["sec_page_content_bg_type"] == "solid"): ?>
    background-color: <?php print $freedom_props['sec_page_content_solid_bg_color']; ?>;
<?php elseif($freedom_props["sec_page_content_bg_type"] == "gradient"): ?>
    background-color: <?php print $freedom_props['sec_page_content_solid_bg_color']; ?>;
    
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['sec_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['sec_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['sec_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['content_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['sec_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['sec_page_content_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['sec_page_content_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
    
}



#subfooter-box{
    
<?php if($freedom_props["subfooter_branding_display_type"] == "hide"): ?>
    display: none;
<?php endif; ?>
<?php if($freedom_props["subfooter_branding_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['subfooter_solid_bg_color']; ?>;

<?php elseif($freedom_props["subfooter_branding_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['subfooter_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['subfooter_second_gradient_bg_color']; ?> 100%);

<?php else: ?>
<?php endif; ?>
    
    
}

#footer-box{
    
<?php if($freedom_props["footer_branding_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['footer_solid_bg_color']; ?>;

<?php elseif($freedom_props["footer_branding_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['footer_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['footer_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['footer_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['footer_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['footer_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['footer_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['footer_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['footer_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
<?php if($freedom_props["footer_text_color"]): ?>
    color: <?php print $freedom_props["footer_text_color"]?>;
<?php endif; ?>
   
}

#footer-box h3.widget-title{
    
<?php if($freedom_props["footer_text_color"]): ?>
    color: <?php print $freedom_props["footer_text_color"]?>;
    font-family: 'Proxima Nova', arial, helvetica, sans-serif;
<?php endif; ?>
    
}

#footer-box a{
 <?php if($freedom_props['footer_link_color']): ?>
   
    color: <?php print $freedom_props['footer_link_color'] ?>;
<?php endif; ?>
 <?php if($freedom_props['footer_link_bg_color']): ?>
   
    background-color: <?php print $freedom_props['footer_link_bg_color'] ?>;
<?php endif; ?>
    
}

#footer-box a:hover{
    
<?php if($freedom_props['footer_hover_link_color']): ?>
    color: <?php print $freedom_props['footer_hover_link_color'] ?>;
<?php endif; ?>
<?php if($freedom_props['footer_hover_link_bg_color']): ?>
    background-color: <?php print $freedom_props['footer_hover_link_bg_color'] ?>;
<?php endif; ?>
    
}

#below-footer-box{
    
<?php if($freedom_props['after_footer_txt_color']): ?>
    color: <?php print $freedom_props['after_footer_txt_color']; ?>;
<?php endif; ?>
<?php if($freedom_props["after_footer_bg_type"] == "solid"): ?>

    background-color: <?php print $freedom_props['after_footer_solid_bg_color']; ?>;

<?php elseif($freedom_props["after_footer_bg_type"] == "gradient"): ?>

    background-color: <?php print $freedom_props['footer_first_gradient_bg_color']; ?>;
     /* IE10+ */ 
    background-image: -ms-linear-gradient(top, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?> 100%);

    /* Mozilla Firefox */ 
    background-image: -moz-linear-gradient(top, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?> 100%);

    /* Opera */ 
    background-image: -o-linear-gradient(top, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?> 100%);

    /* Webkit (Safari/Chrome 10) */ 
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?>), color-stop(100, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?>));

    /* Webkit (Chrome 11+) */ 
    background-image: -webkit-linear-gradient(top, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?> 100%);

    /* W3C Markup */ 
    background-image: linear-gradient(to bottom, <?php print $freedom_props['after_footer_first_gradient_bg_color']; ?> 0%, <?php print $freedom_props['after_footer_second_gradient_bg_color']; ?> 100%);

<?php endif; ?>
   
}


ul#default-footer li a, ul#default-footer li {

<?php if($freedom_props['footer_link_color'] != ""): ?>
    color: <?php print $freedom_props['footer_link_color']; ?>;
<?php endif; ?>
<?php if($freedom_props['footer_link_bg_color'] != ""): ?>
    background-color: <?php print $freedom_props['footer_link_bg_color']; ?>;
<?php endif; ?>
    
}

ul#default-footer li a:hover{
    
<?php if($freedom_props['footer_hover_link_color'] != ""): ?>
    color: <?php print $freedom_props['footer_hover_link_color']; ?>;
<?php endif; ?>
<?php if($freedom_props['footer_hover_link_bg_color'] != ""): ?>
    background-color: <?php print $freedom_props['footer_hover_link_bg_color']; ?>;
<?php endif; ?>
    
}

.top-bar-section > ul > .divider, .top-bar-section > ul > [role="separator"] {
    
<?php if($freedom_props['top_menu_divider'] == 'hide'): ?>
    display: none;
<?php endif; ?>
<?php if($freedom_props['top_menu_divider_color']): ?>
    border-right: solid 1px <?php print $freedom_props['top_menu_divider_color'] ?>;
<?php endif; ?>

}
</style>
<script language = "javascript" type = "text/javascript">
    
    jQuery(document).foundation();

	jQuery('div.accordion div div').accordion();
    
</script>
<!-- start PING -->
<script async = "async" src = "https://connect.grad.uconn.edu/ping/">

	/* */

</script>
<!-- end PING -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15349581-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
(function(h,e,a,t,m,p) {
m=e.createElement(a);m.async=!0;m.src=t;
p=e.getElementsByTagName(a)[0];p.parentNode.insertBefore(m,p);
})(window,document,'script','https://u.heatmap.it/log.js');
</script>
<script type='text/javascript' src='https://scripts-universityofconn.netdna-ssl.com/cookie-notification.js'></script>
<noscript><p>Our websites may use cookies to personalize and enhance your experience. By continuing without changing your cookie settings, you agree to this collection. For more information, please see our <a href="https://privacy.uconn.edu/university-website-notice/" target="_blank">University Websites Privacy Notice</a>.</p></noscript>
</body>
</html>
