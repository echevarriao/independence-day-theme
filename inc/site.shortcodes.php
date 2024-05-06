<?php require_once(get_template_directory() . "/inc/YouTube.playlist.class.php"); ?>
<?php

add_shortcode('show_yt_playlist', 'display_yt_playlist_func');

function display_yt_playlist_func($atts){

    $info = array();
    $output = "";
    $yt = new YouTubePlaylist();
    $json = null;
    $i = 0;
    
    $info = shortcode_atts(array(
        'channel' => '',
        'showtitle' => 'yes', 
        'gkey' => '',
        'googleid' => '',
        'maxvideos' => '4',
        'showdescription' => 'no',
        'target' => '_self',
        'playlist' => '',
        'iconquality' => 'standard',
        'tabletype' => 'horizontal',
        'id' => 'no-id',
        'class' => 'no-class',
        'listtype' => 'htable', 
        ), $atts, 'show_yt_playlist' );
    
    if($info['channel'] == "" || $info['gkey'] == "" || $info['playlist'] == ""){
        
    return "Error: Missing channel, api key or playlist information";    
        
    }
    
    $yt->setAPIKey($info['gkey']);
    $yt->setChannelID($info['channel']);
    $yt->setPlaylist($info['playlist']);
    
    $yt->initURL();

    if($yt->retrieveData()){
    
    $json = $yt->getJSON_Data();

    $info['maxvideos'] = intval($info['maxvideos']);
    
        if($info['listtype'] == "vtable"){

        return show_as_vtable($json, $info);

        } else if($info['listtype'] == "htable"){
            
        return show_as_htable($json, $info);
            
        } else if($info['listtype'] == "list"){
            
        return show_as_foundation_list($json, $info);
    
        } else {
            
        return show_as_vtable($json, $info);
            
        }
    
    } else {
        
    return "No Playlist Information Available";
        
    }
    
}

function show_as_foundation_list($json = null, $info = null){
    
    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<ul id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";

    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<li>\n";
    $output = $output . "<a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p>\n";
    $output = $output . "</li>\n";
            
    }

    $output = $output . "</ul>\n";

    return $output;
    
}

function show_as_htable($json = null, $info = null){

    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<table id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";
    $output = $output . "<tr>\n";
            
    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<td valign = 'top'><a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p></td>\n";
            
    }

    $output = $output . "</tr>\n";
    $output = $output . "</table>\n";

    return $output;
    
}

function show_as_vtable($json = null, $info = null){
    
    $output = "";
    $url = "";
    $title = "";
    $target = "";
    $img_src = "";

    $output = $output . "<table id = '" . $info['id'] . "' class = '" . $info['class'] . "'>\n";
            
    for($i = 0; $i < $info['maxvideos']; $i++){

    $url = "https://youtube.com/watch?v=" . $json->items[$i]->snippet->resourceId->videoId ;
    $target = $info['target'];
    $title = $json->items[$i]->snippet->title;
            
    if($info['iconquality'] == "medium"){
            
    $img_src = $json->items[$i]->snippet->thumbnails->medium->url;
                
    } else if($info['iconquality'] == "high"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->high->url;
                
    } else if($info['iconquality'] == "standard"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->standard->url;

    } else if($info['iconquality'] == "maxres"){
                
    $img_src = $json->items[$i]->snippet->thumbnails->maxres->url;

    } else {
                
    $img_src = $json->items[$i]->snippet->thumbnails->default->url;
            
    }

    $output = $output . "<tr>\n";
    $output = $output . "<td valign = 'top'><a href = '$url' target = '$target'><img src = '$img_src' alt = '$img_src' /><br /><p><span>$title</span></p></td>\n";
    $output = $output . "</tr>\n";
            
    }

    $output = $output . "</table>\n";

    return $output;
    
}