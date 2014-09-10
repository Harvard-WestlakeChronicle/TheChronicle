<?php if ($paged < 1) : ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<?php $curmonth = curmonth(); $curyear = curyear(); ?>

<header id="snubbed-header" class="pop inner ArchiveTop sports">
	<p id="small-header-lastupdated" class="gray uppercase">
		Last updated: 
		<span class="red">
			<?php last_updated(); ?>
		</span>
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/sports.png" id="announce" class="sports"/>
	<div id="ticker" class="lowercase">
		<?php get_recent_tags('sports'); ?>
	</div>

</header>

<!-- --------------------Check for importance posts------------------------ -->

<?php
	$poet = array();
	
	
		$query = new WP_Query(array( 'sports_importance' => 'featured_issue_article', 'issue_month' => $curmonth, 'posts_per_page' => '4') );
		while($query->have_posts()) : $query->the_post();
		$poet[] = get_the_ID();
		endwhile;
		wp_reset_postdata();
	
	
?>
<div id="ArchiveBottom" class="inner sports">
	<div class="firstbig pop">
		<div id="archive-showcase" class="showcase">
			<?php
				$query = new WP_Query(array( 'post_type' => 'sports', 'sports_importance' => 'section_slider', 'posts_per_page' => 4 ) );
				$count = 0;
				while($query->have_posts()) : $query->the_post();
					$wp_query->in_the_loop = true;

			?>
			<div class="showcase-slide">
				<div class="showcase-content">
					<div class="showcase-content-wrapper">
						<?php the_full_title_1(); ?>
						<?php
						
						if(has_post_thumbnail()){
							the_post_thumbnail("section-slider");
						}
						else{echo "alt";}	
						?>
						</a>
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
			<h4 class="nytimes">Latest Sports Updates</h4><div class="list"><ul>
			<?php
				$query = new WP_Query(array( 'post_type' => 'sports', 'posts_per_page' => 6, 'post__not_in' => $poet  ) );
				while($query->have_posts()) : $query->the_post();
					$poet[] = get_the_id();
					$wp_query->in_the_loop = true;
			?>
		<li><article>
			<div class="details">
				<p class="mini left gray uppercase"><?php echo first_tax_value(get_the_terms($post->ID, 'sports_type')); ?></p>
				<p class="mini right red"><?php the_checked_date(); ?></p>
				<div class="clear"></div>
			</div>
			<p class="content-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
		</article></li>
			<?php
				endwhile;
				wp_reset_postdata();
			?>
			</ul></div>
	</div>
	<div id="topnews" class="pop">
		<h4 class="usatoday uppercase sports">Top Sports</h4>
		<div class="annoyingbar"></div>
		<div class="blank-bar"></div>
		<?php
			$count = 0;
			$query = new WP_Query(array( 'post_type' => 'sports', 'sports_importance' => 'top_sports', 'posts_per_page' => '3' ) );
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
		<h4 class="title3 uppercase">Sports | <span class="red"><?php the_issue_link($curmonth); just_tell_me($curmonth); ?></a></span></h4>
		<div id="indepth-showcase" class="showcase">
	<?php
		$query = new WP_Query(array( 'sports_importance' => 'featured_issue_article', 'issue_month' => $curmonth, 'posts_per_page' => '4') );
		while($query->have_posts()) : $query->the_post();
		$wp_query->in_the_loop = false;
		$poet[] = get_the_ID();
		
	?>
			<div class="showcase-slide">
				<div class="showcase-content">
					<div <?php post_class('showcase-content-wrapper'); ?>>
						<p class="title bold font18">
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
<!-- 	VIDEO -->
	<div id="sectionvideo" class="pop">
		<h4 class="nytimes"><a href="<?php echo site_url(); ?>/video/">[ video ]</a></h4>
		<div class="colored clear">
			<div class="eins"></div>
			<div class="zwei"></div>
			<div class="drei"></div>
			<div class="vier"></div>
		</div>
		<?php
			section_video('sports');		
		?>
	</div>
<!-- 	Q&A -->
	<div id="offbeat" class="pop">
		<h4 class="nytimes">Q&A</h4>
		<?php
			offbeat('sports', 'sports_importance', 'qa');
		?>
	</div>
	
	<?php
		if ($season == 'Fall'){
	 ?>
	
	<div id="football" class="sports-box first pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/football">Football</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/football">More Football News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('football'); ?>
	</div>
	<div id="fieldhockey" class="sports-box pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/field_hockey">Field Hockey</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/field_hockey">More News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('field_hockey'); ?>
	</div>
	<div class="sports-box wide pop">
		<h4 class="usatoday uppercase sports">More Sports</h4>
		<div class="annoyingbar"></div>
		<div class="blank-bar"></div>
		<?php
			more_sports();
		?>
	</div>
	<div class="clear"></div>
	<div id="XC" class="sports-box first pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/cross_country">Cross Country</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/cross_country">More XC News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('cross_country'); ?>
	</div>
	<div class="sports-box">
		<div id="girlvball" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_volleyball">Girls Volleyball</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_volleyball">More News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('girls_volleyball'); ?>	
		</div>
		<div id="ggolf" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_golf">Girls Golf</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_golf">More golf news</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('girls_golf'); ?>	
		</div>
	</div>
	<div class="sports-box">
		<div id="bwp" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys_water_polo">Boys Water Polo</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_water_polo">More News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('boys_water_polo'); ?>	
		</div>
		<div id="gtennis" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_tennis">Girls Tennis</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_tennis">More Tennis News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('girls_tennis'); ?>	
		</div>
	</div>
	<div class="sports-box contact pop">
		<h4>Sports Section</h4>
		<div class="first">
			<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/404-logo.jpg"  />
<!--
			<div class="text">
				<h5 class="sans-serif1">Sports Editors</h5>
				<div class="tres sans-serif1">
					<p>Michael Aronson '13</p>
					<p>Luke Holthouse '13</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="text2 sans-serif1">
				<h5 class="sans-serif1">Managing Editors</h5>
				<div class="tres sans-serif1">
					<p>Aaron Lyons '13</p>
					<p>Keane Muraoka-Robertson '13</p>
				</div>
				<a class="bold" href="">See all Sports Staff >></a>
			</div>
-->
			<div class="clear"></div>
			<div class="text3 sans-serif1">
				<p>
					Chronicle Sports aims to provide clear and consistent coverage of Harvard-Westlake athletic teams.
				</p>
			</div>
		</div>
		<hr class="nonflair" />
		<div class="second">
			<a class="bold font12 uppercase sans-serif2 link" href="<?php echo site_url(); ?>/about/#contact">Contact Us</a>
		</div>
		<div class="second">
		<?php twitter_code_2(); ?>
		</div>
	</div><?php 
	}
	
	else if($season == 'Winter'){ //boys & girls basketball & soccer, girls water polo, and wrestling 
	?>
	
	
	<div id="boys_soccer" class="sports-box first pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys_soccer">Boys Soccer</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">More Soccer News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('boys_soccer'); ?>
	</div>
	<div id="girlsoccer" class="sports-box pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_soccer">Girls Soccer</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">More Soccer News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('girls_soccer'); ?>
	</div>
	<div class="sports-box wide pop">
		<h4 class="usatoday uppercase sports">More Sports</h4>
		<div class="annoyingbar"></div>
		<div class="blank-bar"></div>
		<?php
			more_sports();
		?>
	</div>
	<div class="clear"></div>
	<div id="boys_basketball" class="sports-box first pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys_basketball">Boys Basketball</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_basketball">More News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('boys_basketball'); ?>
	</div>
	<div id="girls_basketball" class="sports-box pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_basketball">Girls Basketball</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_basketball">More News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('girls_basketball'); ?>	
	</div>
	<div class="sports-box">
		<div id="gwp" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_water_polo">Girls Water Polo</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_water_polo">More News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('girls_water_polo'); ?>	
		</div>
		<div id="boys_wrestling" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys_wrestling">Wrestling</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_wrestling">More Wrestling News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('boys_wrestling'); ?>	
		</div>
	</div>
	<div class="sports-box contact pop">
		<h4>Sports Section</h4>
		<div class="first">
			<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/404-logo.jpg"  />
<!--
			<div class="text">
				<h5 class="sans-serif1">Sports Editors</h5>
				<div class="tres sans-serif1">
					<p>Michael Aronson '13</p>
					<p>Luke Holthouse '13</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="text2 sans-serif1">
				<h5 class="sans-serif1">Managing Editors</h5>
				<div class="tres sans-serif1">
					<p>Aaron Lyons '13</p>
					<p>Keane Muraoka-Robertson '13</p>
				</div>
				<a class="bold" href="">See all Sports Staff >></a>
			</div>
-->
			<div class="clear"></div>
			<div class="text3 sans-serif1">
				<p>
					Chronicle Sports aims to provide clear and consistent coverage of Harvard-Westlake athletic teams.
				</p>
			</div>
		</div>
		<hr class="nonflair" />
		<div class="second">
			<a class="bold font12 uppercase sans-serif2 link" href="<?php echo site_url(); ?>/about/#contact">Contact Us</a>
		</div>
		<div class="second">
		<?php twitter_code_2(); ?>
		</div>
	</div>
	
	
	<?php } else{ ?>
	
	<div id="bgolf" class="sports-box first pop">
		<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys-golf-2">Boys Golf</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">More Golf News</a></div>
		<div class="blank-bar"></div>
		<?php sports_box('boys-golf-2'); ?>
	</div>
	<div class="sports-box">	
		<div id="baseball" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/baseball-3">Baseball</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">More Baseball News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box('baseball-3'); ?>
		</div>
		<div id="bvb" class="sports-box short pop">
				<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys-volleyball-2">Boys Volleyball</a></h4>
				<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_basketball">More News</a></div>
				<div class="blank-bar"></div>
				<?php sports_box('boys-volleyball-2'); ?>
		</div>
	</div>
	<div class="sports-box wide pop">
		<h4 class="usatoday uppercase sports">More Sports</h4>
		<div class="annoyingbar"></div>
		<div class="blank-bar"></div>
		<?php
			more_sports();
		?>
	</div>
	<div class="clear"></div>
	<div class="sports-box first">	
		<div id="swimming" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/swimming">Swimming</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_basketball">More Swimming News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box('swimming'); ?>
		</div>
		<div id="lacrosse" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/lacrosse-2">Lacrosse</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_basketball">More Lacrosse News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box('lacrosse-2'); ?>
		</div>
	</div>
	<div class="sports-box">
		<div id="btennis" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/boys-tennis-2">Boys Tennis</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_basketball">More Tennis News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box('boys-tennis-2'); ?>	
		</div>
		<div id="trackfield" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/track_field">Track and Field</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_wrestling">More News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('track_field'); ?>	
		</div>
	</div>
	<div class="sports-box">
		<div id="gwp" class="sports-box first short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/girls_water_polo">Girls Water Polo</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/girls_water_polo">More News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('girls_water_polo'); ?>	
		</div>
		<div id="softball" class="sports-box short pop">
			<h4 class="usatoday uppercase sports"><a class="whitelink" href="<?php echo site_url(); ?>/sports_type/softball_2">Softball</a></h4>
			<div class="annoyingbar moveable uppercase"><a href="<?php echo site_url(); ?>/sports_type/boys_wrestling">More Softball News</a></div>
			<div class="blank-bar"></div>
			<?php sports_box_short('softball_2'); ?>	
		</div>
	</div>
	<div class="sports-box contact pop">
		<h4>Sports Section</h4>
		<div class="first">
			<img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/404-logo.jpg"  />
<!--
			<div class="text">
				<h5 class="sans-serif1">Sports Editors</h5>
				<div class="tres sans-serif1">
					<p>Michael Aronson '13</p>
					<p>Luke Holthouse '13</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="text2 sans-serif1">
				<h5 class="sans-serif1">Managing Editors</h5>
				<div class="tres sans-serif1">
					<p>Aaron Lyons '13</p>
					<p>Keane Muraoka-Robertson '13</p>
				</div>
				<a class="bold" href="">See all Sports Staff >></a>
			</div>
-->
			<div class="clear"></div>
			<div class="text3 sans-serif1">
				<p>
					Chronicle Sports aims to provide clear and consistent coverage of Harvard-Westlake athletic teams.
				</p>
			</div>
		</div>
		<hr class="nonflair" />
		<div class="second">
			<a class="bold font12 uppercase sans-serif2 link" href="<?php echo site_url(); ?>/about/#contact">Contact Us</a>
		</div>
		<div class="second">
		<?php twitter_code_2(); ?>
		</div>
	</div>
	
	<?php } ?>
	
	
	
	<div class="clear">
	
	</div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.aw-showcase.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/archive.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/archive-sports.js"></script>
<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>
<?php else: ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<div id="ChronSearch" class="inner">
	
	<header id="snubbed-header" class="pop inner ArchiveTop sports">
	<p id="small-header-lastupdated" class="uppercase">
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/sports.png" id="announce"/>
	</header>	<div class="pop">
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