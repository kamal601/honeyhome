<?php 

add_shortcode('honeyhome_google_map_one','honeyhome_google_map_one_shortcode');
function honeyhome_google_map_one_shortcode($google_map){
	$result = shortcode_atts(array(
		'width'			 =>'',
		'height'		=>'',
		'location'		 =>'',
		'zoom'				 =>'',
	),$google_map);
	extract($result);
	ob_start();
	?>

    <!--==========================
      google_map google_map
    ============================-->

    <div class="container">
      <!--google map -->
      <div class="row">
        <div class="col-md-12">
          <div class="ct maps_area">                  <!-- Author Box -->
           <iframe width="<?php echo esc_html($width); ?>" height="<?php echo esc_html($height); ?>" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo esc_html($location); ?>&t=&z=<?php echo esc_html($zoom); ?>&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

           </iframe>
       </div>
      </div>
  </div>
</div>
<!-- #google_map -->





<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'honeyhome_google_map_one_el' );
function honeyhome_google_map_one_el() {
 vc_map( array(
  "name" => __( "honeyhome google map", "honeyhome" ), 
  "base" => "honeyhome_google_map_one",
  "category" => __( "honeyhome", "honeyhome"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Google map width", "honeyhome" ),
			"param_name" => "width",
		 ), 
		 array(
			"type" => "textfield",
			"heading" => __( "Google map height", "honeyhome" ),
			"param_name" => "hieght",
		 ), 
		 array(
			"type" => "textfield",
			"heading" => __( "Google map Location", "honeyhome" ),
			"param_name" => "location"
		 ), 
		 array(
			"type" => "textfield",
			"heading" => __( "Google map Zoom", "honeyhome" ),
			"param_name" => "zoom",
		 ),

  		)
		
  	
 	)

  );
}







