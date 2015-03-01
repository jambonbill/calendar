<?php
// Example using the google-api-php-client
// https://github.com/google/google-api-php-client
// http://developers.google.com/apis-explorer/?hl=en_US#p/books/v1/

//session_start();
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
     'calendar',
     'profile',
     'email',
     'openid',
  ));
  //$client->setClientId('{clientid}.apps.googleusercontent.com');//?
  //$client->setClientSecret('{clientsecret}');//?
  
  $client->setClientId('jambonbill@gmail.com');
  $client->setClientSecret('');

  //$client->authenticate();//nope
  //die('check');
}
catch (Exception $e){
  //var_dump($e);
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

//$client::$auth->refreshTokenWithAssertion();//test

if (!$client->getAccessToken()) {
    echo "Error: !\$client->getAccessToken()\n";
    exit;
} else {
  die("Fuck yeah !!!");
}

die('youpi');

