<?php
/**
 *
 *
 */

get_header();
?>

<div class="pageContainer">
  <div>
    <div class="motywySingle">
      <div class="motywyWrapper">
        <div class="title siteWidth">
          <div class="col_2 photo">
            <a href="<?= get_field('zdjecie', get_the_id()) ?>" target="_blank">
              <img src="<?= get_field('zdjecie', get_the_id()) ?>" alt="<?= get_the_title() ?>">
            </a>
          </div>
          <div class="col_2 text">
            <h2><?php the_title() ?></h2>

              <?php the_content(); ?>

              <div class="buttonContainer">
                <a href="<?= get_permalink()?>#offerForm" class="firstColor button portfolio-single-wycena order_now" data-name="<?= get_the_title() ?>"><?php _e('PRZEJDŹ DO ZAKUPU', 'lookslike') ?></a>
                <?php if(get_field('url')): ?>
                <a target="_blank" href="<?= get_field('url') ?>" class="secondColor button noBGbutton colorFull portfolio-single-witryna"><?php _e('ZOBACZ ONLINE', 'lookslike') ?></a>
              <?php endif; ?>
              </div>
          </div>
        </div>
        <div id="offerForm" class="offerForm siteWidth motywyForm">
          <div class="formWrapper">
            <div class="headBar"><?php _e("Jesteś zainteresowany motywem? - Prosimy o kontakt", "lookslike"); ?></div>
            <div class="flexing wrapper">
              <div class="leftForm">
                  <p>Wypełnij formularz, a my odpowiemy w najbliższym dniu roboczym.Tworzymy profesjonalne, skuteczne motywy www z wbudowanym systemem CMS do zarządzania zawartością Twojej strony.</p>
                    <div class="punkty">
                      <div class="tytul">Szybkość</div>
                      <div class="opis flexing">
                        <i class="icon-tick"></i>
                        <div class="opisInner">Projekt potrzebny na już? Gotowy motyw to idealne rozwiązanie.</div>
                      </div>
                                    <div class="tytul">Wsparcie</div>
                      <div class="opis flexing">
                        <i class="icon-tick"></i>
                        <div class="opisInner">Udzielamy wsparcia przy konfiguracji serwisu, podpowiadamy rozwiązania.</div>
                      </div>
                    </div>
                </div>
              <div class="rightForm">
                <?php oferta_formularz(get_the_title(), "biuro@lookslike.pl"); ?>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
.col_2.text h2{
  color:<?= get_field('drugi_color') ?>;
}
.firstColor{
  color:#fff;
  border:1px solid <?= get_field('pierwszy_color') ?>;
  background-color:<?= get_field('pierwszy_color') ?>
}
.firstColor:hover{
  color:<?= get_field('pierwszy_color') ?>;
  background-color:#fff;
}
.secondColor{
  color:<?= get_field('pierwszy_color') ?>;
  border:1px solid <?= get_field('pierwszy_color') ?>;

}
.secondColor:hover{
  color:#fff;
  background-color:<?= get_field('pierwszy_color') ?>;
}

.pageContainer{
  background-color:<?= get_field('pierwszy_color') ?>10
}
</style>
<?php get_footer(); ?>
