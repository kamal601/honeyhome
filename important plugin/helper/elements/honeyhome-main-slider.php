<?php 
add_shortcode('honeyhome_main_slider','honeyhome_main_slider_shortcode');
function honeyhome_main_slider_shortcode($slider){
  $result = shortcode_atts(array(
    'honeyhome_slider_group'   =>'',

  ),$slider);
  extract($result);
  ob_start();
  ?>
      <!-- =========================
        slider section
        ========================== -->
      <section id="main-slider" class="no-margin" data-ride="carousel" data-pause="false" data-interval="7000">
        <div class="carousel slide">
          <div class="carousel-inner">
      <?php 
        $intro_link=vc_param_group_parse_atts($honeyhome_slider_group);

          foreach ($intro_link as $intro_slider): 
        ?>
            <div class="item <?php echo esc_attr($intro_slider['active']); ?> slide-img-<?php echo esc_attr($intro_slider['imageno']); ?>">
              <div class="container">
                <div class="row slide-margin">
                  <div class="col-sm-6">
                    <div class="carousel-content">
                      <h1 class="animation animated-item-1 tp-caption"><strong><?php echo esc_html($intro_slider['slider_title']); ?></strong></h1>
                      <h2 class="animation animated-item-2 tp-caption"><?php echo esc_html($intro_slider['slider_sub']); ?><br><?php echo esc_html($intro_slider['slider_sub2']); ?></h2>
                      </h2>
                      <a class="btn-slide animation animated-item-3" href="#"><?php echo esc_html($intro_slider['btn']); ?></a>
                    </div>
                  </div>
                  <div class="col-sm-6 hidden-xs animation animated-item-4">
                    <div class="slider-img">
                      <?php $src = wp_get_attachment_url($intro_slider['image']); ?>
                      <img src="<?php echo $src; ?>" alt="image" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
          <!--/.carousel-inner-->
        </div>
        <!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
        </a>
      </section>
      <!-- End slider section -->
  <?php 
  return ob_get_clean(); 
}  
   

add_action( 'vc_before_init', 'honeyhome_main_slider_el' );
function honeyhome_main_slider_el() {
	vc_map( array(
		"name" => __( "Main Slider", "honeyhome" ), 
		"base" => "honeyhome_main_slider",
		"category" => __( "honeyhome", "honeyhome"),
		"params" => array(
			  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'honeyhome slider  Group',
			 'param_name'	=>'honeyhome_slider_group',
			 'params'=>array(
		  		 array(
				"type" => "textfield",
				"heading" => __( "Give Title", "honeyhome" ),
				"param_name" => "slider_title",
			), 
				array(
					"type" => "textfield",
					"heading" => __( "Give Sub Title", "honeyhome" ),
					"param_name" => "slider_sub",
				), 
        array(
          "type" => "textfield",
          "heading" => __( "Give Sub Title", "honeyhome" ),
          "param_name" => "slider_sub2",
        ), 

				 array(
					"type" 		=> "attach_image",
					"heading" 		=> __( "Upload Image", "honeyhome" ),
					 "param_name" 	=> "image",
				), 
				 array(
					"type" 		=> "textfield",
					"heading" 		=> __( "button text", "honeyhome" ),
					 "param_name" 	=> "btn",
				),
		  		 
		  		 array(
					"type" 		=> "textfield",
					"heading" 		=> __( "Slider Active/Not active", "honeyhome" ),
					 "param_name" 	=> "active",
				),
				 array(
					"type" 		=> "textfield",
					"heading" 		=> __( "Slider image no", "honeyhome" ),
					 "param_name" 	=> "imageno",
				),
		  		 
				 )	
			 ),
		),

	) );
}
