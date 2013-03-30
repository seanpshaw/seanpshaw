<div id="main-content" class="clearfix">
  <div id="featured-image-wrapper">
    <?php  query_posts( array('pagename' => 'who-we-are/news-calendar', 'posts_per_page' => 1) );  if (have_posts()) : while (have_posts()) : the_post(); 
      $page_for_posts = get_option('page_for_posts');
      global $wp_query;
      if ( $wp_query->is_posts_page &&
        has_post_thumbnail( $page_for_posts ) &&
        ( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'post-thumbnail', 'full' ) ) &&
        $image[1] >= 'HEADER_IMAGE_WIDTH' ) :
      echo get_the_post_thumbnail( $page_for_posts, 'post-thumbnail' );
      endif;
      endwhile; else: endif;  wp_reset_query(); 
    ?>
    <div id="overlay"></div>
  </div>
  <h1><?php echo get_the_title(15); ?> </h1>
  <div class="row">
    <div class="content-left grid-8 scaffold">
      <div id="content-area" class="clearfix">
        <h3>News & Announcements</h3>
        <div id="post-entries">
          <?php if (have_posts()) : while (have_posts()) : the_post(); 
          if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
          <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h5 class="storytitle"><?php the_title(); ?></h5>
            <span class="blog-date"><?php the_time('n.j.y'); ?></span>
            <div class="storycontent clearfix">
              <?php the_content(); ?>
            </div>
            
          </div>
          <?php endwhile; else: ?>
          <p>
            <?php _e('Sorry, no posts matched your criteria.'); ?>
          </p>
          <?php endif; ?>
        </div>

      </div>
    </div>
  
    <!-- begin sidebar -->
    <div id="sidebar-second-wrapper"  class="grid-4 scaffold">
      <div id="sidebar-second-inner">
        
        <h3>Calendar & Events</h3>
        <?php $loop = new WP_Query( array( 'post_type' => 'callouts', 'tag' => 'news-page', 'order' => 'ASC') );
            while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          <div id="post-<?php the_ID(); ?>">
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
    <!-- end sidebar -->
    <?php
      $posts = get_field('page_relationships'); // THIS IS FOR THE BOTTOM BUTTONS
      if( $posts ):  
    ?>
    <div class="big-button-section">
      <hr />
      <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT)
      setup_postdata($post);   
        the_content(); 
      endforeach; ?>
    </div>
    
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
    endif; 
  ?>
  </div>
</div>