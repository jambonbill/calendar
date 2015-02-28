<?php
// Example using the google-api-php-client
// https://github.com/google/google-api-php-client
// http://developers.google.com/apis-explorer/?hl=en_US#p/books/v1/
// 
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
  $client->setDeveloperKey("AIzaSyCjCyPYZkpQMjipf11rbHM_eoG6uGdJm_M");  //jambon key
  
  //http://stackoverflow.com/questions/24464739/google-api-php-uncaught-exception-on-createauthurl
  $client->setScopes(array(
     'https://www.googleapis.com/auth/plus.login',
     'profile',
     'email',
     'openid',
  ));
  //$client->setClientId('{clientid}.apps.googleusercontent.com');//?
  //$client->setClientSecret('{clientsecret}');//?
  
  //$client->authenticate("");
  //die('check');
}
catch (Exception $e){
  //var_dump($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if (!$client->getAccessToken()) {
    echo "Error: !\$client->getAccessToken()\n";
    exit;
}  

die('youpi');

echo "new Google_Service_Calendar(\$client);\n";
$service = new Google_Service_Calendar($client);

// https://developers.google.com/google-apps/calendar/v3/reference/calendarList/list
$calendarList = $service->calendarList->listCalendarList();
while(true) {
  foreach ($calendarList->getItems() as $calendarListEntry) {
    echo $calendarListEntry->getSummary();
  }
  $pageToken = $calendarList->getNextPageToken();
  if ($pageToken) {
    $optParams = array('pageToken' => $pageToken);
    $calendarList = $service->calendarList->listCalendarList($optParams);
  } else {
    break;
  }
}

die("ok");

//https://developers.google.com/google-apps/calendar/v3/reference/calendarList/get
//$calendarListEntry = $service->calendarList->get('0qfrti6gst4q8hpl89utm8elno@group.calendar.google.com');
//$calendarListEntry = $service->calendarList->get('jambonbill@gmail.com');
//echo $calendarListEntry->getSummary();


die("ok");
