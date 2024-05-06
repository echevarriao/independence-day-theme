<?php

class YouTubePlaylist{

    public $apikey = null, $playlist = null, $channel = null;
    public $json = null, $displayType = array('list', 'table');
    public $v3_url = "", $iconqual = array('default' => 'default', 'medium' => 'medium', 'high' => 'high', 'standard' => 'standard', 'maxres' => 'maxres', );
    public $iconquality = null;
    
function __construct($channel = null, $playlist = null, $apikey = ""){
    
    $this->apikey = $apikey;
    $this->channel = $channel;
    $this->playlist = $playlist;
    
}    

function setIconQuality($quality = ""){
    
    if($quality != 'default' || $quality != 'medium' || $quality != 'high' || $quality != 'standard' || $quality != 'maxres'){
        
    $this->iconquality = $quality;
        
    }
    
}

function getIconQuality(){
    
    return $this->iconquality;
    
}

function initURL(){
    
    if($this->apikey != "" && $this->playlist != null && $this->channel != ""){

    $this->v3_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" . $this->playlist . "&channelId=" . $this->channel . "&key=" . $this->apikey;

    return true;        
        
    } else {
        
    return false;

    }
    
}

function retrieveData(){
    
    $result = null;
    $ch = null;
    $data = null;
    
    if($this->playlist == "" || $this->apikey == "" || $this->channel == ""){
    
    return -1;
        
    }
    
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $this->v3_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec ($ch);
	$this->json = json_decode($result);
    
    if($this->json){
        
    return true;

    } else {

    return false;        
        
    }
        
}

function setJSON_Data($json_data){
    
    $this->json = $json_data;
    
}

function getJSON_Data(){
    
    return $this->json;
    
}

function getPlaylist(){
    
    return $this->playlist;
    
}

function setPlaylist($pl = null){
    
    $this->playlist = $pl;
    
}

function getChannelID(){
    
    return $this->channel;
    
}

function setChannelID($id = null){
    
    $this->channel = $id;
    
}

function setAPIKey($key = null){
    
    $this->apikey = $key;
    
}
    
function getAPIKey(){
        
    return $this->apikey;        
        
}

}
