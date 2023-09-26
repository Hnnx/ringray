<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ringray-films
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ringray_films_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ringray_films_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ringray_films_pingback_header() {
	/* if ( is_singular() && pings_open() ) { */
	/* 	printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) ); */
	/* } */
}
add_action( 'wp_head', 'ringray_films_pingback_header' );

function dd(...$parameters) {
  echo '<pre>';
  foreach ($parameters as $p) {
    var_dump($p);
  }
  echo '</pre>';
  die();
}

function ringray_films_get_video_thumbnail() {
  // This function must be used insede the loop
  $video_link = get_post_meta(get_the_ID(), 'video_link', true);

  if (preg_match('/youtube\.com/i', $video_link)) {
    $query = parse_url($video_link)['query'];
    $qs = explode('&', $query);
    $yt_video_ID = '';

    foreach ($qs as $q) {
      if(preg_match('/^v=(.*)$/', $q, $yt_video_ID)) break;
    }

    return '<img src="https://img.youtube.com/vi/' . $yt_video_ID[1] . '/3.jpg" alt="">';
  } else {
    return '<img src="'. get_template_directory_uri().'/assets/imgs/'.'trak.svg">';
  }
}

if ( ! function_exists('lvar_dump') ) {
  function lvar_dump(){
      $args = func_get_args();

          echo '<pre>';
    array_map('var_dump', $args);
          echo '</pre>';

  }
}


function custom_polylang_langswitcher() {
  $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 0, 'raw' => 1 ) );
  // var_dump($langs_array);
  if ($langs_array) : ?>
  <div class="drop-block lang">
      <?php foreach ($langs_array as $lang) : ?>
      <a href="<?php echo $lang['url']; ?>" class="drop-block__link icon-<?php echo $lang['slug']; ?>">
          <img width="32" height="32" src="<?php echo $lang['flag']; ?>" alt="<?php echo $lang['slug']; ?>" />
      </a>
      <?php endforeach; ?>
  </div>
  <?php endif; 
}

add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );