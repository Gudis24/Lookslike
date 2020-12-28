<?php $company = get_field('company', 'option'); ?>
<?php $socialMedia = get_field('social_media', 'option'); ?>
<footer>
  <div class="footerWrapper siteWidth">
    <div class="columnsWrapper flexing">
      <div class="column">
        <div class="heading"><?php _e('NASZE BIURO','lookslike'); ?></div>
        <p><?php echo $company['company_name']; ?><br>
           <?php echo $company['company_adress']; ?></p>
      </div>
      <div class="column">
        <div class="heading"><?php _e('Zadzwoń','lookslike'); ?></div>
        <a href="tel:<?php echo $company['numer_telefonu']; ?>" class="contact icon icon-phone icon-phone-footer"><?php echo $company['numer_telefonu']; ?></a>
        <div class="heading secondheading"><?php _e('Napisz do nas','lookslike'); ?></div>
        <a href="mailto:<?php echo $company['company_email']; ?>" class="contact icon icon-at icon-at-footer"><?php echo $company['company_email']; ?></a>
      </div>
      <div class="column">
        <div class="heading"><?php _e('Social media','lookslike'); ?></div>
        <?php if ( $socialMedia ): ?>
        <div class="socialMedia flexing">
          <a class="icon-facebook-footer" href="<?php echo $socialMedia['facebook']; ?>" target="_blank"> <i class="icon icon-facebook icon-facebook-footer"></i></a>
          <a class="icon-linkedin-footer" href="<?php echo $socialMedia['linkedin']; ?>" target="_blank"> <i class="icon icon-linkedin icon-linkedin-footer"></i></a>
          <a class="icon-behance-footer" href="<?php echo $socialMedia['behance']; ?>" target="_blank"> <i class="icon icon-behance icon-behance-footer"></i></a>
        </div>
        <?php endif; ?>
      </div>
      <div class="column">
        <div class="heading"><?php _e('Wycena Twojego serwisu','lookslike'); ?></div>
        <p><?php _e('Wypełnij nasz Brief a my wycenimy Twój pomysł','lookslike'); ?></p>
        <a href="https://lookslike.pl/brief/" class="button icon-brief-footer"><?php _e('Wypełnij Brief','lookslike'); ?></a>
      </div>
    </div>
  </div>
</footer>
<div class="credits">
  <div class="siteWidth flexing">
    <div class="companyName"> <?php _e('Copyright ©','lookslike'); ?><?php echo date('Y'); ?><?php _e(' lookslike.pl Sp. z o.o. Wszelkie prawa zastrzeżone.','lookslike'); ?> </div>
  </div>
</div>
<?php // cookies(); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<script>
new WOW({mobile:false}).init();
if (jQuery(window).width() <= 991){ jQuery(".wow").removeClass("wow"); }
</script>
<?php wp_footer(); ?>
</body>
</html>
