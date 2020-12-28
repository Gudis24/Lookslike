<?php
function lookslike_assets() {
  wp_enqueue_style( 'lookslike-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'fontello', get_template_directory_uri() . '/dist/fontello/css/lookslike.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'lookslike-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'lookslike_assets');

add_theme_support('post-thumbnails');
//image sizes
// ustawianie wielkosci obrazow
add_image_size('auto', 0, 0, array( 'center', 'center' ));
add_image_size('logo', 180, 0);
add_image_size('ikona', 0, 80);
add_image_size('blog', 370, 250,true);
add_image_size('portfolio', 650, 400,true);
add_image_size('model_sprzedazy', 570, 180, array( 'center', 'center' ));
add_image_size('fullSize', 1920, 0, array( 'center', 'center' ));
add_image_size('desktop', 1920, 1150, array( 'center', 'center' ));
add_image_size('ipad', 863, 1150, array( 'center', 'center' ));
add_image_size('iphone', 530, 943, array( 'center', 'center' ));
add_image_size('imac-pro', 1366, 856, array( 'center', 'center' ));
add_image_size('iphone-x', 480, 1039, array( 'center', 'center' ));
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
  'page_title' 	=> 'Opcje Theme',
  'menu_title'	=> 'Opcje Theme',
  'menu_slug' 	=> 'opcjeTheme',
  'capability'	=> 'edit_posts',
  'redirect'		=> false
));

}

function lookslike_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'lookslike' ),
		'mobile'   => __( 'Mobile Menu', 'lookslike' ),
		'footer'   => __( 'Footer Menu', 'lookslike' ),
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'lookslike_menus' );
function preloader(){
  ?>
  <!-- Start: Preloader -->
 <section id="preloader-section">
           <div id="preloader">
               <div id="ctn-preloader" class="ctn-preloader">
                   <div class="animation-preloader">
                       <!-- Spinner -->
                       <div class="spinnerc-container">
                         <img class="preload-logo" src="http://production.lookslike.pl/wp-content/uploads/2020/04/znak.png" alt="">
                         <div class="spinner"></div>
                       </div>

                       <!-- Start: Text Loading -->
                       <div class="txt-loading">
                           <span data-text-preloader="L" class="letters-loading">L</span>
                           <span data-text-preloader="O" class="letters-loading">O</span>
                           <span data-text-preloader="O" class="letters-loading">O</span>
                           <span data-text-preloader="K" class="letters-loading">K</span>
                           <span data-text-preloader="S" class="letters-loading">S</span>
                           <span data-text-preloader="L" class="letters-loading">L</span>
                           <span data-text-preloader="I" class="letters-loading">I</span>
                           <span data-text-preloader="K" class="letters-loading">K</span>
                           <span data-text-preloader="E" class="letters-loading">E</span>
                           <span data-text-preloader="." class="letters-loading">.</span>
                           <span data-text-preloader="P" class="letters-loading">P</span>
                           <span data-text-preloader="L" class="letters-loading">L</span>
                       </div>
                       <!-- End: Text Loading -->

                   </div>

                   <!-- Start: Preloader sides - Model 1 -->
                   <div class="loader-section section-left"></div>
                   <div class="loader-section section-right"></div>
                   <!-- End: Preloader sides - Model 1 -->

               </div>
           </div>
       </section>
 <!-- End: Preloader -->
 <?php
}
function opinie() {
  ?>
  <div class="reviews">
            <?php
            $loop = new WP_Query( array(
                'post_type' => 'opinie',
                'posts_per_page' => 5
              )
            );
            ?>
            <div class="review">
              <div class="reviewsWrapper">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                  <div class="reviewContent">
                    <img loading="eager" class="borderTop" src="<?php echo get_template_directory_uri(); ?>/dist/images/borderTop.svg" alt="Opinie firmowe">
                    <div class="reviewSpacing">
                      <p><?= get_field('tresc_opini'); ?></p>
                    </div>
                    <img loading="eager" class="borderBottom" src="<?php echo get_template_directory_uri(); ?>/dist/images/borderBottom.svg" alt="Opinie na temat firmy">
                    <div class="authorWrapper">
                      <div class="reviewAuthor"><?= the_title(); ?></div>
                      <div class="reviewCompany"><a href="//<?= get_field('firma'); ?>" target="_blank" rel="nofollow"><?= get_field('firma'); ?></a></div>
                    </div>
                  </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
          <div class="reviewArrows"></div>
  </div>
  <?php
}

function realizacje() {
  ?>
    <?php
    $loop = new WP_Query( array(
        'post_type' => 'portfolio',
        'posts_per_page' => 4,
        'order' => 'ASC'
      )
    );
    ?>
    <div class="portfolio portfolioHeader">
      <div id="portfolioWrapper" class="portfolioWrapper">
        <?php $g = 0; ?>
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php $g++; ?>
        <div class="portfolioSlide">
          <div class="flexing">
          <?php echo get_the_post_thumbnail(); ?>
          <div class="portfolioContent contentSingle">
            <h1 class="title"><?php echo get_field('tytul'); ?></h1>
            <p><?php echo get_field('tresc'); ?></p>
            <div class="forbidenP">
              <?php echo get_field('funkcje'); ?>
              <?php $cms = get_field('cms'); ?>
              <?php if ($cms) :?>
                <div class="flexing cmsWrapper">
                  <?php foreach ($cms as $key => $c): ?>
                     <div class="cms flexing"><?php echo $c; ?></div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="buttonContainer">
              <?php if(is_front_page()): ?>
              <a href="<?= get_post_permalink() ?>" class="button portfolio-button-wycena<?= $g ?>"><?php _e('Zobacz szczegóły','lookslike'); ?></a><a target="_blank" href="<?php echo get_field('link'); ?>" class="portfolio-button-witryna<?= $g ?> button noBGbutton lightButton"><?php _e('Zobacz online','lookslike'); ?></a>
              <?php else: ?>
              <a href="<?= get_site_url() ?>/kontakt" class="button portfolio-button-wycena<?= $g ?>"><?php _e('Darmowa wycena','lookslike'); ?></a><a target="_blank" href="<?php echo get_field('link'); ?>" class="portfolio-button-witryna<?= $g ?> button noBGbutton lightButton"><?php _e('Zobacz online','lookslike'); ?></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
    <div class="portfolioArrows button"></div>
  </div>
  <div class="buttonContainer seeAll"><a href="/portfolio/" class="button showPortfolio"><?php _e('WSZYSTKIE&nbsp;REALIZACJE','lookslike') ?></a></div>
  <?php
}

function oferta_formularz($title_page, $owner_email) {
  // title_page - z ktorej oferty mailto
  // owner_email - na jakas skrzynke wysylac
  if(isset($_POST['submitted'])) {
    $url = "https://www.google.com/recaptcha/api/siteverify";
      $data = [
        'secret' => "6Lfzg_MUAAAAANTn7dkOTaH9rT1rqVcKgMZcue0w",
        'response' => $_POST['token'],
        // 'remoteip' => $_SERVER['REMOTE_ADDR']
      ];


          $options = array(
              'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
              )
            );

          $context  = stream_context_create($options);
          $response = file_get_contents($url, false, $context);

          $res = json_decode($response, true);
          if($res['success'] == true) {

            // tutaj walidacja formularza jesli mamy true z captcha


              if(trim($_POST['contactName']) === '') {
                $nameError = 'Proszę wpisać imię.';
                $hasError = true;
              } else {
                $name = trim($_POST['contactName']);
              }

              if(trim($_POST['email']) === '')  {
                $emailError = 'Proszę wpisać adres e-mail.';
                $hasError = true;
              } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
                $emailError = 'Wprowadziłeś zły adres e-mail.';
                $hasError = true;
              } else {
                $email = trim($_POST['email']);
              }

              if(trim($_POST['comments']) === '') {
                $commentError = 'Proszę wpisać treść wiadomości.';
                $hasError = true;
              } else {
                if(function_exists('stripslashes')) {
                  $comments = stripslashes(trim($_POST['comments']));
                } else {
                  $comments = trim($_POST['comments']);
                }
              }

              if ( ! preg_match('^\+48[0-9]{9}$^', $_POST['phone']) && $_POST['phone'] !== '' ) {
                  $phone = trim($_POST['phone']);
              } else {
                $phoneError = 'Wprowadziłeś zły numer telefonu.';
                $hasError = true;;
              }

              if(!isset($hasError)) {
                $emailTo = $owner_email;
                if (!isset($emailTo) || ($emailTo == '') ){
                  $emailTo = $owner_email;
                }
                $subject = 'Złożenie zamówienia od '.$name.' mail wysłany ze strony o tytule - '.$title_page;
                $body = "Nazwa: $name \n\nEmail: $email \n\nTreść: $comments \n\nTelefon: $phone";
                $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

                wp_mail($emailTo, $subject, $body, $headers);
                $emailSent = true;
              }

          } else {

            // jeśli błąd captcha

            $captchaError = 'Nie jesteś człowiekiem.';
            $hasError = true;
          }
        }

  // captcha end
?>
<script src="https://www.google.com/recaptcha/api.js?render=6Lfzg_MUAAAAAFItd75fz9Mj5sSETPoEHWKxMCjI"></script>
<form action="<?php the_permalink(); ?>#contactForm-<?php the_ID();?>" id="contactForm-<?php the_ID();?>" class="contactForm contactFormOferta" method="post">
  <ul>
      <div>
      <li>
        <input class="input" type="text" name="contactName" id="contactName" value="" placeholder="<?= _e('Twoje imię','lookslike') ?>" />
        <?php if($nameError != '') { ?>
          <span class="error"><?=$nameError;?></span>
        <?php } ?>
      </li>
      <li>
        <input class="input" type="text" name="phone" id="phone" value="" placeholder="<?= _e('Telefon','lookslike') ?>"/>
        <?php if($phoneError != '') { ?>
          <span class="error"><?=$phoneError;?></span>
        <?php } ?>
      </li>
      <li class="full">
        <input class="input" type="text" name="email" id="email" value="" placeholder="<?= _e('Adres e-mail','lookslike') ?>"/>
        <?php if($emailError != '') { ?>
          <span class="error"><?=$emailError;?></span>
        <?php } ?>
      </li>
      <li class="textarea">
        <textarea class="input" name="comments" id="commentsText" placeholder="<?= _e('Wiadomość','lookslike') ?>"></textarea>
        <?php if($commentError != '') { ?>
          <span class="error"><?=$commentError;?></span>
        <?php } ?>
      </li>
    </div>
    <li class="formButton">
      <button onclick="ga('send', 'event', 'Formularz', 'wyslanie', 'formularz oferta');" type="submit" class="button"><?= _e('Wyślij','lookslike') ?></button>
    </li>
  </ul>
  <input type="hidden" id="token" name="token">
  <input type="hidden" name="submitted" id="submitted" value="true" />
</form>
<!-- walidacja -->

<?php if(isset($captchaError)) { ?>
  <div class="errorCaptcha" style="color:#ef6969;padding-left:10px;">
    <p>
      <?= _e('Nie jesteś człowiekiem','lookslike') ?>
    </p>
  </div>
<?php } ?>
<?php if(isset($emailSent) && $emailSent == true) { ?>
  <div class="thanks" style="color:#28a745;padding-left:10px;">
    <p>
      <?= _e('Dziękujemy, email został pomyślnie przesłany','lookslike') ?>
    </p>
  </div>
<?php } else { ?>

  <?php if(isset($hasError) || isset($captchaError)) { ?>
    <p class="error" style="color:#ef6969;padding-left:10px;">
      <?= _e('Przepraszamy, wystąpił błąd','lookslike') ?>
    <p>

  <?php } ?>
<?php } ?>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6Lfzg_MUAAAAAFItd75fz9Mj5sSETPoEHWKxMCjI', {action: 'homepage'}).then(function(token) {
         // console.log(token);
         document.getElementById("token").value = token;

      });
  });
</script>
<?php
}
// animacje

function animacje_klasy($typ) {
  // delay 1,2,3,4,5s
  // animate__slow 	2s
  // animate__slower 	3s
  // animate__fast 	800ms
  // animate__faster 	500ms
  switch($typ){
    case "p_lewo":
      return "wow animate__animated animate__fadeInUp";
    case "p_prawo":
      return "wow animate__animated animate__fadeInUp";
    case "p_srodek":
      return "wow animate__animated animate__fadeInUp";
    case "oferta_lewo":
      return "wow animate__animated animate__fadeInLeft";
    case "oferta_prawo":
      return "wow animate__animated animate__fadeInRight";
    case "oferta_srodek":
      return "wow animate__animated animate__fadeInUp";
    case "div_lista_lewo":
      return "wow animate__animated animate__fadeInUp";
    case "div_lista_prawo":
      return "wow animate__animated animate__fadeInRight";
    case "div_lista_srodek":
      return "wow animate__animated animate__fadeInUp";
    case "naglowek_lewo":
      return "wow animate__animated animate__fadeInUp";
    case "naglowek_srodek":
      return "wow animate__animated animate__fadeInUp";
    case "naglowek_prawo":
      return "wow animate__animated animate__fadeInUp";
    case "zdjecie":
      return "animate__animated animate__fadeIn animate__delay-1s animate__slow";
    case "delikatnie":
      return "wow animate__animated animate__fadeIn animate__delay-1s";
    case "standard":
      return "wow animate__animated animate__fadeIn";
    case "blok_lewy":
      return "animate__animated animate__fadeInLeft animate__delay-1s animate__slow";
    case "blok_prawy":
        return "animate__animated animate__fadeInRight";
    case "blok_srodek":
      return "animate__animated animate__fadeIn animate__delay-1s";
  }
}
function animacje_offset($wartosc) {
  return "data-wow-offset='".$wartosc."'";
}

/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

    $sep = ' / ';

    if (!is_front_page()) {

	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo '<i class="icon icon-house"></i>';
        echo '</a>' . $sep;

	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category()){
            $post = get_post();
            echo '<a href="';
            echo get_permalink( get_option( 'page_for_posts' ) );
            echo '">';
            echo _e("Blog", "lookslike");
            echo "</a>";

        }
        elseif(is_singular('post')){
          $post = get_post();
          echo '<a href="';
          echo get_permalink( get_option( 'page_for_posts' ) );
          echo '">';
          echo _e("Blog", "lookslike");
          echo "</a>";
        }
        elseif(is_singular() && !is_page()){
          $post = get_post();
          echo '<a href="';
          echo get_site_url().'/'.$post->post_type.'/';
          echo '">';
          echo $post->post_type;
          echo "</a>";
        }
          elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'lookslike' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'lookslike' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'lookslike' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'lookslike' ), get_the_date( _x( 'Y', 'yearly archives date format', 'lookslike' ) ) );
            } else {
              $post = get_post();
              echo $post->post_type;

            }
        }

	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/

add_action( 'pre_get_posts', 'add_custom_post_types_to_loop' );

function add_custom_post_types_to_loop( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'oferta' ) );
	return $query;
}


// excerpt Limit
/* Change excerpt length */

function wplab_custom_excerpt_length( $length ) {
     return 25;
 }
 add_filter( 'excerpt_length', 'wplab_custom_excerpt_length', 999 );


 add_action('admin_head', 'admin_style');

function admin_style() {
  echo '<style>
  .cmsLogoPortfolio{width:50px;margin:12px 8px auto auto}
  </style>';
}


 function formAjaxBrief()
 {
   wp_verify_nonce("security_".$_POST['security']);

   $email = trim( strip_tags( htmlspecialchars( $_POST['email'] ) ) );
   $phone = trim( strip_tags( htmlspecialchars( $_POST['phone'] ) ) );
   // $answer = trim( strip_tags( htmlspecialchars( $_POST['answer'] ) ) );
   // $questions = trim( strip_tags( htmlspecialchars( $_POST['question'] ) ) );
   $i = 0;
   $j = 0;
   foreach( $_POST['question'] as $question ):
     if($question['q']):
       $q .= "<b>Pytanie: ".$question['q']."</b></br>";
     endif;
     if($question['a']):
       $q .= "<li style='margin:10px 30px;'>".$question['a']."</li>";
     elseif($question['checkbox']):
       foreach( $question['checkbox'] as $checkbox ):
         $j++;
         $q .= "<li style='margin:10px 30px;'>".$checkbox."</li>";
       endforeach;
       $j = 0;
     endif;
     $i++;
   endforeach;

   $response = array(
       'status' => true,
       'message' => array()
   );

   if ( ! preg_match("/^[0-9\+]{8,13}$/", $phone) && $phone !== '') {
       $response['status'] = false;
       $response['message']['phone'] = 'Zły format numeru telefonu.';
   }

     if ( empty( $email ) ) {
        $response['status'] = false;
        $response['message']['email'] = 'Email jest wymagany.';
    } else if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $response['status'] = false;
        $response['message']['email'] = 'Zły format emailu.';
    } else {
        $message .= 'Email: ' . $email . ', ';
    }

   if ( $response['status'] == true ) {
       // captch validacja

       $url = "https://www.google.com/recaptcha/api/siteverify";
       $key = get_field('klucze', 'option');
       $contact_data = get_field('company', 'option');
       $data = [
         'secret' => $key["recaptcha_v3_secret_key"],
         'response' => $_POST['token'],
         // 'remoteip' => $_SERVER['REMOTE_ADDR']
       ];
       $options = array(
           'http' => array(
             'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
             'method'  => 'POST',
             'content' => http_build_query($data)
           )
         );
       $context  = stream_context_create($options);
       $response_google = file_get_contents($url, false, $context);
       $res = json_decode($response_google, true);

       if($res['success'] == true) {
       // captcha end validate
       $response['message']['success'] = "Dziękujemy, wiadomość została wysłana.";
       $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Brief <'.$contact_data["company_email"].'>', 'Reply-To: ' . $_POST['email']);
       $subject = 'Wypełniony Brief';
       $body = "<h1 style='padding-left:20px;'>Brief</h1><p style='padding-left:20px;'>E-mail: ".$email."</p><p style='padding-left:20px;'>Telefon: ".$phone."</p><ul>".$q;
       wp_mail($contact_data["company_email"], $subject, $body, $headers);
       }



   }
   echo json_encode($response);
   die();

}

add_action('wp_ajax_formAjaxBrief', 'formAjaxBrief');
add_action('wp_ajax_nopriv_formAjaxBrief', 'formAjaxBrief');


?>
