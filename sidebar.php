<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honeyHome
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 blog_content_left blog_sidebar">
<?php 
if(function_exists("honeyhome_get_search_form")){
	echo honeyhome_get_search_form(); 
}
	?>
	<?php dynamic_sidebar("Sidebar"); ?>
</div>
