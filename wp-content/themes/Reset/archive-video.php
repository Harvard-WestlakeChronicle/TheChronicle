<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<header class="dark-header tint">
    <div class="g-ytsubscribe" data-channel="hwchronicle" data-layout="full" data-theme="dark"></div>
	<img src="<?php bloginfo('template_directory'); ?>/images/cool/videos.png" id="announce" class="videos"/>
<!--
	<div class="info sans-serif1 font12">
		The Chronicle provides timely coverage of Harvard-Westlake student events including athletics and performing arts as well as profiles of individuals in the school community throughout the year.
	</div>
-->
	<div class="colored clear">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
		<div class="four"></div>
	</div>
	<style>
		.wp-pagenavi, .pages, .page, .nextpostslink
		{
			color: white;
		}
	</style>
</header>
<div id="ArchiveBottom" class="videos inner">
<?php
    
	if($wp_query->have_posts()) { $wp_query->the_post();
	$poet[] = get_the_ID();
	$wp_query->in_the_loop = true;
?>
	<div class="main pop tint">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<div class="entry-title bold sans-serif2 font36">
			<?php the_full_title(); ?>
		</div>
		<div class="posted sans-serif2 bold red font12">
			Posted <?php the_checked_mini_date(); ?>
		</div>
		<?php if($post->post_excerpt){ ?>
		<div class="entry-description sans-serif1">
			<?php the_excerpt(); ?>
		</div>
		<?php } ?>
	</div>
<?php
	}if($youtubeplaylist){ ?>
	
	<div class="clear"></div>
	
	<style>
	
	#ArchiveBottom.videos .main {
		width:auto;
		height:auto;
	}
	#ArchiveBottom.videos .main .entry-content :first-child{
		width:auto;
	}
	#ArchiveBottom.videos .main .entry-content .holderholder{
		width:auto !important;
	}
	#ArchiveBottom.videos .main .entry-content #yt_holder{
		width:950px !important;
	}
	#ArchiveBottom.videos .main .entry-content #yt_holder #ytvideo{
		width:auto !important;
	}
	#ArchiveBottom.videos .main .entry-content #yt_holder #ytvideoiframe{
		margin-top:36px;
	}
	</style>
	
	<?php ;}
	while($wp_query->have_posts()) { $wp_query->the_post();
?>
	<div class="video-box pop tint">
		<div class="entry-content">
			<?php the_full_title_1(); ?>
			<img src="<?php if(has_post_thumbnail()){$src = wp_get_attachment_image_src(get_post_thumbnail_id());echo $src[0];}else{video_thumbnail();} ?>" height="190" width="300" />
			<img id="overlay" src="<?php echo get_template_directory_uri(); ?>/images/playbutton.png" height="102" width="152">
			</a>
		</div>
		<div class="entry-title sans-serif2 font18 bold">
			<?php the_full_title(); ?>		
		</div>
		<div class="posted sans-serif2 bold red font12">
			Posted <?php the_checked_mini_date(); ?>
		</div>
	</div>
	<?php
	}
	?>
</div>
<div class="clear"></div>
<div class="navigation photopicker">
	<?php wp_pagenavi(); ?>
	</div>

<?php include 'inc/darkbackground.php'; ?>
<script>
var iframe = top.frames[I0_1383136946654].document;
var css = ''+'<style type="text/css">'+'.yt-username{color:#FFF!important;} </style>';
iframe.open();
iframe.write(css);
iframe.close();
</script>
<?php get_footer(); ?>