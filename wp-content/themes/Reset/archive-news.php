<?php if ($paged < 1) : ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<?php $curmonth = curmonth(); $curyear = curyear(); ?>

<header id="snubbed-header" class="pop inner ArchiveTop news">
	<p id="small-header-lastupdated" class="gray uppercase">
		Last updated: 
		<span class="red">
			<?php last_updated(); ?>
		</span>
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/news.png" id="announce"/>
	<div id="ticker"  class="lowercase">
		<?php get_recent_tags("news"); ?>
	</div>
</header>

<!-- --------------------Check for importance posts------------------------ -->

<?php
	$poet = array();
	
	
		$query = new WP_Query(array( 'news_importance' => 'featured_issue_article', 'issue_month' => $curmonth, 'posts_per_page' => '4') );
		while($query->have_posts()) : $query->the_post();
		$poet[] = get_the_ID();
		endwhile;
		wp_reset_postdata();

	
?>
<div id="ArchiveBottom" class="inner news">
	<div class="firstbig pop">
		<div id="archive-showcase" class="showcase">
			<?php
				$query = new WP_Query(array( 'post_type' => 'news', 'news_importance' => 'section_slider', 'posts_per_page' => 4 ) );
				while($query->have_posts()) : $query->the_post();
					$poet[] = get_the_ID();
					$wp_query->in_the_loop = true;
			?>
			<div class="showcase-slide">
				<div class="showcase-content">
					<div class="showcase-content-wrapper">
						<?php
						if(has_post_thumbnail()){
							echo "<a href='";the_permalink();echo "'>";
							the_post_thumbnail("section-slider");
							echo "</a>";
						}	
						?>				
					</div>
					<div <?php post_class("showcase-caption"); ?>>
						<h2><?php the_full_title(); ?></h2>
						<div class="meta">
							<p class="mini gray uppercase">By <?php yo_author(); ?></p>
						</div>
						<div class="caption-excerpt sans-serif1 font10"><?php the_excerpt(); ?></div>
					</div>
				</div>
				<div class="showcase-thumbnail">
					<?php
						if(has_post_thumbnail()){
							the_post_thumbnail("thumbnail");
						}
					?>
					<div class="first-tag uppercase sans-serif1 bold font12"><?php echo get_post_meta(get_the_ID(), 'special_label', true); ?></div>
					<div class="showcase-thumbnail-cover"></div>
				</div>

			</div>
			<?php
				endwhile;
				wp_reset_postdata();
			?>
		</div>
	</div>
	<div id="updates" class="pop">
			<h4 class="nytimes">Latest News Updates</h4><ul>
				<?php
					$query = new WP_Query(array( 'post_type' => 'news', 'posts_per_page' => 6, 'post__not_in' => $poet ) );
					while($query->have_posts()) : $query->the_post();
						$poet[] = get_the_id();
						$wp_query->in_the_loop = true;
				?>
			<li><article>
				<div class="details">
					<p class="mini left gray uppercase"><?php echo first_tax_value(get_the_terms($post->ID, 'news_type')); ?></p>
					<p class="mini right red"><?php the_checked_date(); ?></p>
					<div class="clear"></div>
				</div>
				<p class="content-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>

			</article></li>
				<?php
					
					endwhile;
					wp_reset_postdata();
				?>
			</ul>
	</div>
	<div id="topnews" class="pop">
		<h4 class="usatoday uppercase news">Top News</h4>
		<div class="annoyingbar"></div>
		<div class="blank-bar"></div>
		<?php
			$count = 0;
			$query = new WP_Query(array( 'post_type' => 'news', 'news_importance' => 'top_news', 'posts_per_page' => '3' ) );
			while($query->have_posts()) : $query->the_post();
				$wp_query->in_the_loop = true;
		?>
		<article id="<?php the_ID(); ?>" <?php post_class(); ?>>
			<p class="title1"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
			<p class="left gray uppercase mini by">By <?php yo_author(); ?></p>
			<p class="right red mini by"><?php the_checked_date(); ?></p>
			<div class="clear"></div>
			<div class="entry-summary sans-serif1 small-excerpt"><?php the_excerpt(); ?></div>
		</article>
		<?php
			if($count < 2){
				$count++;
				echo '<hr class="nonflair" />';
			}
			endwhile;
			wp_reset_postdata();
		?>
	</div>
	<div id="indepth" class="pop">
		<h4 class="title3 uppercase">News | <span class="red"><?php the_issue_link($curmonth); just_tell_me($curmonth); ?></a></span></h4>
		<div id="indepth-showcase" class="showcase">
	<?php
		$query = new WP_Query(array( 'news_importance' => 'featured_issue_article', 'issue_month' => $curmonth, 'posts_per_page' => '4') );
		while($query->have_posts()) : $query->the_post();
		$wp_query->in_the_loop = false;
	?>
			<div class="showcase-slide">
				<div class="showcase-content">
					<div <?php post_class('showcase-content-wrapper'); ?>>
						<p class="title bold font16">
							<?php the_full_title(); ?>
						</p>
						<p class="mini gray uppercase">
							By <?php yo_author(); ?>
						</p>
						<div class="content sans-serif1 ex">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
	<?php
		endwhile;
		wp_reset_postdata();
	?>
		</div>

	</div>
	
	
	<div id="sectionvideo" class="pop">
		<h4 class="nytimes"><a href="<?php echo site_url(); ?>/video/">[ video ]</a></h4>
		<div class="colored clear">
			<div class="eins"></div>
			<div class="zwei"></div>
			<div class="drei"></div>
			<div class="vier"></div>
		</div>
		<?php
			section_video('news');
		?>
	</div>
<!-- 	OFFBEAT -->
	<div id="offbeat" class="pop">
		<h4 class="nytimes uppercase">Offbeat</h4>
		<?php offbeat('news', 'news_type', 'offbeat'); ?>
	</div>
	<div class="clear"></div>


<!-- 	NORWAY TRI START -->
	<div class="norway-tri">
<!-- 	THE QUAD -->
	<div id="thequad" class="pop archive-tri">
		<h4 class="usatoday uppercase news"><a class="whitelink" href="<?php echo site_url(); ?>/news_type/student_news">Student News</h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Student News</a></div>
		<?php section_tri('news', 'news_type', 'student_news') ?>
	</div>
	
<!-- 	UPPER SCHOOL -->
	<div id="upperschool" class="pop archive-tri">
		<h4 class="usatoday uppercase news"><a class="whitelink" href="<?php echo site_url(); ?>/news_type/upper_school">Upper School</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for Upper School News</a></div>
		<?php section_tri('news', 'news_type', 'upper_school'); ?>
	</div>
<!-- 	STUDENT/FACULTY -->
	<div id="studentfaculty" class="pop archive-tri">
		<h4 class="usatoday uppercase news"><a class="whitelink" href="<?php echo site_url(); ?>/news_type/faculty_news">Faculty News</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Faculty News</a></div>
		<?php section_tri('news', 'news_type', 'faculty_news'); ?>
	</div> 
<!-- End Norway -->
	<div class="clear"></div>
	
<!-- 	NORWAY TRI START -->
	<div class="norway-tri">
<!-- 	MIDDLE SCHOOL -->
	<div id="middleschool" class="pop archive-tri sans">
		<h4 class="usatoday uppercase news"><a class="whitelink" href="<?php echo site_url(); ?>/news_type/middle_school">Middle School News</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more News</a></div>
		<?php section_tri_sans('news', 'news_type', 'middle_school') ?>
	</div>
<!-- 	ALUMNI -->
	<div id="alumni" class="pop archive-tri sans">
		<h4 class="usatoday uppercase news"><a class="whitelink" href="<?php echo site_url(); ?>/news_type/alumni">Alumni News</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Alumni News</a></div>
		<?php section_tri_sans('news', 'news_type', 'alumni') ?>
	</div>
<!-- 	CONTACT -->
	<div id="contact" class="pop archive-tri sans">
		<a href="<?php echo site_url(); ?>/about/#contact"><h4 class="uppercase news">Contact Us</h4></a>
		<div class="first">
		  <a href="mailto:chronicle@hw.com">
			<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/404-logo.jpg"  />
			<div class="text">
				News Section
			</div>
			</a>
			<div class="clear"></div>
			<br>
			<div class="second">
    			<?php twitter_code_2(); ?>
            </div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="clear"></div>
</div>


<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.aw-showcase.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/archive.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/archive-news.js"></script>
<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>
<?php else: ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<div id="ChronSearch" class="inner">
	
    <header id="snubbed-header" class="pop inner ArchiveTop news">
	<p id="small-header-lastupdated" class="uppercase">
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/news.png" id="announce"/>
	</header>
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
<?php endif; ?>