<?php

if (!function_exists('ringray_films_our_offer')) {
  function ringray_films_our_offer($atts) {
    $wpq_offer = new WP_Query([
      'post_type'      => 'post',
      'order'          => 'DESC',
      'orderby'        => 'modified',
      'posts_per_page' => 3,
    ]);
    ob_start();
?>
<div class="our-offer">
    <?php if ($wpq_offer->have_posts()): ?>

      <div class="offers-wrapper">

        <?php while ($wpq_offer->have_posts()): $wpq_offer->the_post(); ?>

          <div id="offer-<?= $wpq_offer->current_post ?>" <?php post_class('offer-single');?>>
              <?= ringray_films_get_video_thumbnail(); ?>
              <h2><?= get_the_title();?></h2>              
          </div>

        <?php endwhile;?>
      
      </div>

    <?php endif; wp_reset_postdata();?>
</div>

<?php
    return ob_get_clean();
  }

  add_shortcode('ringray_films_our_offer', 'ringray_films_our_offer');
}