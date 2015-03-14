<?php
/**
 * Template Name: Page of top posts
 *
 */
?>
<?php

########## MySql details #############
$db_username                    = "hwchroniclecom1"; //Database Username
$db_password                    = "fcyyWFmk"; //Database Password
$hostname                       = "mysql.hwchronicle.com"; //Mysql Hostname
$db_name                        = 'hwchronicle_com_1'; //Database Name

//connect to the databse
$mysqli = new mysqli($hostname,$db_username,$db_password,$db_name);

//The query (all posts except uris with '/' '/features' '/sports/' '/opinion/' '/news/' '/archives/' '/photo/' '/ae/' '/video/' or that contain '/staff/' or '/issue/'
$results = $mysqli->query("SELECT page_uri, page_title, total_views FROM google_top_pages WHERE NOT ( page_uri = '/' ) AND NOT ( page_uri = '/sports/' ) AND NOT ( page_uri = '/features/' ) AND NOT ( page_uri = '/opinion/' ) AND NOT ( page_uri = '/news/' ) AND NOT ( page_uri = '/archives/' ) AND NOT ( page_uri = '/photo/' ) AND NOT ( page_uri = '/ae/' ) AND NOT ( page_uri = '/video/' ) AND page_uri NOT LIKE '%/staff/%' AND page_uri NOT LIKE '%/issue/%' ORDER BY total_views DESC LIMIT 10");

?>

<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<?php $curmonth = curmonth(); $curyear = curyear(); ?>

<header id="snubbed-header" class="pop inner ArchiveTop sports">
	<p id="small-header-lastupdated" class="uppercase">
		<?php just_tell_me($curmonth); ?> ISSUE
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/sports.png" id="announce"/>
	<p id="small-header-viewall" class="uppercase">
	</p>
	<div id="ticker">
		<?php get_recent_tags('sports'); ?>
	</div>
</header>

<?php 

//list all top pages on screen
echo '<ul class="page_result">';
while($row = mysqli_fetch_array($results))
{
   echo '<li><a href="'.$page_url_prefix.$row['page_uri'].'">'.substr($row['page_title'], 33).'</a></li>';
}
echo '</ul>';

//link to update page for admin
echo '<div class="update-button"><a href="update_pages.php">Update top pages list!</a></div>';
?>

<?php include 'inc/bodybackground.php'; ?>
	<?php get_footer(); ?>
</body>