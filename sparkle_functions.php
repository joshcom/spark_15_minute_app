<?php

require_once("sparkapi4p2/lib/Core.php");

$GLOBALS['client_id']     = "<YOUR OAUTH2 CLIENT KEY>";
$GLOBALS['client_secret'] = "<YOUR OAUTH2 CLIENT SECRET>";
$GLOBALS['redirect_uri']  = "<THE URL TO callback.php>";

$GLOBALS['cache_expire_seconds'] = 300;

$api = new SparkAPI_OAuth($GLOBALS['client_id'], $GLOBALS['client_secret'], $GLOBALS['redirect_uri']);

function oauth2_endpoint_uri() {
  return "https://sparkplatform.com/oauth2?response_type=code&client_id=".
         $GLOBALS['client_id']."&redirect_uri=".urlencode($GLOBALS['redirect_uri']);
}

function get_user_name($api) {
  if ($_SESSION['name'] == '' || true) {
    $account_information = $api->GetMyAccount();
    $_SESSION['name']   = $account_information['Name'];
  }
  return $_SESSION['name'];
}

function get_top_ten_listings($api) {
  if ($_SESSION['last_listing_retrieval'] == '' ||
      $_SESSION['last_listing_retrieval'] < time() - $GLOBALS['cache_expire_seconds']) {
    $results = $api->GetMyListings(array(
      '_limit'   => 10,
      '_expand'  => 'PrimaryPhoto',
      '_orderby' => '-ModificationTimestamp'
    ));
    $_SESSION['listings'] = $results;
  }
  return $_SESSION['listings'];
}

function listing_img_tag($listing) {
  $photos = $listing['StandardFields']['Photos'];
  if (sizeof($photos) > 0) {
    return "<img src='".$photos[0]['UriThumb']."'>";
  }
  else {
    return "";
  }
}

function listing_info($listing) {
  $sf = $listing["StandardFields"];
  $html_str = "<dl style='margin-top:0px;'>" .
                "<dt>$" .$sf['ListPrice'] . " " . $sf['BedsTotal'] . 
                " beds, " . $sf['BathsTotal'] . "baths</dt>" .
                "<dd>" . $sf['StreetNumber'] . " " . $sf['StreetName'] . " " .
                $sf['StreetSuffix'] . "</dd>" .
                "<dd>".$sf['City'] . ", " .  $sf['StateOrProvince']."</dd>".
              "</dl>";
  return $html_str;

}

?>
