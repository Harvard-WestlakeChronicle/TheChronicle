<?php if ($paged < 1) : ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<?php $curmonth = curmonth(); $curyear = curyear(); ?>

<header id="snubbed-header" class="pop inner ArchiveTop opinion">
	<p id="small-header-lastupdated" class="uppercase">
		<?php just_tell_me($curmonth); ?> ISSUE
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/opinion.png" id="announce"/>
	<div id="ticker">
		<?php get_recent_tags('opinion'); ?>
	</div>

</header>

<!-- --------------------Check for importance posts------------------------ -->

<?php
	$poet = array();
?>
<div id="ArchiveBottom" class="inner opinion">
	<div class="firstbig pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/editorial">Editorial</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Editorials</a></div>
	<?php
		$query = new WP_Query(array( 'post_type' => 'opinion', 'issue_month' => $curmonth, 'posts_per_page' => 1, 'opinion_type' => "editorial",'meta_key' => '_thumbnail_id' ) );
		if($query->found_posts ==0){
		$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => 3, 'opinion_type' => "editorial" ) );
		while($query->have_posts()) { $query->the_post();
		echo "<br><br>";
			?>
		<div class="main-opinion">
			<p class="left mini uppercase sans-serif1 bold">EDITORIAL</p>
			<div class="clear"></div>
			<article>
				<p class="font30 main-title bold"><?php the_full_title(); ?></p>
				<div class="sans-serif1 font12"><?php the_excerpt(); ?></div>
			</article>
		</div>
	<?php
		}}else{
		if($query->have_posts()) { $query->the_post();
		if(has_post_thumbnail()){
		
	?>
		<div id="drawing1">
			<?php
				if(has_post_thumbnail()){
					echo '<a title="';the_title_attribute();echo '" href="';the_permalink();echo '">';
					echo yo_post_thumbnail("section-slider", get_the_ID());
					echo '</a>';
				}
			?>		</div>
			<?php 
				}else{echo "<br><br>";}
			?>
		<div class="main-opinion">
			<p class="left mini uppercase sans-serif1 bold">EDITORIAL</p>
			<div class="clear"></div>
			<article>
				<p class="font30 main-title bold"><?php the_full_title(); ?></p>
				<div class="sans-serif1 font12"><?php the_excerpt(); ?></div>
			</article>
		</div>
	<?php
		}}
	?>
	 </div> <!-- closes the first div box -->
		
		
		 <!-- The very first "if" tested fto see if there were any Posts to -->
		 <!-- display.  This "else" part tells what do if there weren't any. -->
	<div class="poll pop">
		<h4 class="usatoday opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/poll">Poll</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more polls</a></div>
		<div id="showcase" class="showcase">
		        <!-- Each child div in #showcase represents a slide -->
		        <div class="showcase-slide">
		                <!-- Put the slide content in a div with the class .showcase-content -->
		                <div class="showcase-content">
		                        <div class="showcase-content-wrapper">
		                        
		                        
		                        	<?php
		                        		$num = 0;
										$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => 12, 'opinion_type' => "poll"));
										while($query->have_posts()) { $query->the_post();
										$num++;
										$poet[] = get_the_ID();
										$wp_query->in_the_loop = true;
									?>
									
									<?php
										if($num % 3 == 1 && $num != 1){
										?>
		                        </div>
		                </div>
		        </div>
		        <div class="showcase-slide">
		                <!-- Put the slide content in a div with the class .showcase-content -->
		                <div class="showcase-content">
		                        <div class="showcase-content-wrapper">
										<?php
										}
									?>
		                                <a class="poll-item <?php echo ($num%3 == 0) ? 'third' : ''; ?>" href="<?=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>">
		                                	<?php the_post_thumbnail();?>
		                                	<div class="text">
		                                		<div class="title"><?php the_title(); ?></div>
		                                		<div class="date gray mini uppercase"><?php the_checked_date(); ?></div>
		                                	</div>
		                                	<div class="clear"></div>
		                                </a>
		                                <?php
		                                }
		                                ?>
		                        </div>
		                </div>
		        </div>
		</div>
		<div id="tstoneremix">
			The Chronicle polls all Upper School students in a survey sent out by email every month on relevant and timely issues affecting the school community
		</div>
	</div>
	<div class="clear"></div>
	
<!-- COLUMNS -->
	<div class="columns pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/column">Columns</a></h4>
				<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Columns</a></div>

	<?php
	   $query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => -1, 'issue_month' => $curmonth, 'opinion_type' => "guest_column"));
	   $column = array(0, $query->found_posts + $amount);
		$query = new WP_Query(array( 'post_type' => 'opinion', 'issue_month' => $curmonth, 'posts_per_page' => 0, 'opinion_type' => "column", 'meta_key' => '_thumbnail_id'));
		if($query->have_posts()) { $query->the_post();
		$poet[] = get_the_ID();
		$column[0] = -2;
	?>
		<div id="drawing2">
			<?php
				if(has_post_thumbnail()){
					echo '<a title="';the_title_attribute();echo '" href="';the_permalink();echo '">';
					echo yo_post_thumbnail("thumbnail", get_the_ID());
					echo '</a>';
				}else{
					echo "<br/>";
				}
			?>		</div>
		<div class="opinion-column">
			<div class="mini-profile left">
				<?php
					$i = new CoAuthorsIterator();
					$i->iterate();
				?>
				<a href=<?php the_permalink(); ?>><?php userphoto_the_author_photo(); ?></a>
			</div>
			<article class="right column-article">
				<p class="font20 bold"><?php the_full_title(); ?></p>
				<p class="uppercase gray mini left">By <?php yo_author(); ?></p>
				<div class="clear"></div>
				<div class="sans-serif1 font12"><?php the_excerpt(); ?></div>
			</article>
			<div class="clear"></div>
		</div>
	<?php
		}
	    $column[1] = $column[1] + $column[0];
		$query = new WP_Query(array( 'post_type' => 'opinion', 'issue_month' => $curmonth, 'posts_per_page' => $column[1], 'opinion_type' => "column", 'post__not_in' => $poet));
		while($query->have_posts() && $column[1] > 0) { $query->the_post();
		$poet[] = get_the_ID();
		$wp_query->in_the_loop = true;
	?>
		<hr>
		<div class="opinion-column">
			<div class="mini-profile left">
				<?php
					$i = new CoAuthorsIterator();
					$i->iterate();
				?>
				<a href=<?php the_permalink(); ?>><?php userphoto_the_author_photo(); ?></a>
			</div>
			<article class="right column-article">
				<p class="font20 bold"><?php the_full_title(); ?></p>
				<p class="uppercase gray mini left">By <?php the_author_posts_link(); ?></p>
				<div class="clear"></div>
				<div class="sans-serif1 font12 "><?php the_excerpt(); ?></div>
			</article>
			<div class="clear"></div>
		</div>
	<?php }?>
	</div>
	
	<?php/* <div class="blog pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/blog">Blog</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more Blogs</a></div>
		<?php
			opinion_blog();
		?>
	</div>*/?>
<?php if($type == 'Letter'){ ?>
<!-- 	LETTERS -->
	<div class="letters editor pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/letter">Letters to the editor</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more letters</a></div>

	<?php
		$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => $amount, 'opinion_type' => "letter"));
		while($query->have_posts()) { $query->the_post();
		$poet[] = get_the_ID();
		$wp_query->in_the_loop = true;
	?>
		<div class="opinion-letter">
			<article class="letter-article expandable">
				<p class="font20 bold"><?php the_full_title(); ?></p>
				<p class="uppercase gray mini left">From <?php echo get_post_meta(get_the_ID(), 'letter_from', true); ?></p>
				<div class="clear"></div>
				<div class="sans-serif1 font12"><?php the_excerpt(); ?></div>
			</article>
		</div>
	<?php
		}
	?>
	</div>
	<?php }else{ ?>
	<!-- 	BLOG -->
	<div class="blog pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/blog">Blog</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more blog posts</a></div>

	<?php
		$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => $amount, 'opinion_type' => "blog"));
		while($query->have_posts()) { $query->the_post();
		$poet[] = get_the_ID();
		$wp_query->in_the_loop = true;
	?>
		<div class="opinion-column">
			<div class="mini-profile left">
				<?php
					$i = new CoAuthorsIterator();
					$i->iterate();
				?>
				<a href=<?php the_permalink(); ?>><?php userphoto_the_author_photo(); ?></a>
			</div>
			<article class="blog-article">
				<p class="font20 bold"><?php the_full_title(); ?></p>
				<p class="uppercase gray mini left">By <?php the_author_posts_link(); ?></p>
				<div class="clear"></div>
				<div class="sans-serif1 font12 "><?php the_excerpt(); ?></div>
			</article>
			<div class="clear"></div>
		</div>
	<?php }?>
	</div>
	<?php } ?>
	<div class="guest letters pop">
		<h4 class="usatoday uppercase opinion"><a class="whitelink" href="<?php echo site_url(); ?>/opinion_type/guest_column">Guest Columns</a></h4>
		<div class="annoyingbar moveable uppercase"><a href="javascript:void(0);">Click for more guest columns</a></div>

	<?php
		$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => -1, 'issue_month' => $curmonth, 'opinion_type' => "guest_column"));
		if($query == 0){
			$query = new WP_Query(array( 'post_type' => 'opinion', 'posts_per_page' => 2, 'opinion_type' => "guest_column"));
		}
		while($query->have_posts()) { $query->the_post();
		$poet[] = get_the_ID();
		$wp_query->in_the_loop = true;
	?>
		<div class="opinion-letter">
			<article class="letter-article expandable">
				<p class="font20 bold"><?php the_full_title(); ?></p>
				<p class="uppercase gray mini left">From <?php echo get_post_meta(get_the_ID(), 'letter_from', true); ?></p>
				<div class="clear"></div>
				<div class="sans-serif1 font12"><?php the_excerpt(); ?></div>
			</article>
		</div>
	<?php
		}
	?>
	</div>
	<div class="clear"></div>
	
<!-- 	MORE COLUMNS -->
	<div class="more-columns pop">
		<h4 class="usatoday uppercase opinion">More Columns</h4>
		<div class="annoyingbar"></div>
		<div class="left more-column big">
	<?php
	if($column[1] == 2){
		
		opinion_column($curmonth, 1);
		?>
		</div>
		<div class="right more-column">
	<?php
		opinion_column($curmonth, 1)
	?>
	</div>
	<?php
	}
	else if($column[1] == 3){
		
		opinion_column($curmonth, 2);
		?>
		</div>
		<div class="right more-column">
	<?php
		opinion_column($curmonth, 1)
	?>
	</div>
	<?php
	}
	else{
		opinion_column($curmonth, 2);
	?>
		</div>
		<div class="right more-column">
	<?php
		opinion_column($curmonth, 2)
	?>
	</div>
	<?php } ?>
	<div class="clear"></div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.aw-showcase.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/archive-opinion.js"></script>
<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>
<?php else: ?>
<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<div id="ChronSearch" class="inner">
	
	<header id="snubbed-header" class="pop inner ArchiveTop opinion">
	<p id="small-header-lastupdated" class="uppercase">
	</p>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/opinion.png" id="announce"/>
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