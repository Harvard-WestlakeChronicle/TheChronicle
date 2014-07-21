<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>
<div id="Author">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
	
	<div id="AuthorCenter" 
	<?php 
	$key = 'currentSection';
	$section = strtolower(get_user_meta($curauth->ID, $key, TRUE));
	if($section == 'opinion'){
    	?>class="inner pop opinion"><?php
	}elseif($section == 'ae'){
    	?>class="inner pop ae"><?php
	}elseif($section == 'features'){
    	?>class="inner pop features"><?php
	}elseif($section == 'sports'){
    	?>class="inner pop sports"><?php
	}elseif($section == 'news'){
    	?>class="inner pop news"><?php
	}else{
    	?>class="inner pop allChron"> <div class="wrapper"><?php } ?>
	    	<?php
	    		if(userphoto_exists($curauth->ID)){
		    		echo '<div class="author-thumb">';
			    	userphoto($curauth->ID); 
	    		echo '</div>';
    		}

	    	?>
	    	<div class="author-info <?php if(userphoto_exists($curauth->ID)){echo "has-thumbnail"; } ?>">
	    	      <h3 class="directory"><a href="<?php echo site_url(); ?>/about#staff">View staff directory >></a></h3>
		   	    <h2><?php echo $curauth->first_name.' '.$curauth->last_name; ?></h2>
	
			    <div class="sans-serif1 bold font14"><?php $key='currentPosition'; echo get_user_meta($curauth->ID, $key, TRUE); ?></div>
		    </div>
		    <div class="clear"></div>
		    <div class="author-description sans-serif1 font13">
		    	<?php 
		    	$key = 'description';
		    	echo get_user_meta($curauth->ID, $key, TRUE);
		    	 ?>
		    </div>
		    <?php if($section == null){ ?>
		      </div>
		      <div class="colored clear">
        		<div class="one"></div>
        		<div class="two"></div>
        		<div class="three"></div>
        		<div class="four"></div>
    		</div>
    		<?php } ?>
		</div>
	
	<div id="AuthorRecent" class="pop">



    <h2 class="uppercase sans-serif1 font18">Recent articles/photos/videos</h2>

    <ul>
<!-- The Loop -->

	<?php
	    $current_author = $curauth->ID;
		while($wp_query->have_posts()) : $wp_query->the_post();
			$wp_query->in_the_loop = true;
	?>
        <article class="<?php echo $post->post_type ?>">
			<?php
			    if($post->post_type =="video" or $post->post_type =="photo"){ ?>
			     <div class ="AuthorMultimedia">
			         <div class="uno each""></div>
			         <div class="dos each"></div>
			         <div class="tres each"></div>
			         <div class="quatro each"></div>
			     </div>
			     <?php }
				if(has_post_thumbnail()){
					echo '<div class="result-thumbnail">';
					the_full_title_1();
					echo yo_post_thumbnail("thumbnail");
					echo '</a>';
					echo '</div>';
				}	
			?>
   			<div class="article-text <?php if(has_post_thumbnail()){ echo "has-thumbnail";} ?>">
	            <h2><?php the_full_title(); ?></h2>
	            <div class="meta">
	            	<div class="gray mini uppercase sans-serif1 left">By <?php yo_author(); ?></div>
	            	<div class="red mini uppercase sans-serif1 right"><?php the_checked_date(); ?></div>
	            	<div class="clear"></div>
	            </div>
	            <div class="entry-description sans-serif1 font12">
	            	<?php if(!($post->post_excerpt=="")){the_excerpt();} ?>
	            </div>
            </div>
            <div class="clear"></div>
        </article>
        <hr class="nonflair"/>
    <?php endwhile; ?>

<!-- End Loop -->
    <?php wp_pagenavi(); ?>
    </ul>



	</div>
	<div class="clear"></div>
</div>

<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>