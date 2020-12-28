<?php
/**
 * Front Header
 */

?>
<style>
#header{background-color:grey !important;}
</style>
<div class="headerImage blueish background">
  <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/dist/images/globe.png" alt="Nawiąż kontakt stwórzmy razem projekt">
  <div class="headerContact flexing siteWidth">
      <div class="headerWrapper flexing siteWidth">
        <?php
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
                  $firm = trim($_POST['firm']);
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


                    if ( isset($_POST['stronaWizytowka']) || isset($_POST['sklepInternetowy']) || isset($_POST['stronaDlaDevelopera']) || isset($_POST['blog']) ||
                    isset($_POST['pozycjonowanie']) || isset($_POST['logo']) || isset($_POST['identyfikacja']) || isset($_POST['inne']) ) {
                        $array = array($_POST['stronaWizytowka'], $_POST['sklepInternetowy'], $_POST['stronaDlaDevelopera'], $_POST['blog'], $_POST['pozycjonowanie'], $_POST['logo'], $_POST['identyfikacja'], $_POST['inne']);
                        $array = array_filter($array);
                        $tags = "";
                        foreach($array as $a):
                          $tags = $tags.", ".$a;
                        endforeach;

                        $tags = substr($tags, 2);
                    } else {
                      $tagsError = 'Zaznacz jedną z opcji';
                      $hasError = true;
                    }

                  	if(!isset($hasError)) {
                  		$emailTo = "biuro@lookslike.pl";
                  		if (!isset($emailTo) || ($emailTo == '') ){
                  			$emailTo = "biuro@lookslike.pl";
                  		}
                  		$subject = 'Złożenie zamówienia od '.$name;
                  		$body = "Nazwa: $name \n\nNazwa firmy: $firm \n\nEmail: $email \n\nTreść: $comments \n\nTelefon: $phone\n\nTagi: $tags  ";
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



        // formularz
        ?>
        <div class="siteWidth">
          <div class="heading">
            <div class="title"><?= _e('Gotowy do stworzenia','lookslike') ?><br> <span class="project"><?= _e('projektu','lookslike') ?></span> <?= _e('razem?','lookslike') ?></div>
          </div>
        </div>
          <script src="https://www.google.com/recaptcha/api.js?render=6Lfzg_MUAAAAAFItd75fz9Mj5sSETPoEHWKxMCjI"></script>
        <form action="<?php the_permalink(); ?>#contactForm-<?php the_ID();?>" id="contactForm-<?php the_ID();?>" class="contactForm" method="post">
        	<ul>
            <div class="tagsFlex">
              <li class="tags">
                <label>
                  <input class="input" type="checkbox" name="stronaWizytowka" value="<?= _e('Strona wizytówka','lookslike')?>">
                  <span class="button"><?= _e('Strona wizytówka','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="sklepInternetowy" value="<?= _e('Sklep internetowy','lookslike')?>">
                  <span class="button"><?= _e('Sklep internetowy','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="stronaDlaDevelopera" value="<?= _e('Strona dla developera','lookslike')?>">
                  <span class="button"><?= _e('Strona dla developera','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="blog" value="<?= _e('Blog','lookslike')?>">
                  <span class="button"><?= _e('Blog','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="pozycjonowanie" value="<?= _e('Pozycjonowanie','lookslike')?>">
                  <span class="button"><?= _e('Pozycjonowanie','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="logo" value="<?= _e('Logo','lookslike')?>">
                  <span class="button"><?= _e('Logo','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="identyfikacja" value="<?= _e('Identyfikacja','lookslike')?>">
                  <span class="button"><?= _e('Identyfikacja','lookslike')?></span>
                </label>
                <label>
                  <input class="input" type="checkbox" name="inne" value="<?= _e('Inne','lookslike')?>">
                  <span class="button"><?= _e('Inne','lookslike')?></span>
                </label>
                <?php if($tagsError != '') { ?>
                  <span class="error"><?=$tagsError;?></span>
                <?php } ?>
              </li>
            </div>
              <div>
          		<li>
          			<input class="input" type="text" name="contactName" id="contactName" value="" placeholder="<?= _e('Twoje imię','lookslike') ?>" />
                <?php if($nameError != '') { ?>
                  <span class="error"><?=$nameError;?></span>
                <?php } ?>
          		</li>
          		<li>
          			<input class="input" type="text" name="email" id="email" value="" placeholder="<?= _e('Adres e-mail','lookslike') ?>"/>
                <?php if($emailError != '') { ?>
                  <span class="error"><?=$emailError;?></span>
                <?php } ?>
          		</li>
              <li>
                <input class="input" type="text" name="phone" id="phone" value="" placeholder="<?= _e('Telefon','lookslike') ?>"/>
                <?php if($phoneError != '') { ?>
                  <span class="error"><?=$phoneError;?></span>
                <?php } ?>
              </li>
              <li>
                <input class="input" type="text" name="firm" id="firm" value="" placeholder="<?= _e('Nazwa firmy','lookslike') ?>"/>
              </li>
          		<li class="textarea">
          			<textarea class="input" name="comments" id="commentsText" placeholder="<?= _e('Wiadomość','lookslike') ?>"></textarea>
                <?php if($commentError != '') { ?>
                  <span class="error"><?=$commentError;?></span>
                <?php } ?>
          		</li>
            </div>
        		<li class="formButton">
        			<button type="submit" class="button"><?= _e('Wyślij','lookslike') ?></button>
        		</li>
        	</ul>
          <input type="hidden" id="token" name="token">
        	<input type="hidden" name="submitted" id="submitted" value="true" />
        </form>

        <!-- walidacja -->

        <?php if(isset($captchaError)) { ?>
        	<div class="errorCaptcha">
        		<p>
              <?= _e('Nie jesteś człowiekiem','lookslike') ?>
            </p>
        	</div>
        <?php } ?>
        <?php if(isset($emailSent) && $emailSent == true) { ?>
        	<div class="thanks">
        		<p>
              <?= _e('Dziękujemy, email został pomyślnie przesłany','lookslike') ?>
            </p>
        	</div>
        <?php } else { ?>
        	<?php the_content(); ?>
        	<?php if(isset($hasError) || isset($captchaError)) { ?>
        		<p class="error">
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
    </div>
  </div>
</div>
