Spark API 15 Minute Application
===============================

A simple "10 most recently updated listings" web app built on [Spark API].  This project is intended for educational purposes, rather than production deployment.

Requirements
------------
* Basic understanding of PHP.
* A web server that can run PHP scripts (e.g. Apache + mod_php)
* A Spark API key (get one here: http://sparkplatform.com/register/developers).
* cURL for PHP (required by the sparkapi4p2 library).

This application uses sparkapi4p2, available here: https://github.com/sparkapi/sparkapi4p2
For simplicity, this API client is packaged in with the example application.

Configuration
-------------

NOTE: This application will NOT work with a [Spark API Auth](http://sparkplatform.com/docs/authentication/spark_api_authentication) key.

In order for this example application to function, you'll need to supply your Client Key, Client Secret, and Client Redirect URI in sparkle_functions.php:

    $GLOBALS['client_id']     = "<YOUR OAUTH2 CLIENT KEY>";

    $GLOBALS['client_secret'] = "<YOUR OAUTH2 CLIENT SECRET>";

    $GLOBALS['redirect_uri']  = "<THE URL TO callback.php>";

From there, visit index.php on your web server to see the application in action.

  [Spark API]: http://sparkplatform.com/docs/

