<?php
/**
 * Displays logo and mobile menu
 */

?>
<div class="mobileBar">
    <div class="logo">
      <?php if ( $company ): ?>
        <a href="<?php echo get_site_url(); ?>"> <?php echo wp_get_attachment_image($company['comapny_logo'], 'logo') ?></a>
        <?php  else: echo "looklsike.pl";
       endif; ?>
    </div>
    <button class="hamburger hamburger--emphatic" type="button"
            aria-label="Menu" aria-controls="navigation" aria-expanded="true/false">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
</div>
<nav id="mobileMenu">
  <div id="navigation">
    <?php
    if ( has_nav_menu( 'primary' ) ) :
      wp_nav_menu(
        array(
          'container'  => '',
          'items_wrap' => '%3$s',
          'theme_location' => 'primary',
        )
      );
    endif; ?>
  </div>
</nav>
