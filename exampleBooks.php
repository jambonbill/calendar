<?php
// Example using the google-api-php-client
// https://github.com/google/google-api-php-client
// http://developers.google.com/apis-explorer/?hl=en_US#p/books/v1/
// 
echo "<title>Google Books Api test</title>";
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



echo "new Google_Service_Books(\$client);\n";
$service = new Google_Service_Books($client);

$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Steinbeck', $optParams);

foreach ($results as $item) {
  print_r($item['volumeInfo']);
  //echo $item['volumeInfo']['title'], "<br /> \n";
}

