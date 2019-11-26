<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                  <h2><strong><?php echo esc_html_e('Single Page') ?> </strong></h2>
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
                          <span><?php echo esc_html_e("Date :","honeyhome") ?> </span>
                          <?php esc_html(the_time('d F Y')); ?>
                        </li>
                        <li><span><i class="fa fa-user" aria-hidden="true"></i></span>
                          <span>Author :</span><?php the_author(); ?>
                        </li>
                        <li><span><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                          <span><?php echo esc_html_e("Comments :","honeyhome") ?></span><?php echo get_comments_number();  ?>
                          
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
                 <article>
                  <!-- shear button -->
                  <div class="row shear_area">
                    <div class="col-lg-12">
                      <div class="shear">
                        <h6><?php echo esc_html_e("Share :","honeyhome") ?></h6>
                        <div class="social_button">
                          <ul>
                          	<?php
                            $honeyhome_fb = get_field("facebook","user_".get_the_author_meta("ID"));
                            $honeyhome_tw = get_field("twitter","user_".get_the_author_meta("ID"));
                            $honeyhome_gplus = get_field("google_plus","user_".get_the_author_meta("ID"));
                            $honeyhome_ldin = get_field("linkedin","user_".get_the_author_meta("ID"));
                            ?>
                            <?php 
                                if($honeyhome_fb ):
                            ?>
                                <li><a href="<?php echo esc_url($honeyhome_fb );?>" class="tran3s"><i class="fa fa-facebook"></i></a></li>
                            <?php 
                                endif;
                            ?>
                              <?php 
                                if($honeyhome_tw ):
                            ?>
                            <li><a href="<?php echo esc_url($honeyhome_tw );?>" class="tran3s"><i class="fa fa-twitter"></i></a>
                            </li>
                             <?php 
                                endif;
                            ?>
                              <?php 
                                if($honeyhome_tw ):
                            ?>
                            <li><a href="<?php echo esc_url($honeyhome_gplus );?>" class="tran3s"><i
                              class="fa fa-google-plus"></i></a>
                            </li>
                             <?php 
                                endif;
                            ?>
                              <?php 
                                if($honeyhome_tw ):
                            ?>
                            <li><a href="<?php echo esc_url($honeyhome_ldin );?>" class="tran3s"><i
                              class="fa fa-linkedin"></i></a>
                            </li>
                            <?php 
                                endif;
                            ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!--end of shear button -->
                  <!-- comment area -->
                  <div class="comments_area clear-fix">
                    <h4><?php echo esc_html_e("comments list","honeyhome") ?></h4>

                  </div>
                  <!-- End of comment -->
                  <!-- comment-box -->
                  <div class="comment-box clear-fix">
                    <div>
                      <div>
                        <div class="comment-box-title">
                          <div>
                            <h4><?php echo esc_html_e("Type Your comments","honeyhome") ?></h4>
                          </div>
                        </div>
                                      <?php if(!post_password_required()){
                                    comments_template();
                                };
                                
                                ?>
                       
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              <!-- =========================
                Blog Sidebar right
                ========================== -->
             <?php get_sidebar(); ?>
              <!-- End blog_sidebar right -->
            </div>
          </div>
        </div>
      </section>
      <!-- End blog section -->

	
<?php
get_footer();
