<?php
  require_once("sparkle_functions.php");
  session_start();

  if($_GET['code'] != '') { // We've been authorized by the end user.
    if ($api->Grant($_GET['code']) == true) { // ...and have granted an access token by Spark API.
      // Store the access and refresh tokens, and send the user back to see
      // their listings.
      $_SESSION['access_token']  = $api->oauth_access_token;
      $_SESSION['refresh_token'] = $api->oauth_refresh_token;
      echo("<script>window.location='index.php';</script>");
    }
    else {
      echo("We're sorry, but the Grant request failed!");
    }
  }
  else if ($_GET['error'] == 'redirect_uri_mismatch') {
    echo("Please verify that \$GLOBALS['redirect_uri'] set in sparkle_functions.php
          matches exactly the redirect URI on record for your key.");
  }
?>
