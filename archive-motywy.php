<?php
/**
 * Template Name: Motyw
 * Template Post Type: page
 */

get_header();
?>

<div class="pageContainer motywy">
  <div class="siteWidth">
    <div class="columnsWrapper flexing bg">
      <?php
        $args = new WP_Query( array(
          'post_type' => 'motywy',
          'posts_per_page' => -1,
          'order' => 'ASC'
        )
        );
      ?>
  <?php $colors = -1; $s = 1; $swap = false; $i=0; ?>
  <?php while ( $args->have_posts() ) : $args->the_post();
    $i++;
    $zdjecie = get_field('zdjecie_2', get_the_id());  ?>
    <?php
    if($color%4 == 0):
      if($s%2 == 0):
        $swap = false;
        $s++;
      else:
        $swap = true;
        $s++;
      endif;
      $color = 0;
    endif;
    $color++;
     ?>
    <div class="column_4 element<?= $i ?> offer <?php if($swap): echo"odd"; else: echo"even"; endif; ?>">
    <img src="<?= $zdjecie ?>" class="lzoad" alt="motyw <?= get_the_title(); ?>">
      <a href="<?php the_permalink() ?>" class="portfolio-button-wycena1" tabindex="0">
        <div class="wrapper">
          <div class="inner">
            <div class="heading"><?= the_title() ?></div>
            <div class="buttonContainer">
              <p>
                <div class="specialHref portfolio-button-wycena1 buttonBlock" tabindex="0"><?php _e("Zobacz Więcej", "lookslike") ?></div>
              </p>
            </div>
          </div>
        </div>
      </a>
    </div>

    <style>

    </style>
  <?php endwhile; wp_reset_query(); ?>



    </div>
  </div>
</div>

<?php get_footer(); ?>
