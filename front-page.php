<?php get_header(); ?>
<div class="container">
  <?php $first_section = get_field('first_section'); ?>
  <?php $sekcja = get_field('sekcja'); ?>
  <?php if ( $first_section ): ?>
  <section class="firstSection ">
    <div class="sectionContent flexing siteWidth">
      <div class="contentSide">
        <div class="heading <?= animacje_klasy("naglowek_lewo") ?>" <?= animacje_offset("10") ?>>
          <div class="number"><?php echo $first_section['number']; ?></div>
          <div class="title"><?php echo $first_section['title']; ?></div>
        </div>
        <div class="content <?= animacje_klasy("p_lewo") ?>" <?= animacje_offset("10") ?>>
          <?php echo $first_section['content']; ?>
        </div>
      </div>
      <div class="imageSide">
        <img loading="eager" src="<?php echo $first_section['image']['url']; ?>" alt="<?php echo $first_section['image']['alt']; ?>" class="LL20 <?= animacje_klasy("zdjecie") ?>" <?= animacje_offset("10") ?>>
      </div>
  </div>
  </section>
  <?php endif; ?>
  <?php if ($sekcja): ?>
    <?php if( have_rows('sekcja') ): // grupa
      while( have_rows('sekcja')): the_row();?>
      <?php $section_type = get_sub_field('rodzaj_sekcji');  ?>
      <?php $parametr = get_sub_field('dodatkowy_parametr');  ?>
      <?php if ($section_type == 'Basic'): ?>
        <?php if( have_rows('sekcja_basic') ): // grupa
          while( have_rows('sekcja_basic')): the_row();?>
          <?php $left_right = get_sub_field('left_right');  ?>
        <section class="<?php echo $section_type; echo $left_right; echo $parametr; ?>">

        </section>
          <?php endwhile; endif; ?>
      <?php elseif($section_type == 'Advanced'): ?>
        <?php if( have_rows('sekcja_advanced') ): // grupa
          while( have_rows('sekcja_advanced')): the_row();?>
          <?php $left_right = get_sub_field('left_right');
                $zdjecie = get_sub_field('zdjecie');
                $number = get_sub_field('number');
                $tytul = get_sub_field('tytul');
                $tresc = get_sub_field('tresc');
                $ikony = get_sub_field('ikony'); ?>
                <?php if($left_right == "RightSection"):
                  $side = "lewo";
                  elseif($left_right == "LeftSection"):
                  $side = "prawo";
                endif;
                   ?>
        <section class="<?php echo $section_type.' '.$left_right.' '.$parametr; ?>">
            <div class="sectionContainer flexing siteWidth">
              <div class="sectionSide imageSide">
                <?php echo wp_get_attachment_image($zdjecie['id'], 'auto'); ?>
              </div>
              <div class="sectionSide contentSide">
                <h2 class="heading <?= animacje_klasy("naglowek_".$side) ?>" <?= animacje_offset("10") ?>>
                  <div class="number"><?php echo $number ?></div>
                  <div class="title"><?php echo $tytul; ?></div>
                </h2>

                <?php if ($tresc):
                  ?>
                  <div class="<?= animacje_klasy("p_".$side) ?>" <?= animacje_offset("10") ?>>
                  <?php
                    echo $tresc;
                    ?>
                  </div>
                    <?php
                 endif; ?>
                 <?php if ($ikony): ?>
                     <div class="icons">
                       <?php if( have_rows('ikony') ): // repeater
                         while( have_rows('ikony')): the_row();?>
                         <?php $ikona = get_sub_field('ikon');
                               $tytul = get_sub_field('tytul');
                               $tresc = get_sub_field('tresc');
                         ?>
                         <div class="iconWrapper flexing <?= animacje_klasy("div_lista_".$side) ?>" <?= animacje_offset("10") ?>>
                           <?php echo wp_get_attachment_image($ikona['id'], 'ikona'); ?>
                           <div class="iconContent">
                              <h3 class="iconTitle">
                                <?php echo $tytul; ?>
                              </h3>
                              <?php echo $tresc; ?>
                           </div>
                         </div>
                         <?php endwhile; endif; ?>
                     </div>
                <?php  endif; ?>
              </div>
            </div>
        </section>
          <?php endwhile; endif; ?>
    <?php else: ?>
      <?php if( have_rows('separator') ): // grupa
        while( have_rows('separator')): the_row();?>
        <?php $tytul = get_sub_field('tytul'); ?>
        <?php $tresc = get_sub_field('tresc'); ?>
      <section class="<?php echo $section_type.' '.$parametr; ?>">
          <div class="separatorWrapper siteWidth">
            <div class="separatorContent">
               <div class="sepTitle <?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>><?php echo $tytul; ?></div>
               <?php echo $tresc; ?>
            </div>
            <img loading="eager" src="<?php echo get_template_directory_uri(); ?>/dist/images/znakBrand2.png" alt="Znak logo lookslike.pl - Firmy tworzącej sklepy internetowe wocommerce, Logotypy i strony internetowe" class="<?= animacje_klasy("standard") ?>" <?= animacje_offset("10") ?>>
          </div>
      </section>
        <?php endwhile; endif; ?>
    <?php endif; ?>

  <?php endwhile; endif; ?>
  <?php endif; ?>
  <section class="ostatnieRealizacje singlePortfolio portfolioFront">
    <?php realizacje(); ?>
  </section>
  <section class="opinie">
    <div class="heading <?= animacje_klasy("naglowek_srodek") ?>" <?= animacje_offset("10") ?>>
      <div class="number">04</div>
      <div class="title"><?= _e('Klienci o nas','lookslike') ?></div>
    </div>
    <?php opinie(); ?>
  </section>
  <section class="notSure">
    <img loading="eager" src="<?php echo get_template_directory_uri(); ?>/dist/images/znakBrand2.png" alt="Znak logo lookslike.pl - Firmy tworzącej sklepy internetowe wocommerce, Logotypy i strony internetowe">
    <div class="siteWidth flexing">
      <div class="sectionSide contentSide">
        <div class="heading <?= animacje_klasy("naglowek_srodek") ?>" <?= animacje_offset("10") ?>>
          <div class="number">05</div>
          <div class="title"><?= _e('Nadal nieprzekonany?','lookslike') ?></div>
        </div>
        <div class="buttonEffect">
          <a href="/kontakt" class="button noBGbutton button-nieprzekonany"><?= _e('Napisz do nas','lookslike') ?></a>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>
