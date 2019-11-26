<?php 

add_shortcode('honeyhome_about_us','honeyhome_about_us_shortcode');
function honeyhome_about_us_shortcode($aboutus){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
		'sub_title'				 =>'',
		'honeyhome_aboutus_group'	 =>'',
	),$aboutus);
	extract($result);
	ob_start();
	?>
 <!-- =========================
        aboutus section
        ========================== -->
      <section id="about" class="home-section text-center">
        <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-left">
                  <h2><strong><?php echo esc_html($section_title); ?></strong> <?php echo esc_html($section_title2); ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="paratex">
            <h4><?php echo esc_html($sub_title); ?>
            </h4>
          </div>
          <div class="row">

          <?php 
			$aboutus=vc_param_group_parse_atts($honeyhome_aboutus_group);
			foreach ($aboutus as $spk_class): 
			?>
			<div class="col-sm-6 col-md-3">
              <div class="wow fadeInLeft" data-wow-delay="0.<?php echo esc_html($spk_class['time']); ?>s">
                <div class="team boxed-grey">
                  <div class="inner">
                    <p class="subtitle"><strong><?php echo esc_html($spk_class['title']); ?></strong></p>
                    <h5><?php echo esc_html($spk_class['cont_text']); ?></h5>
                    <div class="avatar">
                    	<?php $src = wp_get_attachment_url($spk_class['image']); ?>
                    	<img src="<?php echo $src; ?>" alt="" class="img-responsive"/></div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
      </section>
      <!-- End aboutus section -->

<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_about_us_el' );
function honeyhome_about_us_el() {
 vc_map( array(
  "name" => __( "honeyhome aboutus Section", "honeyhome" ), 
  "base" => "honeyhome_about_us",
  "category" => __( "honeyhome", "honeyhome"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "honeyhome" ),
			"param_name" => "section_title",
		 ),  
		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "honeyhome" ),
			"param_name" => "section_title2",
		 ), 
		 array(
			"type" => "textfield",
			"heading" => __( "Section Text", "honeyhome" ),
			"param_name" => "sub_title",
		 ),

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'aboutus Section  Group',
			 'param_name'	=>'honeyhome_aboutus_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "attach_image",
					  "heading" 	=> __( "choose Your image", "honeyhome" ),
					  "param_name" 	=> "image",
					 ), 
		  		  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write down Name", "honeyhome" ),
					  "param_name" 	=> "title",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write Down Designation", "honeyhome" ),
					  "param_name" 	=> "cont_text",
					 ), 
					  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write Down Delay Time", "honeyhome" ),
					  "param_name" 	=> "time",
					 ), 
				 )	
			 ),

  		)
		
  	
 	)

  );
}






