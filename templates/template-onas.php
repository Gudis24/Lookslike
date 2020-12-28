<?php
/**
 * Template Name: O nas
 * Template Post Type: page
 */

get_header();
?>
<?php $o_nas = get_field('o_nas'); ?>
<div class="pageContainer">
  <div class="theContent siteWidth">
    <?php the_content(); ?>
  </div>
  <div class="columnsWrapper flexing">
    <?php if ($o_nas): ?>
      <?php if( have_rows('o_nas') ): // grupa
        while( have_rows('o_nas')): the_row();?>
          <?php $ikona = get_sub_field('ikona'); ?>
          <?php $tytul = get_sub_field('tytul'); ?>
          <?php $tresc = get_sub_field('tresc'); ?>
          <div class="column">
            <?php echo wp_get_attachment_image($ikona['id'], 'ikona'); ?>
          <div class="heading"><?php echo $tytul; ?></div>
          <p><?php echo $tresc; ?></p>
            <?php  ?>
          </div>
    <?php endwhile; ?>
    <?php endif; ?>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
