<?php /**
*Template Name:Home Page
*/

get_header();

?>
    <!--main site-content-->
    <main class="site-content">

	<?php  
		get_template_part("page-template-part/content","slider");
		get_template_part("page-template-part/content","service");
		get_template_part("page-template-part/content","aboutus");
		get_template_part("page-template-part/content","project");
		get_template_part("page-template-part/content","price");
		get_template_part("page-template-part/content","contact");

	?>

      <!--toper -->
      <div class="toper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="page-scroll marginbot-30">
                <a href="#main-slider" id="totop" class="btn btn-circle">
                <i class="fa fa-angle-double-up animated"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End toper -->
  </main>

  <?php 

  	get_footer();