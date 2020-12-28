<?php get_header(); ?>
<div class="container">
  <section class="BriefSection ">
    <div class="sectionContent flexing siteWidth">

      <?php
      $args = array(
      'post_type' => 'brief',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      );

      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) : $loop->the_post();
      ?>
      <div class="columnsWrapper flexing bg">

          <a href="<?php the_permalink();?>" class="column_4 offer odd">
             <div class="heading">
               <h2>
                 <?php the_title() ?>
              </h2>
             </div>

          </a>





          </div>
      <?php
      endwhile;

      wp_reset_postdata();
       ?>

    </div>
  </section>
</div>
<style>
.heading{
  transition:300ms;
  color:#000;
  font-weight:bold;
}
.columnsWrapper .heading:hover{
  color:#fff;
}
.BriefSection .sectionContent{
  justify-content: space-around;
}
.BriefSection .column_4{
  min-width:295px;

}
.heading h2{
  font-size:20px;
  text-align:center;
  margin:0 auto;
}
.BriefSection .column_4{
  text-align:center;
}
@media (max-width:980px){
  .columnsWrapper{
    margin:30px;
  }
}
</style>
<?php get_footer(); ?>
