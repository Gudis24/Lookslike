<?php
/**
 *
 *
 */

get_header();
?>

<div class="pageContainer">
  <div>
    <div class="offer">
      <div class="title siteWidth">
        <?php if (get_field('tytul')) : ?>
          <h2 class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
            <?php the_field('tytul'); ?>
          </h2>
        <?php endif; ?>
        <?php if (get_field('opis')) : ?>
          <div class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
          <?php the_field('opis'); ?>
          </div>
        <?php endif; ?>
        <?php if(get_field('przycisk_1_')): ?>
        <div class="flexing buttonWrapper">
          <a href="<?php the_field('przycisk_1_url') ?>" class="button"><?php the_field('przycisk_1_'); ?></a>
          <a href="<?php the_field('przycisk_2_url') ?>" class="button noBGbutton lightButton2"><?php the_field('przycisk_2');?></a>
        </div>
      <?php endif; ?>
      </div>
      <?php if(get_field('tytul_sekcja')): ?>
      <div class="flexing offerTechnology siteWidth">
        <div class="description">
            <h3 class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
              <?php the_field('tytul_sekcja'); ?>
            </h3>
          <?php if(get_field('opis_sekcja')): ?>
            <div class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
            <?php the_field('opis_sekcja'); ?>
            </div>
          <?php endif; ?>
          <?php $ikony = get_field('ikony'); ?>
          <?php if($ikony): ?>
          <div class="flexing ikonyWrapper">
            <?php foreach ($ikony as $key => $i): ?>
               <div class="cms flexing ikony-inner"><?php echo $i; ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        </div>
        <div class="offerDevices">
          <div class="deviceWrapper">
            <div class="wrapper flexing">
              <?php
                $obrazek = get_field('obrazek');
               ?>
              <?php echo wp_get_attachment_image($obrazek['id'], 'auto'); ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="assets">
        <div class="siteWidth">
          <div class="wrapper flexing">
            <?php if(get_field('tytul_separator')):?>
            <h3 class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
              <?php the_field('tytul_separator'); ?>
            </h3>
          <?php endif; ?>
          <?php if( have_rows('powtarzalne_cechy') ): // grupa
            while( have_rows('powtarzalne_cechy')): the_row();?>
            <?php $ikona = get_sub_field('ikona');
                  $tytul = get_sub_field('tytul');
                  $opis = get_sub_field('opis');?>
          <div class="icons">
            <div class="iconItem flexing <?= animacje_klasy("div_lista_srodek") ?>" <?= animacje_offset("10") ?>>
              <div class="icon"><?php echo wp_get_attachment_image($ikona['id'],'ikona'); ?></div>
              <div class="iconDesc">
                <div class="title"><?php echo $tytul; ?></div>
                <div class="opis"><?php echo $opis; ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
        </div>
      </div>
      </div>
      <?php $m = 0; ?>
      <?php if( have_rows('model_sprzedazy') ): // grupa I start ?>


      <div  id="model_sprzedazy_scroll" class="model_sprzedazy">
        <div class="siteWidth">
          <div class="modelWrapper flexing">
              <?php   while( have_rows('model_sprzedazy')): the_row();?>

                <?php
              if(!is_single (209) && !is_single (239)){
                $str = "srodek";
              }
              else{
                if($m%2==0){
                  $str = "lewo";
                }
                else{
                  $str = "prawo";
                }
                $m++;
              }
                 ?>

            <div class="modelItemWrapper <?= animacje_klasy("oferta_".$str) ?>" <?= animacje_offset("10") ?>>
            <div class="modelItem">
              <?php $model_tytul = get_sub_field('tytul'); ?>
              <?php $model_obrazek = get_sub_field('obrazek_tabeli'); ?>
              <?php $model_dodatkowe_info = get_sub_field('dodatkowe_info'); ?>
              <div class="modelImage">
                  <?php echo wp_get_attachment_image($model_obrazek['id'],'model_sprzedazy') ?>
              </div>
              <div class="modelDesc">
              <div class="modelTitle">
                <?php echo $model_tytul; ?>
              </div>
              <div class="listContianer">
                <ul class="clearList collapsed">
                  <?php if( have_rows('lista') ): // grupa II start
                    $i = 0;

                    while( have_rows('lista')): the_row();?>
                    <?php $i++; ?>

                    <?php $model_item = get_sub_field('list_element'); ?>
                    <?php if ($model_item): ?>
                      <?php if(get_sub_field('naglowek') == true): ?>
                        <div class="heading"><?php echo $model_item; ?></div>
                      <?php else: ?>
                      <li>
                        <?php if($model_item == "Mapowanie Google Tag Managerem (nieuwzględnione w wycenie)"): ?>
                          <i class="icon icon-tick offer-cross"></i>
                        <?php else: ?>
                          <i class="icon icon-tick offer-tick"></i>
                        <?php endif; ?>
                        <p <?php if(get_sub_field('czy_pole_jest_unikalne') == true): ?> class="used" <?php endif ?>><?php echo $model_item; ?></p>
                      </li>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php  endwhile;  endif; // grupa II stop?>
                  <?php if ($i >= 7 && count(get_sub_field( 'lista' )) > 7): ?>
                  <div class='list-toggle'>
                    <span class="expand"><i class="icon">+</i> <?php _e('Zobacz więcej', 'lookslike') ?></span>
                    <span class="collapse"><i class="icon">-</i> <?php _e('Ukryj', 'lookslike') ?></span>
                  </div>
                  <?php endif; ?>
                </ul>
              </div>
              <div class="modelFooter">
                  <div class="priceContainer">
                    <?php if( have_rows('cena') ): // grupa cena start
                      while( have_rows('cena')): the_row();?>
                      <?php $cena = get_sub_field('cena'); ?>
                      <?php $stara_cena = get_sub_field('stara_cena'); ?>
                      <?php $dodatkowe_info = get_sub_field('dodatkowe_info'); ?>
                      <?php if ($cena) : ?>
                      <div class="bigPrice flexing">
                          <div class="priceContainer">
                            <?php if ($stara_cena) :
                              echo '<div class="oldPrice">'.$stara_cena.'</div>';
                            endif;  ?>
                            <?php echo $cena; ?>
                          </div>
                            <div class="blockVat">
                              <div class="vatInfo"> PLN + VAT (23%) <br></div>
                              <?php if ($dodatkowe_info) :
                                echo '<div class="extraInfo">'.$dodatkowe_info.'</div>';
                              endif;  ?>
                            </div>
                      </div>
                    <?php endif; ?>
                     <?php  endwhile;  endif; // grupa cena stop?>
                  </div>
              </div>

            </div>
            <div class="callToAction">
                <?php if ($model_dodatkowe_info): ?>
                    <div class="extraInfo"><?php echo $model_dodatkowe_info; ?></div>
                <?php endif; ?>
                <?php if( have_rows('przyciski_tabeli') ): // grupa III start
                  while( have_rows('przyciski_tabeli')): the_row();?>
                  <?php if( have_rows('przycisk') ): // grupa III > podgrupa start
                    while( have_rows('przycisk')): the_row();?>
                      <?php $przycisk = get_sub_field('przycisk'); ?>
                      <?php $adres_url = get_sub_field('adres_url'); ?>
                        <a class="order_now button" data-name="<?= $model_tytul ?>" href="<?php echo $adres_url; ?>"><?php echo $przycisk; ?></a>
                    <?php  endwhile;  endif; // grupa III > podgrupa stop?>
                <?php  endwhile;  endif;  // // grupa III stop ?>
            </div>
          </div>
          </div>
          <?php endwhile;  // grupa I stop ?>
          </div>
        </div>
      </div>
      <?php endif; // grupa I stop ?>
      <div id="offerForm" class="offerForm siteWidth <?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
        <div class="formWrapper">
          <div class="headBar"><?php the_field('tytul_formularz'); ?></div>
            <div class="flexing wrapper">
                <div class="leftForm">
                  <?php the_field('opis_formularz'); ?>
                    <div class="punkty">
                    <?php if( have_rows('punkty') ): // grupa
                      while( have_rows('punkty')): the_row();?>
                      <div class="tytul"><?php the_sub_field('tytul'); ?></div>
                      <div class="opis flexing">
                        <i class="icon-tick"></i>
                        <div class="opisInner"><?php the_sub_field('opis'); ?></div>
                      </div>
                    <?php endwhile; endif; ?>
                  </div>
                </div>
                <div class="rightForm">
                  <?php oferta_formularz(get_the_title(), "biuro@lookslike.pl"); ?>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="flexing">
      <div class="contentSingle">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
