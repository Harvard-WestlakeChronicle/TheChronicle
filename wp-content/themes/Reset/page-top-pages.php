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
$results = $mysqli->query("SELECT page_uri, page_title, total_views FROM google_top_pages WHERE NOT ( page_uri = '/' ) AND NOT ( page_uri = '/sports/' ) AND NOT ( page_uri = '/features/' ) AND NOT ( page_uri = '/opinion/' ) AND NOT ( page_uri = '/news/' ) AND NOT ( page_uri = '/archives/' ) AND NOT ( page_uri = '/photo/' ) AND NOT ( page_uri = '/ae/' ) AND NOT ( page_uri = '/video/' ) AND NOT ( page_uri = '/launch/' ) AND page_uri NOT LIKE '%/about/%' AND page_uri NOT LIKE '%.php%' AND page_uri NOT LIKE '%/staff/%' AND page_uri NOT LIKE '%/issue/%' ORDER BY total_views DESC LIMIT 100");

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

<body class="search search-results logged-in admin-bar customize-support">

	<div id="ChronSearch" class="inner">
	<div id="SearchResults" class="pop" style="/*width: 100%;*/">

	<?php
	// the loop
	$x = 1;
	while($row = mysqli_fetch_array($results)) :
	?>
	<article >
					<div class="result-text" style="float: left;">
						<h2><?php echo '<a href="'.$page_url_prefix.$row['page_uri'].'">' . $x . '. ' . substr($row['page_title'], 33) . '</a>' ?></h2>					
					</div>
					<div class="clear"></div>
				</article>
				<hr class="nonflair" />
	<?php 
		$x++;
		endwhile; 	
		?>
	</div>		
	</div>
	
<?php include 'inc/bodybackground.php'; ?>
	<?php get_footer(); ?>
</body>