<?php 

add_shortcode('honeyhome_price_one','honeyhome_price_one_shortcode');
function honeyhome_price_one_shortcode($testimonial){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'section_title2'		 =>'',
		'sub_title'				 =>'',
		'honeyhome_price_group'	 =>'',
	),$testimonial);
	extract($result);
	ob_start();
	?>
      <section id="price" class="home-section text-center">
        <div class="heading-about">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="section-heading-left">
                  <h2><strong><?php echo esc_html($section_title); ?></strong></h2>
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
			$price=vc_param_group_parse_atts($honeyhome_price_group);
			foreach ($price as $spk_class): 
			?>
            <div class="col-sm-6 col-md-3 text-center wow animated zoomIn" data-wow-delay="0.<?php echo esc_html($spk_class['package']); ?>s">
              <ul class="plan">
              	<li class="plan-head c-b"><?php echo esc_html($spk_class['package']); ?></li>
              	<li class="main-price"><?php echo esc_html($spk_class['price']); ?></li>
              	  <?php 
					$price_url=vc_param_group_parse_atts($spk_class['honeyhome_price_ul_group']);
					foreach ($price_url as $spk_class): 
					?>
                <li><strong><?php echo esc_html($spk_class['no']) ?></strong> <?php echo esc_html($spk_class['text']) ?></li>
                <?php endforeach; ?>
                <li class="bottom">
                  <a href="#" class="btn"><?php echo esc_html_e('Read More','honeyhome'); ?></a>
                </li>
              </ul>
            </div>
		<?php endforeach; ?>
		</div>
        </div>
      </section>
      <!--End price section -->

<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_price_one_el' );
function honeyhome_price_one_el() {
 vc_map( array(
  "name" => __( "honeyhome Price", "honeyhome" ), 
  "base" => "honeyhome_price_one",
  "category" => __( "honeyhome", "honeyhome"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "honeyhome" ),
			"param_name" => "section_title",
		 ),  

		 array(
			"type" => "textfield",
			"heading" => __( "Section Text", "honeyhome" ),
			"param_name" => "sub_title",
		 ),

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'Pricing Group',
			 'param_name'	=>'honeyhome_price_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "write Down Delay Time", "honeyhome" ),
					  "param_name" 	=> "delay",
					 ),
					array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write down package Name", "honeyhome" ),
					  "param_name" 	=> "package",
					 ), 
		  		  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write down Price", "honeyhome" ),
					  "param_name" 	=> "price",
					 ),
		  		
				  	array(
						 'type'			=>'param_group',
						 'heading'		=>'Pricing ul Group',
						 'param_name'	=>'honeyhome_price_ul_group',
						 'params'=>array(
				  		 array(
							  "type" 		=> "textfield",
							  "heading" 	=> __( "Write Down Nomber", "honeyhome" ),
							  "param_name" 	=> "no",
							 ),
							  array(
							  "type" 		=> "textfield",
							  "heading" 	=> __( "Write Down Text", "honeyhome" ),
							  "param_name" 	=> "text",
							 ), 
				  		 
						 ),	
					 ),

		  		),
			),  		 

  		)
		
  	
 	)

  );
}






