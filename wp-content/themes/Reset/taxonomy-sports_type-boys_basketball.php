<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<div id="ChronSearch" class="inner">
	
	<div id="SearchTop" class="pop">
		<img src="<?php echo get_template_directory_uri(); ?>/images/cool/boysbasketball.png" class="search"/>
		<div class="search-info">
			<h5 class="font12 normal sans-serif1">
			Boys Basketball articles from 2006-<?php echo date("Y"); ?> </h5>
		</div>
	</div>
	<div class="pop">
	<div id="SearchResults">

	<h2 class="results-header sans-serif2 font18">Showing <?php echo $term->count; ?> results
	
	</h2>

		<?php if (have_posts()) : while (have_posts()) : the_post();?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<?php
						if(has_post_thumbnail()){
							echo '<div class="result-thumbnail">';
							the_full_title_1();
							echo the_post_thumbnail("thumbnail");
							echo '</a>';
							echo '</div>';
						}	
					?>
				<div class="result-text <?php if(has_post_thumbnail()) echo "has-thumbnail"; ?>">
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
	
						<?php if(!($post->post_excerpt=="")){the_excerpt();} ?>
	
					</div>
				</div>
				<div class="clear"></div>
			</article>
			<hr class="nonflair" />

		<?php endwhile; ?>


	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>
	</div>
	<?php wp_pagenavi(); ?>
	</div>
</div>

<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>