
 <head>
      <meta charset="UTF-8">
      <meta http-equiv="Refresh" content="5; <?php site_url() ?>?s=<?php echo $tag; ?>">
      <script language="javascript">
          window.location.href = <?php site_url() ?> + "?s="+<?php echo $tag; ?>;
      </script>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<div id="ChronSearch" class="inner" style="opaxi">
	<img id="loading" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" />
	<div id="SearchTop" class="pop">
		<img src="<?php echo get_template_directory_uri(); ?>/images/cool/search.png" class="search"/>
		<div class="search-info">
			<h5 class="font12 normal sans-serif1">Searching the Chronicle Online database 2006-<?php echo date("Y"); ?> for articles, videos, and photos.</h5>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
	</div>
	<div id="SearchResults" class="pop">


	
	</div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/search.js"></script>
<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>