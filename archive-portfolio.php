<?php
/**
 * Template Name: Oferta
 * Template Post Type: page
 */

get_header();
?>
<div class="pageContainer portfolioPage">
  <div class="siteWidth fullWidth">
    <?php
      $args = new WP_Query( array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'order' => 'ASC'
      )
      );
    ?>
      <div class="gridBox portfolioWrapper">
        <?php $i = 0; ?>
        <?php while ( $args->have_posts() ) : $args->the_post(); ?>
          <?php $i++; ?>
          <a href="<?php the_permalink(); ?>" class="portfolioItem PagePortfolioitem<?= $i ?>">
            <figure>
              <?php $tags = get_the_tags(); ?>
              <div class="tags flexing">
                <?php foreach ($tags as $key => $tag) : ?>
                 <div class="tag button <?php echo $tag->slug; ?>"> <?php echo $tag->name; ?></div>
                <?php endforeach; ?>
              </div>
              <?php if (get_post_thumbnail_id()): ?>
                <?php echo wp_get_attachment_image(get_post_thumbnail_id(),'portfolio') ?>
              <?php else: ?>
                <?php echo wp_get_attachment_image(290,'portfolio') ?>
              <?php endif; ?>

              <figcaption><?php the_title(); ?></figcaption>
            </figure>
          </a>
        <?php endwhile; wp_reset_query(); ?>
      </div>
  </div>
</div>

<?php get_footer(); ?>
