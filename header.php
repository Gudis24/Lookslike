<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
    		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
      <?php wp_head(); ?>
      <style>
      @font-face {
          font-family: 'Work Sans';
          font-weight: 400;
          src: url('<?php echo get_template_directory_uri(); ?>/dist/fonts/WorkSans-Regular.woff') format('woff');
      }
      @font-face {
          font-family: 'Work Sans';
          font-weight: 600;
          src: url('<?php echo get_template_directory_uri(); ?>/dist/fonts/WorkSans-SemiBold.woff') format('woff');
      }
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>


      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-TFJF7RC');</script>
      <!-- End Google Tag Manager -->

    </head>
    <body <?php body_class('no-scroll-y'); ?> id="page-top">
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFJF7RC"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <?php $header = get_field('header_group'); ?>
      <?php $company = get_field('company', 'option'); ?>
      <?php $socialMedia = get_field('social_media', 'option'); ?>
      <?php /* preloader(); */ ?>
      <header id="header" class="pageHeader <?php if (!is_front_page()) {echo 'shortHeader';} ?>">
        <?php include( locate_template( 'template-parts/mobile-menu.php', false, false ) );  ?>
        <?php if (is_front_page()): ?>
          <?php include( locate_template( 'template-parts/headers/header-front.php', false, false ) );  ?>
        <?php elseif (is_page_template('templates/template-kontakt.php')): ?>
          <?php include( locate_template( 'template-parts/headers/header-contact.php', false, false ) );  ?>
        <?php elseif (is_404()): ?>
          <div class="errorContent">
            <div class="bigErr">404</div>
            <div class="errorInfo"><?php _e('Strona na której jesteś, została usunięta, jej nazwa<br>została zmieniona lub jest tymczasowo niedostępna.','lookslike') ?></div>
            <div class="buttonEffect"><a href="/" class="button noBGbutton"><?php _e('WRÓĆ NA STRONĘ GŁÓWNĄ','lookslike') ?></a></div>
          </div>
        <?php elseif (is_singular('post')): ?>
          <?php include( locate_template( 'template-parts/headers/header-blog.php', false, false ) );  ?>
      <?php else: ?>
        <?php include( locate_template( 'template-parts/headers/header-default.php', false, false ) );  ?>
        <?php endif; ?>
        <div class="mainNav">
          <div class="navContainer flexing siteWidth">
            <div class="logo">
              <?php if ( $company ): ?>
                <a class="companyLogo" href="<?php echo get_site_url(); ?>"> <?php echo wp_get_attachment_image($company['comapny_logo'], 'logo') ?></a>
                <a class="companyLogoFixed" href="<?php echo get_site_url(); ?>"> <?php echo wp_get_attachment_image($company['comapny_logofixed'], 'logo') ?></a>
                <?php  else: echo "looklsike.pl";
               endif; ?>
            </div>
            <nav id="navigation">
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
            </nav>
          </div>
        </div>
      </header>
