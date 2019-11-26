<?php
/**
 * The template for displaying archive pages
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
        single blog section
        ========================== -->
      <section id="blog" class="home-section text-center">
        <div class="heading-blog home-section text-centerz">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-right">
                  <h2><strong> <?php single_tag_title(); ?></strong></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="blog_container blog_container_deatils_leftbar" id="blog-post">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 blog-content">
                <?php while(have_posts()){
                	the_post();
                ?>
                <article>
                  <!-- slider -->
                  <div class="img-holder">
                    <div id="myCarousel0" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel0" data-slide-to="0"
                          class="active"></li>
                        <li data-target="#myCarousel0" data-slide-to="1"></li>
                      </ol>
                      <div class="carousel-inner" role="listbox">
                    <?php 
                      $image1= get_field('slider_image'); 
                       $image2= get_field('slider_image_2');
                        ?>
                        <div class="item active">
                          <?php the_post_thumbnail(); ?>
                        </div>
                        <?php if( $image1): ?>
                        <div class="item">
                          <img src="<?php echo esc_url( $image1 ); ?> " alt="image">
                        </div>
                      <?php endif;

                      if($image2):
                       ?>
                        <div class="item">
                          <img src="<?php echo esc_url( $image2 ); ?> " alt="image">
                        </div>
                      <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <!--end of slider-->
                  <div class="post-meta clear-fix">
                    <div class="post-date">
                      <ul>
                        <li><span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                          <span>Date : </span>
                          <?php esc_html(the_time('d F Y')); ?>
                        </li>
                        <li><span><i class="fa fa-user" aria-hidden="true"></i></span>
                          <span>Author :</span><?php the_author(); ?>
                        </li>
                        <li><span><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                          <span>Comments :</span><?php echo get_comments_number();  ?>
                          Comments
                        </li>
                      </ul>
                    </div>
                    <div class="post-title">
                      <h2><?php the_title(); ?></h2>
                    </div>
                  </div>
                  <br>
                  	<?php echo esc_html(the_content()); ?>
                 </article>
             <?php } ?>
         </div>
         <?php get_sidebar(); ?>
     </div>
 </div>
</div>
</section>
                
<?php
get_footer();
