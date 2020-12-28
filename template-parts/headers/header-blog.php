<?php
/**
 * Blog Header
 */
?>
<div class="headerImage blueish background" style="background:url('<?php  echo get_the_post_thumbnail_url(); ?>')">
  <div class="headerFront flexing siteWidth">
      <div class="headerWrapper flexing siteWidth">
        <div class="headerContent">
          <h1 class="bigTitle">
            <?php
            the_title();
            ?>
          </h1>
          <?php the_breadcrumb(); ?>
          <div class="meta">
            <div class="dataDodania"><time><?php the_date('F j Y'); ?></time>, <?php the_author(); ?></div>
            <div class="categories"><?php the_category("<span>, </span> "); ?></div>
          </div>
        </div>
        <?php if ( $socialMedia ): ?>
        <div class="socialMedia flexing">
          <a href="<?php echo $socialMedia['facebook']; ?>" target="_blank"> <i class="icon icon-facebook"></i></a>
          <a href="<?php echo $socialMedia['linkedin']; ?>" target="_blank"> <i class="icon icon-linkedin"></i></a>
          <a href="<?php echo $socialMedia['behance']; ?>" target="_blank"> <i class="icon icon-behance"></i></a>
        </div>
        <?php endif; ?>
    </div>
  </div>
</div>
