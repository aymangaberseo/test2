<?php get_header(); ?>



<?php

echo get_post_meta(78,'email',TRUE);
var_dump(get_post_meta(78));
// The Query
$query = new WP_Query( array(
        'category_name' => 'fun' ,
    	'order'     => 'ASC',
        'orderby'   => 'title',
        'posts_per_page' => '5',
        'offset' => '2',
)
        );

// The Loop
if ( $query->have_posts() ) {
	echo '<ul>';
	while ( $query->have_posts() ) {
		$query->the_post();
                
?>

                <div class="col-md-2">
                    <?php
                    if ( has_post_thumbnail() ) {
                        //set_post_thumbnail_size( '100px', '100px', false );
                        the_post_thumbnail('thumbnail');  

                    }
                    ?>
                </div>
        <div class="jumbotron">
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        </div>

<?php

}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


?>

















<!--    <?php query_posts('posts_per_page=2');
        while(have_posts()): the_post();  ?>
        <div class="jumbotron">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; wp_reset_query(); ?>
    
        <div class="panel panel-default panel-body">
            <div class="row">
    <?php get_sidebar() ?>
                
                <div class="col-md-2">
                    <?php while(have_posts()): the_post(); ?>
                        <?php if ( has_post_thumbnail() ) {
                            //set_post_thumbnail_size( '100px', '100px', false );
                            the_post_thumbnail('thumbnail');

                        } ?>
                    <?php endwhile; wp_reset_query(); ?>
                </div>
                
                <div class="col-md-8">
                    
                    <?php while(have_posts()): the_post(); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                        <p class="text-muted">Posted by <?php the_author(); ?> on <?php the_time('F jS, Y'); ?></p>
                    
                    <?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>-->

<?php get_footer(); ?>