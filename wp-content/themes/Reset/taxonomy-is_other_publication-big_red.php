<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<header id="snubbed-header" class="pop extra ArchiveTop">
	<div id="SingleTop" class="issue inner">
		<div class="start">
			<a href="<?php echo home_url(); ?>/archives/"><img src="<?php bloginfo('template_directory'); ?>/images/cool/archives.png" id="announce"/></a>
		</div>

		<div class="issue-info">
			<h5 class="font16 bold">The Chronicle Print Archives 2006-<?php echo date("Y"); ?> for articles, videos, and photos.</h5>
			<p class="sans-serif1 font11">Digital versions of The Chronicle's Print Edition are available through Issuu, starting in 2008.  All articles in the Print Edition are also stored in the Archives Online Database.</p>
		</div>
	</div>
	<div id="fauxbottomborder"></div>	
</header>


<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

<div id="TaxBottom" class="inner issues bigred">
	<div id="tax-body" class="pop">
		<h2 class="font36 left">Big Red</h2>
		<div class="social right">
			<?php facebook_code_5(); ?>
			<?php twitter_code_1(); ?>
		</div>
		<div class="clear"></div>
		<div class="issue-area">
			
<?php

$args = array(
	'post_type' => 'issue',
	'post_count' => -1,
	'is_other_publication' => 'big_red'
);
$issue_query = new WP_Query( $args );

while($issue_query->have_posts()) { $issue_query->the_post();

	the_issue_box();
	
}
?>
		</div>
	</div>
</div>


<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>