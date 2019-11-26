<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package honeyHome
 */

get_header();
?>

 <!--main site-content-->
    <main class="site-content">
      <!-- =========================
        blog section
        ========================== -->
      <section id="blog" class="home-section text-center">
        <div class="heading-blog home-section text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-right">
                  <h2><strong> <?php single_post_title(); ?></strong></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-blog p-t-60 p-b-60">
          <div class="container">
            <?php 
            while(have_posts()){
              the_post();
              $dis = get_field("display");
              $class = get_field("add_class");
              ?>
            <div class="blog-item">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 <?php echo $class; ?> <?php echo $dis; ?> wow animated fadeInRight">
                  <div class="blog-img hover-img">
                    <img src="<?php esc_url(the_post_thumbnail_url()) ?>" alt="image">
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="bp-content">
                    <div class="s1">
                      <?php 
                      $image1= get_field('slider_image'); 
                       $image2= get_field('slider_image');
                        ?>
                      <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h2>
                      <?php echo esc_html(wp_trim_words( get_the_content(), 28, '...' ));?>
                      <a href="<?php the_permalink(); ?>" class="btn-blog"><?php echo esc_html_e("Read More","honeyhome"); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php } ?>
  
            <div class="col-xs-12">
              <nav class="pagination  text-center">
                 <?php 
                     if (function_exists("pagination")){
                        echo pagination();
                }; ?>
              </nav>
            </div>
          </div>
        </div>
      </section>


      <!-- End blog section -->
  
<?php

get_footer();
