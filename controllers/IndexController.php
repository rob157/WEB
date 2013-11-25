<?php
require_once dirname(__FILE__) . '/../lightmvc/ActionController.php';
require_once('/model/Member.php');
require_once('/model/Members.php');

class IndexController extends ActionController
{
    /**
     * Simple index page which links to the main available actions
     */
    public function indexAction()
    {
        // members : getFrontProfiles
    }
    



// rssAction
public function rssAction()
{
 $this->_includeTemplate = true; // to hide footer & header
 $idMember = 1; //À determiner!
 $result = Members::getRss($idMember);
 $rss =  ' <?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
        <title>RSS Title</title>
        <description>RSS for a patient</description>
        <pubDate> '. date("F j, Y, g:i a").'</pubDate>
';
var_dump($result);
 foreach($result as $r)
 {
  // do something here
  $rss = $rss.' <br/> <item>  <date> '.$r['date'].' </date> <content>' .$r['content'].' </content> '.' <service> '.$r['service'].' </service> </item> ';
 
 }

$rss = $rss.'</channel> </rss>';
$this->rss = $rss; // transmit it to view
}      

}