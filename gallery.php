<?php
/**
 * Template Name: Gallery
 *
 * @since: 1.0
 * @package ringray-films
 */

get_header();

$categories = get_categories([
  'orderby' => 'name',
  'order' => 'ASC',
]);

foreach ($categories as $cat):
  $videos = new WP_Query([
    'post_type' => 'post',
    'category__in' => $cat->term_id,
    'posts_per_page' => 10,
    'order_by' => 'date',
    'order' => 'ASC',
  ]);
?>

  <h2><?php echo $cat->name; ?></h2>

    <?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
      <article id="<?php get_the_ID(); ?>" class="site-main">
        <h3><?php the_title(); ?></h3>
      </article><!-- #<?php get_the_ID(); ?> -->
    <?php endwhile; // End of the loop. ?>


<?php
wp_reset_postdata();
unset($videos);
endforeach;

get_footer();
