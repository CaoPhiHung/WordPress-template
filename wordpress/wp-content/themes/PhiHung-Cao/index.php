<?php
// var_dump( get_template_directory_uri());
// require('./lib/page-function.php');

 get_header(); 

 $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
 ?>
 <div class="wrapper">
   <div class="primary-content">
 
     <?php if ( !empty( $term->description ) ): ?>
     <div class="archive-description">
       <?php echo esc_html($term->description); ?>
     </div>
     <?php endif; ?>
 
     <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
 
     <div id="post-<?php the_ID(); ?>" <?php post_class('post clearfix'); ?>>
       <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
       <div>
         <div style="text-align: center">
           <p><?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?></p>
         </div><!--// end .post-info -->
         <div class="entry">
           <?php the_content( __('Full story…') ); ?>
         </div>
       </div>
     </div><!--// end #post-XX -->
 
     <?php endwhile; ?>
 
     <div class="navigation clearfix">
       <div class="alignleft"><?php next_posts_link('« Previous Entries') ?></div>
       <div class="alignright"><?php previous_posts_link('Next Entries »') ?></div>
     </div>
 
     <?php else: ?>
 
     <h2 class="post-title">No News in <?php echo apply_filters( 'the_title', $term->name ); ?></h2>
     <div class="content clearfix">
       <div class="entry">
         <p>It seems there isn't anything happening in <strong><?php echo apply_filters( 'the_title', $term->name ); ?></strong> right now. Check back later, something is bound to happen soon.</p>
       </div>
     </div>
 
     <?php endif; ?>
   </div><!--// end .primary-content -->


 <?php get_footer(); 
 ?>