<?php 

add_shortcode('honeyhome_title_one','honeyhome_title_one_shortcode');
function honeyhome_title_one_shortcode($testimonial){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
		'sub_title'				 =>'',
	),$testimonial);
	extract($result);
	ob_start();
	?>
	<div id="contact" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="section-heading-right">
							<h2><strong><?php echo esc_html($section_title); ?></strong><?php echo esc_html($section_title2); ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--End title section -->

	<?php 
	return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_title_one_el' );
function honeyhome_title_one_el() {
	vc_map( array(
		"name" => __( "honeyhome title", "honeyhome" ), 
		"base" => "honeyhome_title_one",
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

		)
		
		
	)

);
}






