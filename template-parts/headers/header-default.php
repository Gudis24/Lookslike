<?php
/**
 * Defualt Header
 */
?>
<?php $image = get_field('image'); ?>
<div class="headerImage blueish background" style="background:url('<?php  echo $image['url']; ?>')">
  <div class="headerFront flexing siteWidth">
      <div class="headerWrapper flexing siteWidth">
        <div class="headerContent">
          <h1 class="bigTitle">
            <?php
            $post = get_post();
            if(is_archive()):
              if(is_category()):
                echo _e("Kategoria: ", "lookslike").single_cat_title();
              else:
                  echo $post->post_type;
              endif;

            elseif(is_home()):
              echo _e('Blog', 'lookslike');
            else:
              the_title();
            endif;
            ?>
          </h1>
          <?php the_breadcrumb(); ?>
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
