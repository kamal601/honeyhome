<?php 

add_shortcode('honeyhome_contactsocial','honeyhome_contactsocial_shortcode');
function honeyhome_contactsocial_shortcode($contact){
	$contactinfo = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
	),$contact);
	extract($contactinfo);
	ob_start();
	?>
	<div class="text-center">
		<div class="office">
			<div class="widget-contact">
				<h3><strong><?php echo esc_html($section_title); ?></strong></h3>
				<address>
					Email : <br><a href="#"><?php echo esc_html($section_title2); ?></a><br>
					<ul class="company-social">
						<?php
                            $honeyhome_fb = get_field("facebook","user_".get_the_author_meta("ID"));
                            $honeyhome_tw = get_field("twitter","user_".get_the_author_meta("ID"));
                            $honeyhome_gplus = get_field("google_plus","user_".get_the_author_meta("ID"));
                            ?>
                            <?php 
                                if($honeyhome_fb ):
                            ?>
                                <li class="social-facebook"><a href="<?php echo esc_url($honeyhome_fb );?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php 
                                endif;
                            ?>
                              <?php 
                                if($honeyhome_tw ):
                            ?>
							<li class="social-twitter"><a href="<?php echo esc_url($honeyhome_tw );?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php 
                                endif;
                            ?>
                            <?php 
                                if($honeyhome_gplus ):
                            ?>
							
							<li class="social-google"><a href="<?php echo esc_url($honeyhome_gplus );?>" target="_blank"><i
								class="fa fa-google-plus"></i></a></li>
							<?php 
                                endif;
                            ?>
							</ul>
						</address>
					</div>
				</div>

			</div>

	<!--End title section -->

	<?php 
	return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_contactsocial_el' );
function honeyhome_contactsocial_el() {
	vc_map( array(
		"name" => __( "honeyhome social Icon", "honeyhome" ), 
		"base" => "honeyhome_contactsocial",
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
	 

		)
		
		
	)

);
}






