Spark API 15 Minute Application
===============================

A simple "10 most recently updated listings" webapp built on Spark API.  Intended for educational purposes, rather than production deployment.

Requirements
------------
Basic understanding of PHP.
A web server that can run PHP scripts (e.g. Apache + mod_php)
A Spark API OAuth 2 key (get one here: http://sparkplatform.com/register/developers).
cURL for PHP (required by the sparkapi4p2 library).

This application uses sparkapi4p2, available here: https://github.com/sparkapi/sparkapi4p2
For simplicity, this API client is packaged in with the example application.

Configuration
-------------

In order for this example application to function, you'll need to supply your OAuth 2 Client Key, OAuth 2 Client Secret, and OAuth 2 Client Redirect URI in sparkle_functions.php:

  $GLOBALS['client_id']     = "<YOUR OAUTH2 CLIENT KEY>";
  $GLOBALS['client_secret'] = "<YOUR OAUTH2 CLIENT SECRET>";
  $GLOBALS['redirect_uri']  = "<THE URL TO callback.php>";

From there, visit index.php on whatever host you are running these PHP scripts from to see the application in action.
