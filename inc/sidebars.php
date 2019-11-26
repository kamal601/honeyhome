<?php 


class fusion_Sidebars{
	public function __construct() {
		add_action('widgets_init', array($this, 'register'));
	}

	public function register() {
		

		register_sidebar( array(
            'name'          => esc_html__('Footer First Section','fusion'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add widgets here for footer First','fusion'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="footer-heading mb-4 text-white">',
            'after_title'   => '</h3>',
        ));
        register_sidebar( array(
            'name'          => esc_html__('Footer Second Section','fusion'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Add widgets here for footer second column','fusion'),
            'before_widget' => '',
            'after_widget'  => '',
           'before_title'  => '<h3 class="footer-heading mb-4 text-white">',
            'after_title'   => '</h3>',
        ));
         register_sidebar( array(
            'name'          => esc_html__('Footer Third Section','fusion'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Add widgets here for footer Third column','fusion'),
            'before_widget' => '',
             'after_widget'  => '',
           'before_title'  => '<h3 class="footer-heading mb-4 text-white">',
            'after_title'   => '</h3>',
         ));
         register_sidebar( array(
             'name'          => esc_html__('Footer Forth Section','fusion'),
             'id'            => 'footer-4',
              'description'   => esc_html__('Add widgets here for footer Forth column','fusion'),
            'before_widget' => '',
            'after_widget'  => '',
           'before_title'  => '<h3 class="footer-heading mb-4 text-white">',
            'after_title'   => '</h3>',
        ));

	/*Custom Widget Register*/

     register_widget('fusion_Footer_forth_widget');
    register_widget('fusion_Footer_first_widget');
    register_widget('fusion_Footer_two_widget');
    register_widget('fusion_Footer_third_widget');


	/*Sidebar Wedgeds*/

	}
	}


//Footer Forth Widget

class fusion_Footer_first_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'contact_form',
            esc_html__('Footer Contact form widget','fusion'),
            array(
                'description'  => esc_html__('this is Footer contactform widget','fusion')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

            <?php echo $instance['linkone']; ?>
        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','fusion');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','fusion');

       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('linkone','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>

       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';

        return $instance;
    }
}



class fusion_Footer_two_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'footer_bottom',
            esc_html__('Footer Second widget','fusion'),
            array(
                'description'  => esc_html__('this is Footer Second widget','fusion')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

            <ul class="footer-link">
                <li><a href="#"><?php echo  $instance['linkone'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkText'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkTwo'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkTwoText'] ; ?></a></li>           
                <li><a href="#"><?php echo  $instance['linkthree'] ; ?></a></li>           
              </ul>

        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','fusion');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','fusion');
        $linkText = !empty($instance['linkText'])? $instance['linkText']: esc_html__('item Two','fusion');
        $linkTwo = !empty($instance['linkTwo'])? $instance['linkTwo']: esc_html__('item three','fusion');
        $linkTwoText = !empty($instance['linkTwoText'])? $instance['linkTwoText']: esc_html__('item four','fusion');
        $linkthree = !empty($instance['linkthree'])? $instance['linkthree']: esc_html__('item four','fusion');
       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('linkone','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkText')); ?>">
                <?php esc_attr_e('linkText','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkText); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>">
                <?php esc_attr_e('linkTwo','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwo')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwo); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>">
                <?php esc_attr_e('linkTwoText','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwoText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwoText); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkthree')); ?>">
                <?php esc_attr_e('linkthree','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkthree')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkthree')); ?>"
                type="text"
                value="<?php echo esc_attr($linkthree); ?>">
        </p>
       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';
        $instance['linkText'] = (!empty($new_instance['linkText']))? strip_tags($new_instance['linkText']):'';
        $instance['linkTwo'] = (!empty($new_instance['linkTwo']))? strip_tags($new_instance['linkTwo']):'';
        $instance['linkTwoText'] = (!empty($new_instance['linkTwoText']))? strip_tags($new_instance['linkTwoText']):'';
        $instance['linkthree'] = (!empty($new_instance['linkthree']))? strip_tags($new_instance['linkthree']):'';
    
        return $instance;
    }
}

class fusion_Footer_third_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'footer_second',
            esc_html__('Footer Third widget','fusion'),
            array(
                'description'  => esc_html__('this is Footer Third widget','fusion')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

            <ul class="footer-link">
                <li><a href="#"><?php echo  $instance['linkone'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkText'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkTwo'] ; ?></a></li>
                <li><a href="#"><?php echo  $instance['linkTwoText'] ; ?></a></li>           
                <li><a href="#"><?php echo  $instance['linkthree'] ; ?></a></li>           
              </ul>

        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','fusion');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','fusion');
        $linkText = !empty($instance['linkText'])? $instance['linkText']: esc_html__('item Two','fusion');
        $linkTwo = !empty($instance['linkTwo'])? $instance['linkTwo']: esc_html__('item three','fusion');
        $linkTwoText = !empty($instance['linkTwoText'])? $instance['linkTwoText']: esc_html__('item four','fusion');
        $linkthree = !empty($instance['linkthree'])? $instance['linkthree']: esc_html__('item four','fusion');
       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('linkone','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkText')); ?>">
                <?php esc_attr_e('linkText','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkText); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>">
                <?php esc_attr_e('linkTwo','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwo')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwo); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>">
                <?php esc_attr_e('linkTwoText','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwoText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwoText); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkthree')); ?>">
                <?php esc_attr_e('linkthree','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkthree')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkthree')); ?>"
                type="text"
                value="<?php echo esc_attr($linkthree); ?>">
        </p>
       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';
        $instance['linkText'] = (!empty($new_instance['linkText']))? strip_tags($new_instance['linkText']):'';
        $instance['linkTwo'] = (!empty($new_instance['linkTwo']))? strip_tags($new_instance['linkTwo']):'';
        $instance['linkTwoText'] = (!empty($new_instance['linkTwoText']))? strip_tags($new_instance['linkTwoText']):'';
        $instance['linkthree'] = (!empty($new_instance['linkthree']))? strip_tags($new_instance['linkthree']):'';
    
        return $instance;
    }
}
class fusion_Footer_Forth_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'footer_forth',
            esc_html__('Footer Forth widget','fusion'),
            array(
                'description'  => esc_html__('this is Footer Third widget','fusion')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

      <ul class="address">
                <li>
                  <a href="#"><i class="lni-map-marker"></i> <?php echo  $instance['linkone'] ; ?> - <br> <?php echo  $instance['linkText'] ; ?></a>
                </li>
                <li>
                  <a href="#"><i class="lni-phone-handset"></i> P: <?php echo  $instance['linkTwo'] ; ?></a>
                </li>
                <li>
                  <a href="#"><i class="lni-envelope"></i> E: <?php echo  $instance['linkTwoText'] ; ?></a>
                </li>
              </ul>


        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','fusion');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','fusion');
        $linkText = !empty($instance['linkText'])? $instance['linkText']: esc_html__('item Two','fusion');
        $linkTwo = !empty($instance['linkTwo'])? $instance['linkTwo']: esc_html__('item three','fusion');
        $linkTwoText = !empty($instance['linkTwoText'])? $instance['linkTwoText']: esc_html__('item four','fusion');
        
       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('Item One','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkText')); ?>">
                <?php esc_attr_e('Item Two','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkText); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>">
                <?php esc_attr_e('Item Three','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwo')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwo); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>">
                <?php esc_attr_e('Item Four','fusion');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwoText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwoText); ?>">
        </p> 
        
       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';
        $instance['linkText'] = (!empty($new_instance['linkText']))? strip_tags($new_instance['linkText']):'';
        $instance['linkTwo'] = (!empty($new_instance['linkTwo']))? strip_tags($new_instance['linkTwo']):'';
        $instance['linkTwoText'] = (!empty($new_instance['linkTwoText']))? strip_tags($new_instance['linkTwoText']):'';
       
    
        return $instance;
    }
}


	new fusion_Sidebars;


