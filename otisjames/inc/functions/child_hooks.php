<?php function scm_head() { ?>
  <meta name="viewport" content="width=1024">
  <link rel="shortcut icon" href="<?php echo bloginfo('stylesheet_directory'); ?>/inc/images/favicon.png" type="image/x-icon" />
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
  echo "main-wrapper";
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
        <div class="content-wrapper">
          <?php the_content(); ?>
        </div>

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
            <a href="testimonial-archive" class="archive-link">View All Testimonials</a> 
          </div>
        <?php } ?>


        <?php if (is_page(array(391, 'testimonials/testimonial-archive'))) { ?>
          <div id="testimonials-wrapper">
            <?php $i = 0; ?>
            <?php $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => -1, 'order' => 'ASC') );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <?php $i++; ?>
            <div id="post-<?php the_ID(); ?>" class="testimonial<?php if ($i % 2 == 0) { echo " last"; } ?>">
              <?php the_content(); ?>
              <h3 class="testimonial-title"><?php the_title(); ?></h3>
            </div>
            <?php endwhile; ?>
          </div>
        <?php } ?>

        <?php if (is_page(array(251, 'press'))) { ?>
          <div id="press-wrapper">
            <?php $i = 0; ?>
            <?php $loop = new WP_Query( array( 'post_type' => 'press', 'posts_per_page' => -1, 'order' => 'DESC') );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <?php $i++; ?>
            <div id="post-<?php the_ID(); ?>" class="press<?php if ($i % 3 == 0) { echo " last"; } ?>">
              <div id="featured-image-wrapper">
                <?php if(has_post_thumbnail()) {
                  the_post_thumbnail(); 
                } ?>
              </div>
              <div class="content-wrapper">
                <?php the_content(); ?>
              </div>
            </div>
            <?php endwhile; ?>
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
  <div id="footer-wrapper" class="container">
  <?php  if ( function_exists( 'ot_get_option' ) ) {
      $address  = ot_get_option( 'address' );
      $facebook_link = ot_get_option( 'facebook_link' );
      $twitter_link  = ot_get_option( 'twitter_link' );
      $instagram_link  = ot_get_option( 'instagram_link' );
      $email_link  = ot_get_option( 'email_link' );
    } ?>
    <footer class="row">
      <div id="footer-left" class="grid-2 scaffold footer-module">
        <h5>More Info:</h5>
        <nav><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'footer' ) ); ?></nav>
      </div>

      <div id="footer-middle-left" class="grid-2 scaffold footer-module">
        <h5>Find Us:</h5>
        <?php echo $address; ?>
      </div>

      <div id="footer-middle-right" class="grid-3 scaffold footer-module">
        <h5>Connect:</h5>
        <div id="links">
          <a href="<?php echo $facebook_link; ?>" target="_blank" class="facebook">Facebook</a>
          <a href="<?php echo $twitter_link; ?>" target="_blank" class="twitter">Twitter</a>
          <a href="<?php echo $instagram_link; ?>" target="_blank" class="instagram">Instagram</a>
          <a href="mailto:<?php echo $email_link; ?>" class="email">Email</a>
        </div>
      </div>

      <div id="footer-right" class="grid-5 scaffold footer-module">
        <div id="email-signup">
          <h5>Cordial Dispatch:</h5>
          <p>sign up to receive regular updates on new products, special projects and offers.</p>
          <!-- Begin MailChimp Signup Form -->
          <div id="mc_embed_signup">
          <form action="http://otisjamesnashville.us5.list-manage.com/subscribe/post?u=ce362508bc6f66f0542db52ac&amp;id=30b6dca267" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
          </form>
          </div>
          <!--End mc_embed_signup-->
        </div>
      </div>

      <div id="footer-bottom" class="grid-12">
        <div class="copyright">&#169; 2013 Otis James. All rights reserved. <span><a href="/privacy-policy">Privacy Policy</a>.</span>
        <span> | site by Sean Shaw</div>
      </div> 
    </footer>
  </div>


<?php } ?>
<?php function scm_after_footer() { ?>

<?php } ?>