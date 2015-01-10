<?php
/**
 * Template Name: Page of All Features
 *
 */
?>
<?php
// set the "paged" parameter (use 'page' if the query is on a static front page)
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

// the query
$type='ae';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'paged'=>$paged,
  'orderby'=>'post_date'
);
$my_query = null;
$my_query = new WP_Query( $args ); 
//$count = $my_query->post_count;
?>

<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<?php $curmonth = curmonth(); $curyear = curyear(); ?>

<header id="snubbed-header" class="pop inner ArchiveTop ae">
	<p id="small-header-lastupdated" class="uppercase">
		<?php just_tell_me($curmonth); ?> ISSUE
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/ae.png" id="announce"/>
	<p id="small-header-viewall" class="uppercase">
	</p>
	<div id="ticker">
		<?php get_recent_tags('ae'); ?>
	</div>
</header>

<body class="search search-results logged-in admin-bar customize-support">

	<div id="ChronSearch" class="inner">
	<div id="SearchResults" class="pop" style="/*width: 100%;*/">
	
	<?php if ( $my_query->have_posts() ) : ?>
	
	<?php
	// the loop
	while ( $my_query->have_posts() ) : $my_query->the_post(); 
	?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<?php
							if(has_post_thumbnail()){
								echo '<div class="result-thumbnail" style="float: left; display: inline-block;">';
								the_full_title_1();
								echo the_post_thumbnail("thumbnail");
								echo '</a>';
								echo '</div>';
							}	
						?>
					<div class="result-text <?php if(has_post_thumbnail()) echo "has-thumbnail"; ?>" style="float: left;">
						<h2><?php the_full_title(); ?></h2>
		
						<div class="meta">
							<div class="author mini uppercase gray sans-serif1 left">
							<?php
							if(get_post_type() != 'post') {
							?>
								By <?php yo_author();  ?>
							<?php
							}
							?>
							</div>
							<div class="date mini red sans-serif1 right">
								<?php the_checked_date(); ?>
							</div>
							<div class="clear"></div>
						</div>
		
						<div class="entry">
		
							<?php the_excerpt(); ?>
		
						</div>
					</div>
					<div class="clear"></div>
				</article>
				<hr class="nonflair" />
	<?php endwhile; ?>
	<?php wp_pagenavi( array( 'query' => $my_query ) ); ?>
	</div>
	
	<?php else:  ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;?>
	
	</div>
	
	<?php include 'inc/bodybackground.php'; ?>
	<?php get_footer(); ?>
</body>