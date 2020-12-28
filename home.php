<?php get_header(); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v7.0&appId=2446485202254045&autoLogAppEvents=1"></script>
<div class="pageContainer">
  <div class="siteWidth">
    <div class="columnsWrapper flexing blogContent">
      <div class="posts">
          <?php
            $args = new WP_Query( array(
              'post_type' => 'post',
              'posts_per_page' => -1,
              'order' => 'ASC'
            )
            );
          ?>
        <?php
        if ( $args->have_posts() ) :
          $licznik = 0;
          while ( $args->have_posts() ) : $args->the_post();
          if($licznik == 0):
              ?>
              <div class="columnBlog">

                <div class="imageBg" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)" >
                  <a href="<?= get_permalink() ?>">
                  <div>
                    <?php
                      the_title( '<a href="' . esc_url( get_permalink() ) . '" class="titleHrefReverse"><h2>', '</h2></a>');
                     ?>
                    <time>
                      <?php
                      echo get_the_date('F j Y');
                      ?>
                    </time>
                    <?php
                    the_author();
                    echo "<br>";
                    the_category("<span>, </span> ");
                    ?>

                    <p class="blogButton">
                      <a href="<?php the_permalink(); ?>"><?php _e('Czytaj więcej','lookslike') ?></a>
                    </p>
                  </div>
                </a>
              </div>
            </div>
              <?php
            else:
              ?>
              <div class="columnBlog">
                <div class="left">
                  <a href="<?= get_permalink() ?>">
                  <?php
                  the_post_thumbnail('blog');
                  ?>
                  </a>
                </div>
                <div class="right">
                  <div class="topBar">
                    <time>
                      <?php
                      echo get_the_date('F j Y');
                      ?>
                    </time>
                    <?php
                    echo ", ";
                    the_author();
                    echo " - ";
                    the_category("<span>, </span> ");
                    ?>
                </div>
                <?php
                  the_title( '<a href="'.get_permalink().'"><h2>', '</h2></a>' );
                  the_excerpt();
                    ?>
                    <p class="blogButton">
                      <a href="<?php the_permalink(); ?>"><?php _e('Czytaj więcej','lookslike') ?></a>
                    </p>
                </div>
              </div>
                  <?php
                endif;
                $licznik++;
              endwhile;
          endif;
          ?>

        </div>


      <div class="sidebar">
        <div class="recentPosts">
          <h5><?php _e('Najnowsze wpisy','lookslike') ?></h5>
          <ul class="postsList clearList">
            <?php
            $recent_posts = wp_get_recent_posts(array('post_type'=>'post'));
            foreach( $recent_posts as $recent ){
                echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
            }
             ?>
          </ul>
        </div>
        <div class="categories clearList">
          <h5><?php _e('Kategorie','lookslike') ?></h5>
            <?php
            wp_list_categories('title_li=');
             ?>
        </div>
        <div class="facebook">
          <h5><?php _e('Polub nas na facebooku', 'lookslike') ?></h5>
          <div class="fb-page" data-href="https://www.facebook.com/lookslikepl/" data-tabs="message" data-width="250" data-height="" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/lookslikepl/" class="fb-xfbml-parse-ignore">
              <a href="https://www.facebook.com/lookslikepl/">lookslike.pl</a>
            </blockquote>
          </div>
        </div>
        <div class="Project">
          <h5><?php _e('Zrealizuj swój projekt','lookslike') ?></h5>
          <div class="headerProject">
            <div>
              <img src="<?= get_template_directory_uri()?>/dist/images/logoWhite.svg" alt="Projektowanie sklepów internetowych oraz logo">
            </div>
            <div>
              <p><?php _e('Wypełnij krótki Brief, a my wycenimy Twój pomysł','lookslike') ?></p>
              <button class="button buttonSidebar"><?php _e('Wypełnij Brief','lookslike') ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
