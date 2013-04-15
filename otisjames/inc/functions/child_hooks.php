<?php function scm_head() { ?>
  <link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory'); ?>/inc/images/favicon.ico" type="image/x-icon" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,300,400,700,800|Alegreya:400,700' rel='stylesheet' type='text/css'>
<?php }

add_action('wp_head', 'scm_head');

?>
<?php function scm_before_page_content() {
  echo " ";
} ?>
<?php function scm_logo_and_nav() { ?>

  <div id="header-wrapper">
    <header class="row clearfix">
      <div id="logo">
        <a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/inc/images/logo.png" alt="Home"></a>
      </div>
      <nav><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?></nav>
    </header>
  </div>

<?php } ?>
<?php function scm_main_class_filter() {
  echo " ";
} ?>
<?php function scm_loop_page_content() { ?>

  <div id="main-content" class="clearfix">

    <div id="content" class="container">
      <div id="content-inner" class="row">
        
        <?php if (!is_front_page() ) { ?>
          <div id="featured-image-wrapper">
            <?php if(has_post_thumbnail()) {
              the_post_thumbnail(); 
            } ?>
          </div>
        <?php } ?>

        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>

        <?php if (is_page(array(11, 'testimonials'))) { ?>
          <div id="testimonials-wrapper">
            <?php $i = 0; ?>
            <?php $loop = new WP_Query( array( 'post_type' => 'testimonials', 'tag' => 'featured', 'posts_per_page' => -1, 'order' => 'ASC') );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <?php $i++; ?>
            <div id="post-<?php the_ID(); ?>" class="testimonial<?php if ($i % 2 == 0) { echo " last"; } ?>">
              <?php the_content(); ?>
              <h3 class="testimonial-title"><?php the_title(); ?></h3>
            </div>
            <?php endwhile; ?>
            <a href="#" class="archive-link">View All Testimonials</a> 
          </div>
        <?php } ?>
      </div>
    </div>

  </div>
<?php } ?>
<?php function scm_should_this_get_sidebar() {
  /* I FORGOT THE DOCUMENTATION HERE. NEED TO POST IT IN THE BASE TEMPLATE */
  echo " ";
} ?>
<?php function scm_before_footer() { ?>

<?php } ?>
<?php function scm_footer() { ?>
  <div id="footer-wrapper">
  <?php  if ( function_exists( 'ot_get_option' ) ) {
      $address  = ot_get_option( 'address' );
      $facebook_link = ot_get_option( 'facebook_link' );
      $twitter_link  = ot_get_option( 'twitter_link' );
      $email_link  = ot_get_option( 'email_link' );
    } ?>
    <footer class="row">
      <div id="footer-left" class="grid-2 scaffold footer-module">
        <h5>More Info:</h5>
        <nav><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'footer' ) ); ?></nav>
      </div>

      <div id="" class="grid-2 scaffold footer-module">
        <h5>Find Us:</h5>
        <?php echo $address; ?>
      </div>

      <div id="" class="grid-3 scaffold footer-module">
        <h5>Connect:</h5>
        <div id="links">
          <a href="<?php echo $facebook_link; ?>" target="_blank" class="facebook">Facebook</a>
          <a href="<?php echo $twitter_link; ?>" target="_blank" class="twitter">Twitter</a>
          <a href="<?php echo $email_link; ?>" target="_blank" class="email">Email</a>
        </div>
      </div>

      <div id="footer-right" class="grid-5 scaffold footer-module">
        <div id="email-signup">
          <h5>Cordial Dispatch:</h5>
          <p>sign up to receive regular updates on new products, special projects and offers.</p>
          <form action="" method="post" target="_blank">
            <input type="email" value="" name="EMAIL" class="email"  required>
            <input type="submit" value="Subscribe" name="subscribe" class="sbutton">
          </form>
        </div>
      </div>

      <div id="footer-bottom" class="grid-12">
        <div class="copyright">&#169; 2013 Otis James. All rights reserved. <span><a href="/privacy-policy">Privacy Policy.</a></span>
        <span> | site by <a href="http://seanpshaw.com" target="_blank">Sean Shaw</a></div>
      </div> 
    </footer>
  </div>


<?php } ?>
<?php function scm_after_footer() { ?>

<?php } ?>