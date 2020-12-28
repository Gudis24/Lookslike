<?php
/**
 * Template Name: Oferta
 * Template Post Type: page
 */

get_header();
?>

<div class="pageContainer">
  <div class="siteWidth">
    <div class="columnsWrapper flexing bg">
      <?php
        $args = new WP_Query( array(
          'post_type' => 'oferta',
          'posts_per_page' => -1,
          'order' => 'ASC'
        )
        );
      ?>
  <?php $colors = -1; $s = 1; $swap = false; ?>
  <?php while ( $args->have_posts() ) : $args->the_post();
    $oferta = get_field('oferta', get_the_id()); ?>
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
    <a href="<?php the_permalink() ?>" class="column_4 offer <?php if($swap): echo"odd"; else: echo"even"; endif; ?>">
    <?php $ikona = get_sub_field('ikona'); ?>
    <?= wp_get_attachment_image($oferta[0]["ikona"]["id"], 'ikona'); ?>
    <div class="heading"><?= the_title() ?></div>
    <?= the_excerpt() ?>
    </a>

  <?php endwhile; wp_reset_query(); ?>



    </div>
  </div>
</div>

<?php get_footer(); ?>
