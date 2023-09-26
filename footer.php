<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ringray-films
 */

?>

</div><!-- #page -->


  <footer id="colophon" class="site-footer">
    
    <div class="footer-column col-1">
    <?php
    if (is_active_sidebar('footer-sidebar-1')):
      dynamic_sidebar('footer-sidebar-1');
    endif;
    ?>

    </div>

    <div class="footer-column col-2">
    <?php
    if (is_active_sidebar('footer-sidebar-2')):
      dynamic_sidebar('footer-sidebar-2');
    endif;
    ?>

    </div>
      

    <div class="footer-column col-3">
    <?php
    if (is_active_sidebar('footer-sidebar-3')):
      dynamic_sidebar('footer-sidebar-3');
    endif;
    ?>

    </div>
  </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
