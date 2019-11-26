<?php 

add_shortcode('honeyhome_contact_one','honeyhome_contact_one_shortcode');
function honeyhome_contact_one_shortcode($contact){
	$contactinfo = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
		'sub_title'				 =>'',
	),$contact);
	extract($contactinfo);
	ob_start();
	?>
	<div class="text-center">
		<div class="office">
			<div class="widget-contact">
				<h3><strong><?php echo esc_html($section_title); ?></strong></h3>
				<address>
					<p><?php echo esc_html($section_title2); ?><br>
						<?php echo esc_html($sub_title); ?>
					</p>
				</address>
			</div>
		</div>
	</div>

	<!--End title section -->

	<?php 
	return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_contactinfo_one_el' );
function honeyhome_contactinfo_one_el() {
	vc_map( array(
		"name" => __( "honeyhome contactinfo", "honeyhome" ), 
		"base" => "honeyhome_contact_one",
		"category" => __( "honeyhome", "honeyhome"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "Section Title", "honeyhome" ),
				"param_name" => "section_title",
			),   
			array(
				"type" => "textfield",
				"heading" => __( "Section Text One", "honeyhome" ),
				"param_name" => "section_title2",
			),  

			array(
				"type" => "textfield",
				"heading" => __( "Section Text Two", "honeyhome" ),
				"param_name" => "sub_title",
			), 		 

		)
		
		
	)

);
}






