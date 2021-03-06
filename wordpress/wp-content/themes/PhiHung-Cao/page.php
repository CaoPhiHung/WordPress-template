<?php get_header(); ?>
    
      <?php 
            $pagename = get_query_var('pagename');
            
            //all post page only
            if($pagename == "all-posts"){
            // the query
            
            ?><div><h2>Coop Course with other institution<h2></div><?php
            
            $wpb_all_query = new WP_Query(array('post_type'=>'courses', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
            <?php if ( $wpb_all_query->have_posts() ) : ?>
            
            
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>
            <!-- end of the loop -->
            
            
            <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            <?php 
            // the query
            ?><hr><div><h2>Other Course<h2></div><?php
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
            <?php if ( $wpb_all_query->have_posts() ) : ?>
            
            
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
            <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>
            <!-- end of the loop -->
            
            
            <?php wp_reset_postdata(); ?>
            
            <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <?php
            $terms = get_terms([
                  'taxonomy' => 'location',
                  'hide_empty' => false,
              ]);
            foreach($terms as $term){
                  // var_dump($term);
                  show_custom_location_taxonomy($term);
            }
            ?>
            

           <?php } else {?>
           <!-- other pages -->
           <?php
			while ( have_posts() ) : the_post();

                  get_template_part( 'content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
            }
            
            function show_custom_location_taxonomy($term){ 
                  
                  $locations_query = new WP_Query( array(
                        'post_type' => 'courses',
                        'posts_per_page' => 10,
                        'tax_query' => array(
                        array(
                              'taxonomy' => 'location',
                              'field' => 'id',
                              'terms' => $term->term_id
                        )
                        )
                        ) );
                        // Display the custom loop
                        if ( $locations_query->have_posts() ): ?>
            
                        <h2>Courses opened in <?php echo $term->name; ?></h2>
                        <ul class="postlist">
                        <?php while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> – <span class="date"><?php the_time(get_option('date_format')); ?></span>  </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        </ul><!--// end .postlist -->
                        <?php endif; ?>
           <?php }
            ?>
            
      </div>
   </div>
   <!-- div class 4 close -->
</div>
<!-- div row 2 end -->

</script>
<?php
 get_footer(); 
 ?>