<?php
// Example using the google-api-php-client
// https://github.com/google/google-api-php-client

echo "<title>Google Calendar Api test</title>";
echo "<pre>";

require_once 'google-api-php-client/src/Google/autoload.php'; // or wherever autoload.php is located

// Access Not Configured. 
// The API (Books API) is not enabled for your project. 
// Please use the Google Developers Console to update your configuration.' 
// in /var/www/calendar/google-api-php-client/src/Google/Http/REST.php:110

try{
  $client = new Google_Client();
  $client->setApplicationName("Client_Library_Examples");
  $client->setDeveloperKey("AIzaSyCjCyPYZkpQMjipf11rbHM_eoG6uGdJm_M");  
}
catch (Exception $e){
  //var_dump($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}




//$service = new Google_Service_Books($client);
$service = new Google_Service_Calendar($client);

$events = $service->events->listEvents('primary');

while(true) {

    foreach ($events->getItems() as $event) {
        echo $event->getSummary();
    }
    /*
    $pageToken = $events->getNextPageToken();
    
    if ($pageToken) {
        $optParams = array('pageToken' => $pageToken);
        $events = $service->events->listEvents('primary', $optParams);
    } else {
        break;
    }
    */
}

die("ok");


$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}

