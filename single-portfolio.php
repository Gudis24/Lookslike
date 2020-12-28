<?php
/**
 *
 *
 */

get_header();
?>
<?php
$post = get_post();
 ?>
<div class="singlePortfolio">
  <a href="<?php echo get_site_url().'/'.$post->post_type.'/'; ?>" class="goBack"><i class="icon icon-cross"></i></a>
  <div class="portfolioHeader">
    <div class="flexing">
      <?php echo get_the_post_thumbnail(); ?>
      <div class="portfolioContent contentSingle">
        <h1 class="title"><?php echo get_field('tytul'); ?></h1>
        <p><?php echo get_field('tresc'); ?></p>
        <div>
          <?php echo get_field('funkcje'); ?>
          <?php $cms = get_field('cms'); ?>
          <div class="flexing cmsWrapper">
            <?php foreach ($cms as $key => $c): ?>
               <div class="cms flexing"><?php echo $c; ?></div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="buttonContainer">
          <a href="<?= get_site_url() ?>/kontakt" class="button portfolio-single-wycena"><?php _e('Darmowa wycena','lookslike'); ?></a><a target="_blank" href="<?php echo get_field('link'); ?>" class="button noBGbutton colorFull portfolio-single-witryna"><?php _e('Zobacz online','lookslike'); ?></a>
        </div>

      </div>
    </div>
  </div>
  <div class="technology">
    <?php $ikony = get_field('ikony'); ?>
    <?php if($ikony): ?>
    <div class="portfolioContent contentSingle flexing">
      <div class="flexing cmsWrapper ikony">
        <div class="wrapper flexing">
          <h3 class="title"><?php echo get_field('tytul_drugi'); ?></h3>
          <p><?php echo get_field('tresc_druga'); ?></p>
          <div class="flexing ikonyWrapper">
            <?php foreach ($ikony as $key => $i): ?>
               <div class="cms flexing ikony-inner"><?php echo $i; ?></div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php if( have_rows('urzadzenia') ): // grupa
        while( have_rows('urzadzenia')): the_row();?>
      <div class="devices">
          <?php $desktop = get_sub_field('desktop'); ?>
          <?php $ipad = get_sub_field('ipad'); ?>
          <?php $iphone = get_sub_field('iphone'); ?>
        <div class="deviceWrapper">
          <div class="wrapper flexing">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/dist/images/devices/i-mac.png" alt="Strony internetowe stworzone pod safari, MAC" class="desktop">
            <?php echo wp_get_attachment_image($desktop['id'], 'desktop'); ?>
            <div class="ipad-wrapper">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/dist/images/devices/i-pad.png" alt="Strony internetowe stworzone pod ipad, tablet" class="ipad">
              <?php echo wp_get_attachment_image($ipad['id'], 'ipad'); ?>
            </div>
            <div class="iphone-wrapper">
              <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/dist/images/devices/i-phone.png" alt="Strony internetowe stworzone pod iphone, android, smartphone" class="iphone">
              <?php echo wp_get_attachment_image($iphone['id'], 'iphone'); ?>
            </div>
          </div>
        </div>
      </div>
                <?php endwhile; endif; ?>
    </div>
  <?php endif; ?>
  </div>
  <div class="siteWidth">

    <div class="columnsWrapper flexing">
      <div class="contentSingle">
        <?php the_content(); ?>
      </div>
      <div class="postNavigation">
        <a href="<?php echo get_site_url().'/'.$post->post_type.'/'; ?>" class="backProtfolio"><i class="icon prevArrow"></i> <?php _e('WRÓĆ DO PORTFOLIO','lookslike') ?></a>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
