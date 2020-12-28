<?php
/**
 * Front Header
 */

?>
<div class="headerImage background" >
  <div id='stars'></div>
  <div id='stars2'></div>
  <div id='stars3'></div>
  <div class="headerFront flexing siteWidth">
    <div class="headingHero">
      <div class="headerContent">
        <div class="OfertaHeader">
          <h1 class="bigTitle <?= animacje_klasy("delikatnie") ?>"><?php echo $header['heading']; ?></h1>
        </div>
        <!-- <h1 class="bigTitle"><?php echo $header['heading']; ?></h1>
        <p class="subtitle"><?php echo $header['opis']; ?></p>
        <div class="buttonsAction">
          <?php echo $header['przyciski']; ?>
        </div> -->
      </div>
      <?php if ( $socialMedia ): ?>
      <div class="socialMedia flexing <?= animacje_klasy("delikatnie") ?>">
        <a href="<?php echo $socialMedia['facebook']; ?>" target="_blank"> <i class="icon icon-facebook icon-facebook-header"></i></a>
        <a href="<?php echo $socialMedia['linkedin']; ?>" target="_blank"> <i class="icon icon-linkedin icon-linkedin-header"></i></a>
        <a href="<?php echo $socialMedia['behance']; ?>" target="_blank"> <i class="icon icon-behance icon-behance-header"></i></a>
      </div>
      <?php endif; ?>
    </div>
      <div class="headerWrapper flexing siteWidth">
        <div class="box-wrapper">
            <div class="box box1 header1 <?= animacje_klasy("blok_lewy") ?>">
              <a href="/oferta/sklep-internetowy/" class="header1">
                <div class="box-inner-wrapper header1">
                  <h3 class="title iconTitle header1">
                    <?php echo $header['box_1_tytul']; ?>
                  </h3>
                  <div class="ikona header1">
                    <img src="<?= get_template_directory_uri() ?>/dist/flaticon/<?= $header['box_1_ikona']; ?>" alt="Projektowanie sklepów internetowych" class="header1">
                  </div>
                  <p class="opis header1">
                    <?php echo $header['box_1_opis']; ?>
                  </p>
                </div>
              </a>
            </div>
            <div class="box box2 header2 <?= animacje_klasy("blok_srodek") ?>">
              <a href="/oferta/strona-internetowa" class="header2">
              <div class="box-inner-wrapper header2">
                <h3 class="title iconTitle header2">
                  <?php echo $header['box_2_tytul']; ?>
                </h3>
                <div class="ikona header2">
                  <img src="<?= get_template_directory_uri() ?>/dist/flaticon/<?= $header['box_2_ikona']; ?>" alt="Projektowanie stron internetowych" class="header2">
                </div>
                <p class="opis header2">
                  <?php echo $header['box_2_opis']; ?>
                </p>
              </div>
              </a>
            </div>
            <div class="box box3 header3 <?= animacje_klasy("blok_prawy") ?> animate__delay-1s animate__slow">
              <a href="/oferta/oprogramowanie" class="header3">
                <div class="box-inner-wrapper header3">
                  <h3 class="title iconTitle header3">
                    <?php echo $header['box_3_tytul']; ?>
                  </h3>
                  <div class="ikona header3">
                    <img src="<?= get_template_directory_uri() ?>/dist/flaticon/<?= $header['box_3_ikona']; ?>" alt="Tworzenie programów, oprogramowania" class="header3">
                  </div>
                  <p class="opis header3">
                    <?php echo $header['box_3_opis']; ?>
                  </p>
                </div>
            </a>
          </div>
        </div>
    </div>
    <div class="headerFooter flexing">
      <div class="innerFooter sitePadding flexing siteWidth">
        <div class="scrollDown"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/scrollDown.svg" alt="Zobacz ofertę stron www"> <?php _e('ZJEDŹ NA DÓŁ', 'lookslike'); ?></div>
        <?php if ( $company ): ?>
        <div class="callUs flexing">
          <a class="icon-at-header" href="mailto:<?php echo $company['company_email']; ?>"> <i class="icon icon-at icon-at-header"></i> <?php echo $company['company_email']; ?></a>
          <a class="icon-phone-header" href="tel:<?php echo $company['numer_telefonu']; ?>"> <i class="icon icon-phone icon-phone-header"></i> <?php echo $company['numer_telefonu']; ?></a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
