<?php get_header(); ?>
<?php include("inc/snubbed-nav.php"); ?>

<div id="ChronSearch" class="inner">
	
	<div id="SearchTop" class="pop">
		<img src="<?php echo get_template_directory_uri(); ?>/images/cool/search.png" class="search"/>
		<div class="search-info">
			<h5 class="font12 normal sans-serif1">Searching the Chronicle Online database 2006-<?php echo date("Y"); ?> for articles, videos, and photos.</h5>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
	</div>
	<div id="SearchResults" class="pop">


	<?php /* Search Count */ 
	// set the "paged" parameter (use 'page' if the query is on a static front page)
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	
	$allsearch = new WP_Query("s=$s&showposts=-1"); 
	$key = wp_specialchars($s, 1); 
	$count = $allsearch->post_count; _e('');
	
	add_filter('user_search_columns', 'user_search_columns_bd' , 10, 3);
 
	function user_search_columns_bd($search_columns, $search, $this){
		//if(!in_array($search_columns, 'display_name')){
		if(!in_array('display_name', $search_columns)){
			$search_columns[] = 'display_name';
		}
		return $search_columns;
	}
	//You are a goddess Sabuj: http://manchumahara.com/2014/04/03/search-user-by-display-name-in-wordpress-sitewide/
	
	// Here is where the magic happens
	add_filter( 'get_meta_sql', 'user_meta_filter', 10, 6 );

	function user_meta_filter( $sql, $queries, $type, $primary_table, $primary_id_column, $context ){
	    // If it's not user forget it!
	    if ( $type !== 'user' ){
	        return $sql;
	    }

	    // Only if our variable is true then we will do the change
	    if ( ! isset( $context->query_vars['meta_query']['replace_and'] ) || $context->query_vars['meta_query']['replace_and'] !== true ){
	        return $sql;
	    }

	    //$sql['where'] = str_replace(') AND (', ') OR (', $sql['where']);
	    //$sql = str_replace_nth('AND', 'OR', $sql, 7);
	    //print_r($sql);
	    return $sql;
	}

	add_action('pre_user_query', 'my_custom_users_search');

	function my_custom_users_search( $args ) {
	    if( isset( $args->query_vars['meta_query']['replace_and'] ) && $args->query_vars['meta_query']['replace_and'] ){
	    	$string = $args->query_where;
	        $args->query_where = str_replace(") AND (", ") OR (", $string);
	    }

	    return $args;
	}
	
	function str_replace_nth($search, $replace, $subject, $nth)
	{
	    $found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
	    if (false !== $found && $found > $nth) {
	        return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
	    }
	    return $subject;
	}	


	$args = array(
	'search'         => $s,
	'search_columns' => array( 'user_login', 'user_email'),
	'meta_query' => array(
		'relation' => 'OR',
		'replace_and' => true, // Flag for the dark magic
		array(
			'key'     => 'first_name',
			'value'   => $s,
			'compare' => 'LIKE'
		),
		array(
			'key'     => 'last_name',
			'value'   => $s,
			'compare' => 'LIKE'
		)
	)
	);
	
	// The Query
	$user_query = new WP_User_Query( $args ); 
	//echo "wp_query:" .$GLOBALS['wp_query']->request;

	
	$count+= count($user_query);
	
	wp_reset_query(); 
	?>
	<h2 class="results-header sans-serif2 font18">Showing <?php echo $count; ?> results for <?php echo "'".$key."'"; ?>
	
	</h2>
		<?php if ( ! empty( $user_query->results ) && $paged == 1 ) :
			foreach ( $user_query->results as $user ) : ?>
				
			<div id="AuthorCenter" 
			<?php
			$key = 'currentSection';
			$section = strtolower(get_user_meta($user->ID, $key, TRUE));
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
			    		if(userphoto_exists($user->ID)){
				    		echo '<div class="author-thumb">';
					    	userphoto($user->ID); 
			    		echo '</div>';
		    		}

	    	?>
	    	<div class="author-info <?php if(userphoto_exists($user->ID)){echo "has-thumbnail"; } ?>">
	    	      <h3 class="directory"><a href="<?php echo site_url(); ?>/about#staff">View staff directory >></a></h3>
		   	    <h2><a href="<?php echo site_url(); ?>/staff/<?php echo $user->user_login ?>/"><?php echo $user->first_name.' '.$user->last_name; ?></a></h2>
	
			    <div class="sans-serif1 bold font14"><?php $key='currentPosition'; echo get_user_meta($user->ID, $key, TRUE); ?></div>
		    </div>
		    <div class="clear"></div>
		    <div class="author-description sans-serif1 font13">
		    	<?php 
		    	$key = 'description';
		    	echo get_user_meta($user->ID, $key, TRUE);
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
		<hr class="nonflair" />
		 <?php endforeach; endif; ?>
		 
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); $wp_query->in_the_loop = false;
?>

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
	
						<?php the_excerpt(); ?>
	
					</div>
				</div>
				<div class="clear"></div>
			</article>
			<hr class="nonflair" />

		<?php endwhile; ?>

		<?php wp_pagenavi(); ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>
	</div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/search.js"></script>
<?php include 'inc/bodybackground.php'; ?>
<?php get_footer(); ?>