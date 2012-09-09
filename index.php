<?php
  require_once("sparkle_functions.php"); // The API client is initialized here.
  session_start();

  $access_token = $_SESSION['access_token'];

  //  No session yet, and no authorization by the end user to access their data...
  if( $access_token == '') {
    /* 
       Send them off to Spark API's OpenId/OAuth2 endpoint.
       We'll see the end user again in callback.php.
    */
    header('Location: ' . $api->authentication_endpoint_uri());
    exit();
  }
  else {
    /*
      The user has already authorized our application.
      Set the access and refresh tokens in the API client,
      and start pulling data.
     */
    $api->SetAccessToken($access_token);
    $api->SetRefreshToken($_SESSION['refresh_token']);
    $agent_name = get_user_name($api);
    $agent_listings = get_top_ten_listings($api);
  }
?>
<html>
<head>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>
<div class='page-header'>
  <h1><?php echo($agent_name); ?>'s listings</h1>
</div>

<?php foreach ($agent_listings as $key => $listing) { ?>
<div class="row-fluid show-grid">
  <div class="span12">
    <div style="float:left;height:50px;margin-right:10px;width:65px;">
      <?php echo(listing_img_tag($listing)); ?>
    </div>
    <?php echo(listing_info($listing)); ?>
  </div>
</div>
<?php } ?>

<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
