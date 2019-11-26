<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honeyHome
 */

?>
      <!--toper -->
      <div class="toper">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="page-scroll marginbot-30">
                <a href="#body" id="totop" class="btn btn-circle">
                <i class="fa fa-angle-double-up animated"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--End toper -->
 <!-- =========================
        Section:footer
        ========================== -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
             <?php dynamic_sidebar("copyright"); ?>            </div>
          </div>
        </div>
      </footer>
      <!-- /End Section:footer -->
    </main>
    
<?php wp_footer(); ?>
  </body>


</html>


	