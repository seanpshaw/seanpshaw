<?php function scm_favicon() { ?>
  <link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory'); ?>/inc/images/favicon.ico" type="image/x-icon" />
  <link href='http://fonts.googleapis.com/css?family=Inika:400,700' rel='stylesheet' type='text/css'>
<?php }

add_action('wp_head', 'scm_favicon');

?>
<?php function scm_before_page_content() { ?>
<?php } ?>
<?php function scm_logo_and_nav() { ?>

  <div id="header-wrapper" class="container">
    <header class="row clearfix">
      <div id="header-left" class="grid-6 scaffold clearfix">
        <div id="logo">
          <a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/inc/images/logo.png" alt="Home"></a>
        </div>
      </div>

      <div id="header-right" class="grid-6 scaffold">
        <div id="slogan">
          <?php the_field('slogan', 'option'); ?>
        </div>
      </div>

      <div id="primary-navigation-wrapper">
        <nav><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?></nav>
      </div>
    </header>
  </div>

<?php } ?>
<?php function scm_main_class_filter() {
  echo "main-wrapper";
} ?>
<?php function scm_loop_page_content() { ?>

  <?php if (is_front_page() ) { ?>
    <section id="featured-content" class="container hide-on-phones">
      <div id="top-container" class="row">          
        <div id="featured">
          <?php SliderContent(); ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php if (!is_front_page() ) { ?>
    <section id="featured-content" class="container hide-on-phones">
      <div id="top-container" class="row">          
        <div id="featured">
          <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <div id="main-content" class="container">
    <div id="content" class="row clearfix">
      <?php if (is_front_page() ) { ?>
        <div class="prev">Prev</div>
        <ul id="mini-banners"> 
          <?php $i=0; ?>
          <?php $loop = new WP_Query( array( 'post_type' => 'minibanners', 'posts_per_page' => -1, 'order' => 'ASC') ); 
              while ( $loop->have_posts() ) : $loop->the_post();
          ?>
            <?php $i++; ?>
            <li class="mini-banner">
              <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
              <div id="banner-<?php echo $i; ?>" class="banner-text"><?php the_content(); ?></div>
            </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <div class="next">Next</div>
      <?php } ?>
      <?php if (!is_front_page() ) { ?>
        <div id="content-inner">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
          
          <?php $posts = get_field('accordion_relationship');
          if( $posts ): ?>
            <div id="accordion-section" class="accordion">
              <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                <h3><?php the_field('accordion_title', $post->ID); ?></h3>
                <div class="accordion-inner"><?php the_content(); ?></div>
              <?php endforeach; ?>
            </div>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>
        </div>
      <?php } ?>

    </div>

  </div>
<?php } ?>
<?php function scm_should_this_get_sidebar() {
  echo " ";
} ?>
<?php function scm_before_footer() { ?>
<?php } ?>
<?php function scm_footer() { ?>

  <div id="footer-wrapper" class="container clearfix">
    <footer class="row">
      <div id="footer-left" class="grid-9 scaffold">
        <div class="inner">
          <?php wp_nav_menu( array( 'items_wrap' => '<ul>%3$s</ul>','theme_location' => 'footer' ) ); ?> 
          <a class="footer-link" href="<?php the_field('footer_link_one', 'option'); ?>"><?php the_field('footer_link_one', 'option'); ?></a>
          <a class="footer-link-two" href="<?php the_field('footer_link_two', 'option'); ?>"><?php the_field('footer_link_two', 'option'); ?></a>
          <div class="copyright">Copyright &#169; 2013 Dr. He Spa. All rights reserved. <span><a href="/privacy-policy">Privacy Policy</a>.</span></div>
        </div>
      </div>

      <div id="footer-right" class="grid-3 scaffold">
        <div id="links">
          <a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank" class="facebook">Facebook</a>
          <a href="<?php the_field('twitter_link', 'option'); ?>" target="_blank" class="twitter">Twitter</a>
          <a href="<?php the_field('google_link', 'option'); ?>" target="_blank" class="google">Google+</a>
          <a href="<?php the_field('youtube_link', 'option'); ?>" target="_blank" class="youtube">YouTube</a>
        </div>
      </div>
    </footer>
  </div>


<?php } ?>
<?php function scm_after_footer() { ?>
<?php } ?>