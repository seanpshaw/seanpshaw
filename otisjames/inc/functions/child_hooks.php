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
      <nav class="hide-on-phones"><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?></nav>
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
      $google_link  = ot_get_option( 'google_link' );
    } ?>
    <footer class="row">
      <div id="footer-left" class="grid-6 scaffold">
        <nav><?php wp_nav_menu( array( 'container' => 'false ', 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?></nav>
        <div class="hide-on-phones">
          <div class="copyright">&#169; 2013 Phoenix Digital Imaging. All rights reserved. <span><a href="/privacy-policy">Privacy Policy.</a></span></div>
          <div class="credits">Site designed & devleloped by <span><a href="http://www.southcentralmedia.com" target="_blank">South Central Media.</a></span></div>
        </div>
      </div>

      <div id="footer-center" class="grid-4 scaffold">
        <?php echo $address; ?>
      </div>

      <div id="footer-right" class="grid-2 scaffold">
        <div id="links">
          <a href="<?php echo $facebook_link; ?>" target="_blank" class="facebook">Facebook</a>
          <a href="<?php echo $google_link; ?>" target="_blank" class="google-plus">Google+</a>
        </div>
        <div class="show-on-phones">
          <div class="copyright">&#169; 2013 Phoenix Digital Imaging. All rights reserved. <span><a href="/privacy-policy">Privacy Policy.</a></span></div>
        </div>
      </div>
    </footer>
  </div>


<?php } ?>
<?php function scm_after_footer() { ?>

<?php } ?>