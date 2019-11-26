<?php 

add_shortcode('project_post','project_post_shortcode');
function project_post_shortcode($slider){
	$result = shortcode_atts(array(
		'count' =>'',
		'title' =>'',
		'titletwo' =>'',
    'text' =>'',
	),$slider);
	extract($result);
	ob_start();
	?>
        <!-- =========================
        project section
        ========================== -->
      <section id="project" class="home-section text-center">
        <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-right">
                  <h2><strong><?php echo esc_html($title); ?></strong> <?php echo esc_html($titletwo); ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="paratex">
            <h4><?php echo esc_html($text); ?>
            </h4>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <!-- ISO section -->
              <div class="iso-section">
                <ul class="filter-wrapper clearfix">
                  <li><a href="#" data-filter="*" class="selected opc-main-bg">ALL</a></li>
                <?php 
                  $category = get_terms('project_category',array('hide_empty'=>true));
                  foreach ($category as $p_cat) :
                    echo '<li><a href="#" class="opc-main-bg" data-filter=".'.$p_cat->slug.'">'.$p_cat->name.'</a></li>';
                  endforeach;
                 ?>
                </ul>
                <div class="iso-box-section">
                  <div class="iso-box-wrapper col4-iso-box">
            <?php 

                $project_section= new WP_Query(array(
                  'post_type'=>'project',
                  'posts_per_page'=>$count,

                ));

               while($project_section->have_posts()):($project_section->the_post());

                  $p_category= get_the_terms(get_the_ID(),'project_category');
                  $port_cat_slug = array();
                  foreach ($p_category as $cat_term) :
                    $port_cat_slug[] = $cat_term->slug;
                  endforeach;
                  $port_cat_class = join('  ', $port_cat_slug );
              ?>
                    <div class="iso-box <?php echo $port_cat_class; ?> col-md-4 col-sm-4 col-xs-12">
                      <div class="view view-first">
                        <a href="<?php the_post_thumbnail_url(); ?>" data-lightbox-gallery="portfolio-gallery">
                          <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive"
                            alt="portfolio "/>
                          <div class="mask">
                            <div class="info"><?php echo esc_html_e("View","honeyhome"); ?></div>
                            <?php the_content(); ?>
                          </div>
                        </a>
                      </div>
                    </div>
                  <?php endwhile; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End project section -->      	


<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'project_post_el' );
function project_post_el() {
 vc_map( array(
  "name" => __( "Honey Home project", "honeyhome" ), 
  "base" => "project_post",
  "category" => __( "honeyhome", "honeyhome"),
  "params" => array( 
		  
		 array(
			 "type" => "textfield",
			 "heading" => __( "project Item number", "honeyhome" ),
			 "param_name" => "count",
		  ), 
		 array(
			 "type" => "textfield",
			 "heading" => esc_html__( "Title One", "honeyhome" ),
			 "param_name" => "title",
		  ), 
		 array(
			 "type" => "textfield",
			 "heading" => esc_html__( "Title two", "honeyhome" ),
			 "param_name" => "titletwo", 
		  ), 
     array(
       "type" => "textarea",
       "heading" => esc_html__( "Header Text", "honeyhome" ),
       "param_name" => "text", 
      ),  
     array(
       "type" => "textfield",
       "heading" => esc_html__( "Column Number", "honeyhome" ),
       "param_name" => "cln", 
      ), 

				
		 ),
		
 	) );
}
