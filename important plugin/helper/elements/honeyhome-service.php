<?php 

add_shortcode('honeyhome_section_one','honeyhome_section_one_shortcode');
function honeyhome_section_one_shortcode($service){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
		'sub_title'				 =>'',
		'honeyhome_service_group'	 =>'',
	),$service);
	extract($result);
	ob_start();
	?>
 <!-- =========================
        Service section
        ========================== -->
      <section id="service" class="home-section text-center">
        <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-right">
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
			$service=vc_param_group_parse_atts($honeyhome_service_group);
			foreach ($service as $spk_class): 
			?>
			<div class="col-xs-12 col-sm-4">	
              <article class="service-item text-center">
                <div class="service-image hvr-image">
                	<?php $src = wp_get_attachment_url($spk_class['image']); ?>
                  <a href="#"><img src="<?php echo $src; ?>" class="img-responsive" alt=""></a>
                </div>
                <h3 class="cap"><strong><?php echo esc_html($spk_class['title']); ?></strong></h3>
                <p class="long-cap"><?php echo esc_html($spk_class['cont_text']); ?>
                </p>
              </article>
            </div>
			<?php endforeach; ?>
          </div>
        </div>
      </section>
      <!-- End Service section -->

<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_section_one_el' );
function honeyhome_section_one_el() {
 vc_map( array(
  "name" => __( "honeyhome Service Section", "honeyhome" ), 
  "base" => "honeyhome_section_one",
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
			 'heading'		=>'Service Section  Group',
			 'param_name'	=>'honeyhome_service_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "attach_image",
					  "heading" 	=> __( "choose Your image", "honeyhome" ),
					  "param_name" 	=> "image",
					 ), 
		  		  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write down Title", "honeyhome" ),
					  "param_name" 	=> "title",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write Down Content", "honeyhome" ),
					  "param_name" 	=> "cont_text",
					 ), 
				 )	
			 ),

  		)
		
  	
 	)

  );
}






