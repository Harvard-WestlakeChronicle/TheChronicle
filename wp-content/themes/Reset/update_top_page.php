<?php

$key = 'AIzaSyAe2rfpaMQ_un4oqgD08qsxDaI8HZC4yoc';

require_once dirname(__FILE__) . '/google-api-php-client/src/Google/autoload.php';

require_once dirname(__FILE__) . '/google-api-php-client/src/Google/Client.php';
require_once dirname(__FILE__) . '/google-api-php-client/src/Google/Service/Analytics.php';

########## Google Settings.. Client ID, Client Secret #############
$google_client_id               = '969773144884-48sn80a8vevbgja6053bpeegrrs84kj9.apps.googleusercontent.com';
$google_client_secret           = '3F-Zeh0_I7Ge7GNNnhjsIl_j';
$google_redirect_url            = 'http://hwchronicle.com/wp-content/themes/Reset/update_top_page.php';
$page_url_prefix                = 'http://www.hwchronicle.com';
$key = 'AIzaSyAe2rfpaMQ_un4oqgD08qsxDaI8HZC4yoc';

########## Google analytics Settings.. #############
$google_analytics_profile_id    = 'ga:64699213'; //Analytics site Profile ID
$google_analytics_dimensions    = 'ga:landingPagePath,ga:pageTitle'; //no change needed (optional)
$google_analytics_metrics       = 'ga:pageviews'; //no change needed (optional)
$google_analytics_sort_by       = '-ga:pageviews'; //no change needed (optional)
$google_analytics_max_results   = '500'; //no change needed (optional)

########## MySql details #############
$db_username                    = "hwchroniclecom1"; //Database Username
$db_password                    = "fcyyWFmk"; //Database Password
$hostname                       = "mysql.hwchronicle.com"; //Mysql Hostname
$db_name                        = 'hwchronicle_com_1'; //Database Name

$mysqli = new mysqli($hostname,$db_username,$db_password,$db_name);

session_start();

$gClient = new Google_Client();
$gClient->setApplicationName('Top Content');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setDeveloperKey($key);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));

//check for session variable
if (isset($_SESSION["token"])) { 

    //set start date to three years ago
    $start_date = date("Y-m-d", strtotime("-36 month") ); 
    
    //end date as today
    $end_date = date("Y-m-d");
    
    try{
        //set access token
        $gClient->setAccessToken($_SESSION["token"]); 
        
        //create analytics services object
        $analyticsService = new Google_Service_Analytics($gClient); 
        
        //analytics parameters (check configuration file)
        $params = array('dimensions' => $google_analytics_dimensions,'sort' => $google_analytics_sort_by,/*'filters' => 'ga:medium==organic',*/'max-results' => $google_analytics_max_results);
        
        //get results from google analytics
        $results = $analyticsService->data_ga->get($google_analytics_profile_id,$start_date,$end_date, $google_analytics_metrics, $params);
    }
    catch(Exception $e){ //do we have an error?
        echo $e->getMessage(); //display error
    }
    
    $pages = array();
    $rows = $results->rows;
    
    if($rows)
    {
        echo '<ul>';
        foreach($rows as $row)
        {
            //prepare values for db insert
            $pages[] = '("'.$row[0].'","'.addslashes($row[1]).'",'.$row[2].')';
            
            //output top page link
            echo '<li><a href="'.$page_url_prefix.$row[0].'">'.$row[1].'</a></li>';
        }
        echo '</ul>';
        
        //empty table
        $mysqli->query("TRUNCATE TABLE google_top_pages");
        
        //insert all new top pages in the table
        if($mysqli->query("INSERT INTO google_top_pages (page_uri, page_title, total_views) VALUES ".implode(',', $pages).""))
        {
            echo '<br />Records updated...';
        }else{
            echo $mysqli->error;
        }
    }
    
}else{
    //authenticate user
    if (isset($_GET['code'])) {     
        $gClient->authenticate($_GET['code']);
        $token = $gClient->getAccessToken();
        $_SESSION["token"] = $token;
        header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
    }else{
        $authUrl = $gClient->createAuthUrl();
        print "<a class='login' href='$authUrl'>Connect Me!</a>";
    }
}


