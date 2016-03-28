<?php include_once("home.html"); 

require_once __DIR__ . '/vendor/autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

// Init PHP Sessions
session_start();

$fb = new Facebook([
  'app_id' => '1079136575500300',
  'app_secret' => '4fb9d33041642dad732e350e6a72785d',
]);

$helper = $fb->getRedirectLoginHelper();

if (!isset($_SESSION['facebook_access_token'])) {
  $_SESSION['facebook_access_token'] = null;
}

if (!$_SESSION['facebook_access_token']) {
  $helper = $fb->getRedirectLoginHelper();
  try {
    $_SESSION['facebook_access_token'] = (string) $helper->getAccessToken();
  } catch(FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
}

if ($_SESSION['facebook_access_token']) {
  echo "You are logged in!";
} else {
  $permissions = ['ads_management'];
  $loginUrl = $helper->getLoginUrl('http://localhost:8888/marketing-api/', $permissions);
  echo '<a href="' . $loginUrl . '">Log in with Facebook</a>';
} 

// APPS API 
// Add to header of your file
use FacebookAds\Api;

// Add after echo "You are logged in "

// Initialize a new Session and instantiate an Api object
Api::init(
  '1079136575500300', // App ID
  '4fb9d33041642dad732e350e6a72785d',
  $_SESSION['facebook_access_token'] // Your user access token
);
 
?>
