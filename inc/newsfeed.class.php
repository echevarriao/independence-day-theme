<?php

class NewsFeed{

    var $feedUrl = "";
    var $feed = null;
    var $title = "";
    var $descr = "";
    var $icon = "";
    var $link = "";
    var $pubdate = "";
    var $rss = null;
    var $category = null;
    var $m_index = 0;
    var $m_count = 0;
   
function __construct($feed = "", $m_cat = ""){

    $this->rss = Array();

    $validXML = true;
    $xml = null;
    $dom = new DOMDocument();

    $this->rss = Array();

    // lets do a basic data validation
    // are blank, null, set or even a valid URL

    if($feed == "" || $feed == null || !isset($feed) || !filter_var($feed, FILTER_VALIDATE_URL)){

    $this->rss = null;

    } else {

    $this->feedUrl = $feed;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $this->feedUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $xml = curl_exec($ch);

    curl_close($ch);

    /*
     * validate XML first before we process the data
     * to initilize the object
     *
     */

     $status = $this->isValidXML($xml);

    /*
     * test to see if $status is true, if not set the RSS feed Array to null
     * meaning the XML is invalid or has a security issue
     *
     */
    
        if($status != true){

        $this->rss = null;

        } else {

    /*
     * the XML is valid so lets process it
     * and initialize the RSS property array
     *
     */

        $dom->loadXML($xml, LIBXML_PARSEHUGE);
    
        $this->feed = simplexml_load_string($dom->saveXML());

        for($index = 0; $index < 10; $index++){

        $this->rss[$index] = $this->feed->channel->item[$index];
        
        }

        }
    
    }

}

function feedCount(){
    
    return count($this->rss);
    
}

/*
 * @description we validate the nodes to protect against xxe
 * @param $m_dom: an XML string holding the data we need to validate
 * @return boolean value, true if it is valid/secure, false if it is invalid/insecure
 */

function isValidXML($m_dom = ""){

    $tmpXML = "";
    $tmpDOM = null;

    if($m_dom == null || !isset($m_dom) || $m_dom == ""){

    return false;
    
    } else {
    
    /*
     * first basic test, does it have a DOCTYPE declaration?
     * 
     * if it doesn't lets get out of here and return false
     * 
     */
    
    $tmpXML = @preg_replace("/[:space:]/", '', $m_dom);

        if(preg_match("/<!DOCTYPE/i", $tmpXML)) {
            
        throw new InvalidArgumentException('Invalid XML: Detected use of illegal DOCTYPE');

        return false;

        }
    
        /*
         *
         * second, we got this far so lets disable loading external entities
         * all we need is the XML string
         *
         */

        $val = libxml_disable_entity_loader(true);
    
        $tmpDOM = new DOMDocument();
        $tmpDOM->loadXML($m_dom);
    
        /*
         * third lets test for entity expansion attack
         *
         * if it is found, lets get out of here and return false
         *
         */

        foreach ($m_dom->childNodes as $child) {

            if ($child->nodeType === XML_DOCUMENT_TYPE_NODE) {
         throw new InvalidArgumentException('Invalid XML: Detected use of illegal data or bad DOCTYPE declaration');
        
            return false;

            } 
        
        }

    libxml_disable_entity_loader($val);
    
    }

    // everything checked out okay
    // lets return true and get out of here
    
    return true;
    
}

function setIndex($m_index = 0){
    
    $this->m_index = $m_index;
    
}

function getIndex(){
    
    return $this->m_index;
    
}
            
function setIcon($url = ""){
    
    $this->icon = $url;

}

function getIcon(){
    
    return $this->rss[$this->m_index]->photo;    
    
}

function setFeedUrl($feed = ""){
    
    $this->feedUrl = $feed;
    
}

function getFeedUrl(){
    
    return $this->feedUrl;
    
}

function getCount(){
    
    return count($this->rss);
    
}

function getPubDate(){
    
    return $this->rss[$this->m_index]->pubDate;
}
function getDescription(){
    
    return $this->rss[$this->m_index]->description;
}

function getUrl(){
    
    return $this->rss[$this->m_index]->link;
}

function getExcerpt($limit = 600){
    
    if(intval($limit > 0)){
    
    return substr($this->rss[$this->m_index]->description, 0, $limit);
    
    } else {
    
    return substr($this->rss[$this->m_index]->description, 0, 600);
        
    }
    
}

function getCategories(){
    
    $temp = Array();
    $categories = "";
    $z = 0;
    
    for($z = 0; $z < count($this->rss[$this->m_index]->category); $z++){
    
    $temp[$z] = $this->rss[$this->m_index]->category[$z];
    
    }
    
    $categories = implode("|", $temp);
    
    return $categories;
}

function getTitle(){
    
    return $this->rss[$this->m_index]->title;
    
}

function setTitle($m_title = ""){
    
    $this->rss[$this->m_index]->title = $m_title;
    
}

function hasCategory($category = ""){

    $i = 0;
    $temp = Array();
    
    if($category == "" || $category == null){
    
    return false;
        
    } else {

    for($i = 0; $i < count($this->rss[$this->m_index]->category); $i++){

    $temp[$i] = $this->rss[$this->m_index]->category[$i];

    }

    if(in_array($category, $temp)){
        
    return true;
        
    } else {
        
    return false;
        
    }
    
    }
    
}

function resetIndex(){
    
    $this->m_index = 0;
    
}

function hasEnded(){
    
    if($this->m_index == count($this->rss)){
    
    return true;
    
    }
    
    return false;
    
}

}

?>
