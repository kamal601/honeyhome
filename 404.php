<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package honeyHome
 */

get_header();
?>
<?php while(have_posts()){
  the_post();
?>
 <!--404-->
    <div class="bg-404">
      <div class="container text-center">
    <!--404-->
    <div class="bg-404">
      <div class="container text-center">
        <div class="wrapper wow fadeInUp delay-05s" >
          <h3 class="title"><?php echo esc_html_e("404","honeyhome"); ?></h3>
          <h4 class="sub-title"><?php echo esc_html_e("PAGE NOT FOUND","honeyhome"); ?></h4>
          <h4 class="sm-title"><?php echo esc_html_e("The page you are looking for doesn't exist or an other error occurred.","honeyhome"); ?></h4>
          <a href="<?php the_front_page_url(); ?>" class="btn btn-submit"><?php echo esc_html_e("PAGE NOT FOUND","honeyhome"); ?></a>
        </div>
      </div>
    </div>
    <?php } ?>
    <!--/ 404-->

<?php
get_sidebar();
get_footer();
