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
$type='features';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'page'=>$paged
);
$my_query = null;
$my_query = new WP_Query( $args . '&paged=' . $paged ); 

if ( $my_query->have_posts() ) : ?>

<?php
// the loop
while ( $my_query->have_posts() ) : $my_query->the_post(); 
?>
<?php the_title(); ?>
<?php endwhile; ?>

<?php
// usage with max_num_pages
next_posts_link( 'Older Entries', $my_query->max_num_pages );
previous_posts_link( 'Newer Entries' );
?>

<?php 
// clean up after our query
wp_reset_postdata(); ?>
<?php else:  ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>