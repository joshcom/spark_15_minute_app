<?php
  require_once("sparkle_functions.php");
  session_start();

  if($_GET['openid_spark_code'] != '') { // We've been authorized by the end user.
    if ($api->Grant($_GET['openid_spark_code']) == true) { // ...and have granted an access token by Spark API.

      /*  
        IMPORTANT:  Do not store your access/refresh token in this manner in your production application.
        Your tokens should never be stored in a cookie or passed directly to a web browser (or any application
        that is not the API).

        We only cut this corner here for the sake of demonstrating the flow quickly and without further
        dependencies.
      */

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
  else if ($_GET['openid_mode'] == 'error') {
    echo("Please verify that \$GLOBALS['redirect_uri'] set in sparkle_functions.php
          matches exactly the redirect URI on record for your key.");
  }
?>
