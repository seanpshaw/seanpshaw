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
  </div>
  <h1><?php echo get_the_title(9); ?> </h1>
  <div class="row">
    <div class="content-left grid-8 centered scaffold">
      <div id="content-area" class="clearfix">
        <div id="post-entries">
          <?php if (have_posts()) : while (have_posts()) : the_post(); 
          if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
          <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <div class="meta clearfix">
              <h5 class="storytitle"><?php the_title(); ?></h5>
              <span class="blog-date"><?php the_time('F j, Y'); ?></span>
            </div>
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
  </div>
</div>