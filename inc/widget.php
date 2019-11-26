<?php
class mamurjorit_Sidebars{
    public function __construct() {
        add_action('widgets_init', array($this, 'register'));
    }   

    public function register() {


        register_sidebar( array(
            'name'          => esc_html__('Google Map Section','mamurjorit'),
            'id'            => 'map-sidebar',
            'description'   => esc_html__('Add widgets here for google Map','mamurjorit'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   =>'',
        ));
        register_sidebar( array(
            'name'          => esc_html__('Contact info Section','mamurjorit'),
            'id'            => 'contactinfo',
            'description'   => esc_html__('Add widgets here for Contact info','mamurjorit'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<p>',
            'after_title'   =>'</p>',
        ));
        register_sidebar( array(
            'name'          => esc_html__('Social Follow Section','mamurjorit'),
            'id'            => 'follow',
            'description'   => esc_html__('Add widgets here for Social Follow','mamurjorit'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h4>',
            'after_title'   =>'</h4>',
        ));
        register_sidebar( array(
            'name'          => esc_html__('Footer Copy right Section','mamurjorit'),
            'id'            => 'copyright',
            'description'   => esc_html__('Add widgets here for Footer Copy right','mamurjorit'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   =>'',
        ));



    }
}



/**
 * Widget API: WP_Widget_Search class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Search widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
// class honeyhome_Custom_Search extends WP_Widget_Search {
//     public function widget( $args, $instance ) {
//         $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

//         /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
//         $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

//         echo $args['before_widget'];
//         if ( $title ) {
//             echo $args['before_title'] . $title . $args['after_title'];
//         }
//         echo'<form role="search" method="get" class="search-form">';
//         echo'<div class="search_item_holder">';
//         echo'<input type="text" class="search-field" placeholder="Search …">';
//         echo '<div class="p-color-bg">';
//         echo'<input type="submit" value=""><i class="fa fa-search" aria-hidden="true"></i>';
//         echo'</div></div>';
//         echo'</form>';
//         // Use current theme search form if it exists
//         echo $args['after_widget'];
//     }

    
// }




/***Start Recent Post**/

class honeyhome_custom_recent_post extends WP_Widget_Recent_Posts {
        public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ), $instance ) );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
        <?php echo $args['before_widget']; 
        echo '<div class="recent_blog">';
        ?>

        <?php
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
    
        <ul class="recent-post">
            <?php while($r->have_posts()):$r->the_post(); ?>
                  <div class="recent_blog_single_item clear-fix">
                    <div class="img-content float-left">
                      <img src="<?php the_post_thumbnail_url(); ?>" alt="image">
                    </div>
                    <div class="text float-left">
                      <a href="#"><?php the_title(); ?></a>
                      <span><?php the_time('d F Y'); ?></span>
                    </div>
                  </div>

            <?php endwhile; ?>
        </ul>
        
        <?php
        echo '</div>';
        echo $args['after_widget'];
    }
}

/***Ends Recent Post**/



/***Start Custom Categoris**/

class honeyhome_custom_categories extends WP_Widget_Categories {

    
    public function widget( $args, $instance ) {
        static $first_dropdown = true;

        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo '<div class="category_list">';

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $cat_args = array(
            'orderby'      => 'name',
            // 'show_count'   => $c,
            'hierarchical' => $h,
        );

        if ( $d ) {
            echo sprintf( '<form action="%s" method="get">', esc_url( home_url() ) );
            $dropdown_id = ( $first_dropdown ) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";
            $first_dropdown = false;

            echo '<label class="screen-reader-text" for="' . esc_attr( $dropdown_id ) . '">' . $title . '</label>';

            $cat_args['show_option_none'] = __( 'Select Category' );
            $cat_args['id'] = $dropdown_id;

            /**
             * Filters the arguments for the Categories widget drop-down.
             *
             * @since 2.8.0
             * @since 4.9.0 Added the `$instance` parameter.
             *
             * @see wp_dropdown_categories()
             *
             * @param array $cat_args An array of Categories widget drop-down arguments.
             * @param array $instance Array of settings for the current widget.
             */
            wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args, $instance ) );

            echo '</form>';
            ?>

<script type='text/javascript'>
/* <![CDATA[ */
(function() {
    var dropdown = document.getElementById( "<?php echo esc_js( $dropdown_id ); ?>" );
    function onCatChange() {
        if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
            dropdown.parentNode.submit();
        }
    }
    dropdown.onchange = onCatChange;
})();
/* ]]> */
</script>

<?php
        } else {
?>
        
        <ul>
<?php
        $cat_args['title_li'] = '';
        $cat_args['echo'] = 0;

        /**
         * Filters the arguments for the Categories widget.
         *
         * @since 2.8.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @param array $cat_args An array of Categories widget options.
         * @param array $instance Array of settings for the current widget.
         */
        $category = wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );

    $category = str_replace('cat-item ', 'widget_categories', $category);
        echo $category;
?>
        </ul>
<?php
        }

        echo '</div>';
    }
}

/***Ends Custom Categoris*/


/***Start Tags Clude**/

class honeyhome_custom_tags_clud extends WP_Widget_Tag_Cloud {

    /**
     * Sets up a new Tag Cloud widget instance.
     *
     * @since 2.8.0
     */


    /**
     * Outputs the content for the current Tag Cloud widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Tag Cloud widget instance.
     */
    public function widget( $args, $instance ) {
        $current_taxonomy = $this->_get_current_taxonomy( $instance );

        if ( ! empty( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            if ( 'post_tag' === $current_taxonomy ) {
                $title = __( 'Tags' );
            } else {
                $tax = get_taxonomy( $current_taxonomy );
                $title = $tax->labels->name;
            }
        }

        $show_count = ! empty( $instance['count'] );

        /**
         * Filters the taxonomy used in the Tag Cloud widget.
         *
         * @since 2.8.0
         * @since 3.0.0 Added taxonomy drop-down.
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see wp_tag_cloud()
         *
         * @param array $args     Args used for the tag cloud widget.
         * @param array $instance Array of settings for the current widget.
         */
        $tag_cloud = wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
            'taxonomy'   => $current_taxonomy,
            'echo'       => false,
            'show_count' => $show_count,
        ), $instance ) );

        if ( empty( $tag_cloud ) ) {
            return;
        }
        $tag_cloud = str_replace('<a', '<li><a', $tag_cloud);
        $tag_cloud = str_replace('</a>', '</a></li>', $tag_cloud);
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo '<div class="tags_widget">';
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<ul>';

        echo $tag_cloud;

        echo "</div>\n";
        echo '</div>';
    }

    /**
     * Handles updating settings for the current Tag Cloud widget instance.
     *
     * @since 2.8.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['count'] = ! empty( $new_instance['count'] ) ? 1 : 0;
        $instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
        return $instance;
    }

    /**
     * Outputs the Tag Cloud widget settings form.
     *
     * @since 2.8.0
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $current_taxonomy = $this->_get_current_taxonomy($instance);
        $title_id = $this->get_field_id( 'title' );
        $count = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
        $instance['title'] = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

        echo '<p><label for="' . $title_id .'">' . __( 'Title:' ) . '</label>
            <input type="text" class="widefat" id="' . $title_id .'" name="' . $this->get_field_name( 'title' ) .'" value="' . $instance['title'] .'" />
        </p>';

        $taxonomies = get_taxonomies( array( 'show_tagcloud' => true ), 'object' );
        $id = $this->get_field_id( 'taxonomy' );
        $name = $this->get_field_name( 'taxonomy' );
        $input = '<input type="hidden" id="' . $id . '" name="' . $name . '" value="%s" />';

        $count_checkbox = sprintf(
            '<p><input type="checkbox" class="checkbox" id="%1$s" name="%2$s"%3$s /> <label for="%1$s">%4$s</label></p>',
            $this->get_field_id( 'count' ),
            $this->get_field_name( 'count' ),
            checked( $count, true, false ),
            __( 'Show tag counts' )
        );

        switch ( count( $taxonomies ) ) {

        // No tag cloud supporting taxonomies found, display error message
        case 0:
            echo '<p>' . __( 'The tag cloud will not be displayed since there are no taxonomies that support the tag cloud widget.' ) . '</p>';
            printf( $input, '' );
            break;

        // Just a single tag cloud supporting taxonomy found, no need to display a select.
        case 1:
            $keys = array_keys( $taxonomies );
            $taxonomy = reset( $keys );
            printf( $input, esc_attr( $taxonomy ) );
            echo $count_checkbox;
            break;

        // More than one tag cloud supporting taxonomy found, display a select.
        default:
            printf(
                '<p><label for="%1$s">%2$s</label>' .
                '<select class="widefat" id="%1$s" name="%3$s">',
                $id,
                __( 'Taxonomy:' ),
                $name
            );

            foreach ( $taxonomies as $taxonomy => $tax ) {
                printf(
                    '<option value="%s"%s>%s</option>',
                    esc_attr( $taxonomy ),
                    selected( $taxonomy, $current_taxonomy, false ),
                    $tax->labels->name
                );
            }

            echo '</select></p>' . $count_checkbox;
        }
    }

    /**
     * Retrieves the taxonomy for the current Tag cloud widget instance.
     *
     * @since 4.4.0
     *
     * @param array $instance Current settings.
     * @return string Name of the current taxonomy if set, otherwise 'post_tag'.
     */
    public function _get_current_taxonomy($instance) {
        if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) )
            return $instance['taxonomy'];

        return 'post_tag';
    }
}



/***Ends Tags Clude**/



class google_Map_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'Google_map',
            esc_html__('Google Map','mamurjorit'),
            array(
                'description'  => esc_html__('this is my author developed widget','mamurjorit')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo esc_html($args['before_widget']);
        if(!empty($instance['title'])){
            echo esc_html($args['before_title']).apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

        <div class="ct maps_area">                  <!-- Author Box -->
           <iframe width="<?php echo esc_html($instance['width']); ?>" height="<?php echo esc_html($instance['height']); ?>" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo esc_html($instance['location']); ?>&t=&z=<?php echo esc_html($instance['zoom']); ?>&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

           </iframe>
       </div>

       <?php 
       echo esc_html($args['after_widget']);
   }
   public function form($instance){
    $title = !empty($instance['title'])? $instance['title']: esc_html__('','mamurjorit');
    $width = !empty($instance['width'])? $instance['width']: esc_html__('800','mamurjorit');
    $height = !empty($instance['height'])? $instance['height']: esc_html__('500','mamurjorit');
    $location = !empty($instance['location'])? $instance['location']: esc_html__('Dhaka','mamurjorit');
    $zoom = !empty($instance['zoom'])? $instance['zoom']: esc_html__('12','mamurjorit');?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_attr_e('Title','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>"
        type="text"
        value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('width')); ?>">
            <?php esc_attr_e('width','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('width')); ?>"
        name="<?php echo esc_attr($this->get_field_name('width')); ?>"
        type="text"
        value="<?php echo esc_attr($width); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('height')); ?>">
            <?php esc_attr_e('height','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('height')); ?>"
        name="<?php echo esc_attr($this->get_field_name('height')); ?>"
        type="text"
        value="<?php echo esc_attr($height); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('location')); ?>">
            <?php esc_attr_e('location','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('location')); ?>"
        name="<?php echo esc_attr($this->get_field_name('location')); ?>"
        type="text"
        value="<?php echo esc_attr($location); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('zoom')); ?>">
            <?php esc_attr_e('zoom','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('zoom')); ?>"
        name="<?php echo esc_attr($this->get_field_name('zoom')); ?>"
        type="text"
        value="<?php echo esc_attr($zoom); ?>">
    </p>

<?php }
public function update($new_instance, $old_instance){
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
    $instance['width'] = (!empty($new_instance['width']))? strip_tags($new_instance['width']):'';
    $instance['height'] = (!empty($new_instance['height']))? strip_tags($new_instance['height']):'';
    $instance['location'] = (!empty($new_instance['location']))? strip_tags($new_instance['location']):'';
    $instance['zoom'] = (!empty($new_instance['zoom']))? strip_tags($new_instance['zoom']):'';

    return $instance;
}
}


class contact_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'contact',
            esc_html__('Contact Info','mamurjorit'),
            array(
                'description'  => esc_html__('this is my contact developed widget','mamurjorit')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo esc_html($args['before_widget']);
        if(!empty($instance['title'])){
            echo esc_html($args['before_title']).apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

   
        
        <div class="single_ct">
            <a href="tel:+8801746686868"><?php echo esc_html($instance['number']); ?></a> 
            <p>(<?php echo esc_html($instance['name1']); ?>)</p>
        </div>
        <div class="single_ct">
          <a href="tel:+8801703355355"><?php echo esc_html($instance['number2']); ?></a> 
          <p>(<?php echo esc_html($instance['name2']); ?>)</p>
      </div>
      <div class="single_ct">
          <a href="tel:+8801791411311"><?php echo esc_html($instance['number3']); ?></a> 
          <p>(<?php echo esc_html($instance['name3']); ?>)</p>
      </div>
  

      <?php 
      echo esc_html($args['after_widget']);
  }
  public function form($instance){
    $title = !empty($instance['title'])? $instance['title']: esc_html__('','mamurjorit');
    $number = !empty($instance['number'])? $instance['number']: esc_html__('','mamurjorit');
    $name1 = !empty($instance['name1'])? $instance['name1']: esc_html__('','mamurjorit');
    $number2 = !empty($instance['number2'])? $instance['number2']: esc_html__('','mamurjorit');
    $name2 = !empty($instance['name2'])? $instance['name2']: esc_html__('','mamurjorit');
    $number3 = !empty($instance['number3'])? $instance['number3']: esc_html__('','mamurjorit');
    $name3 = !empty($instance['name3'])? $instance['name3']: esc_html__('','mamurjorit');?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_attr_e('Title','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>"
        type="text"
        value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
            <?php esc_attr_e('number','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('number')); ?>"
        name="<?php echo esc_attr($this->get_field_name('number')); ?>"
        type="text"
        value="<?php echo esc_attr($number); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('name1')); ?>">
            <?php esc_attr_e('name1','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('name1')); ?>"
        name="<?php echo esc_attr($this->get_field_name('name1')); ?>"
        type="text"
        value="<?php echo esc_attr($name1); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number2')); ?>">
            <?php esc_attr_e('number2','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('number2')); ?>"
        name="<?php echo esc_attr($this->get_field_name('number2')); ?>"
        type="text"
        value="<?php echo esc_attr($number2); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('name2')); ?>">
            <?php esc_attr_e('name2','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('name2')); ?>"
        name="<?php echo esc_attr($this->get_field_name('name2')); ?>"
        type="text"
        value="<?php echo esc_attr($name2); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number3')); ?>">
            <?php esc_attr_e('number3','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('number3')); ?>"
        name="<?php echo esc_attr($this->get_field_name('number3')); ?>"
        type="text"
        value="<?php echo esc_attr($number3); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('name3')); ?>">
            <?php esc_attr_e('name3','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('name3')); ?>"
        name="<?php echo esc_attr($this->get_field_name('name3')); ?>"
        type="text"
        value="<?php echo esc_attr($name3); ?>">
    </p>

<?php }
public function update($new_instance, $old_instance){
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
    $instance['number'] = (!empty($new_instance['number']))? strip_tags($new_instance['number']):'';
    $instance['name1'] = (!empty($new_instance['name1']))? strip_tags($new_instance['name1']):'';
    $instance['number2'] = (!empty($new_instance['number2']))? strip_tags($new_instance['number2']):'';
    $instance['name2'] = (!empty($new_instance['name2']))? strip_tags($new_instance['name2']):'';
    $instance['number3'] = (!empty($new_instance['number3']))? strip_tags($new_instance['number3']):'';
    $instance['name3'] = (!empty($new_instance['name3']))? strip_tags($new_instance['name3']):'';

    return $instance;
}
}


class follow_us_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'socialfollow',
            esc_html__('Social Follow Us','mamurjorit'),
            array(
                'description'  => esc_html__('this widget is us for Social Follow','mamurjorit')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo esc_html($args['before_widget']);
        if(!empty($instance['title'])){
            echo esc_html($args['before_title']).apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>
    <ul class="ct_links"> 
        <li><a href="<?php echo esc_url($instance['fblink']) ?>" target="_blank"><?php echo esc_html($instance['facebook']) ?></a></li>
        <li><a href="<?php echo esc_url($instance['twlink']) ?>" target="_blank"><?php echo esc_html($instance['twitter']) ?></a></li>
        <li><a href="<?php echo esc_url($instance['ytlibk']) ?>" target="_blank"><?php echo esc_html($instance['youtube']) ?></a></li>
    </ul> 
  

      <?php 
      echo esc_html($args['after_widget']);
  }
  public function form($instance){
    $title = !empty($instance['title'])? $instance['title']: esc_html__('','mamurjorit');
    $facebook = !empty($instance['facebook'])? $instance['facebook']: esc_html__('','mamurjorit');
    $fblink = !empty($instance['fblink'])? $instance['fblink']: esc_html__('','mamurjorit');
    $twitter = !empty($instance['twitter'])? $instance['twitter']: esc_html__('','mamurjorit');
    $twlink = !empty($instance['twlink'])? $instance['twlink']: esc_html__('','mamurjorit');
    $youtube = !empty($instance['youtube'])? $instance['youtube']: esc_html__('','mamurjorit');
    $ytlibk = !empty($instance['ytlibk'])? $instance['ytlibk']: esc_html__('','mamurjorit');?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_attr_e('Title','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>"
        type="text"
        value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
            <?php esc_attr_e('facebook','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('facebook')); ?>"
        name="<?php echo esc_attr($this->get_field_name('facebook')); ?>"
        type="text"
        value="<?php echo esc_attr($facebook); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('fblink')); ?>">
            <?php esc_attr_e('fblink','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('fblink')); ?>"
        name="<?php echo esc_attr($this->get_field_name('fblink')); ?>"
        type="text"
        value="<?php echo esc_attr($fblink); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
            <?php esc_attr_e('twitter','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('twitter')); ?>"
        name="<?php echo esc_attr($this->get_field_name('twitter')); ?>"
        type="text"
        value="<?php echo esc_attr($twitter); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('twlink')); ?>">
            <?php esc_attr_e('twlink','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('twlink')); ?>"
        name="<?php echo esc_attr($this->get_field_name('twlink')); ?>"
        type="text"
        value="<?php echo esc_attr($twlink); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
            <?php esc_attr_e('youtube','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('youtube')); ?>"
        name="<?php echo esc_attr($this->get_field_name('youtube')); ?>"
        type="text"
        value="<?php echo esc_attr($youtube); ?>">
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('ytlibk')); ?>">
            <?php esc_attr_e('ytlibk','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('ytlibk')); ?>"
        name="<?php echo esc_attr($this->get_field_name('ytlibk')); ?>"
        type="text"
        value="<?php echo esc_attr($ytlibk); ?>">
    </p>

<?php }
public function update($new_instance, $old_instance){
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
    $instance['facebook'] = (!empty($new_instance['facebook']))? strip_tags($new_instance['facebook']):'';
    $instance['fblink'] = (!empty($new_instance['fblink']))? strip_tags($new_instance['fblink']):'';
    $instance['twitter'] = (!empty($new_instance['twitter']))? strip_tags($new_instance['twitter']):'';
    $instance['twlink'] = (!empty($new_instance['twlink']))? strip_tags($new_instance['twlink']):'';
    $instance['youtube'] = (!empty($new_instance['youtube']))? strip_tags($new_instance['youtube']):'';
    $instance['ytlibk'] = (!empty($new_instance['ytlibk']))? strip_tags($new_instance['ytlibk']):'';

    return $instance;
}
}


class footer_copyright_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'copyrigh',
            esc_html__('Copyright widget','mamurjorit'),
            array(
                'description'  => esc_html__('this widget is us for Copy right section','mamurjorit')
            )
        );
    }
    public function widget( $args, $instance ) {
?>
    <div class="c_right">
        <p><?php echo esc_html($instance['copyright']); ?></p>
    </div>

      <?php 
  }
  public function form($instance){
    $copyright = !empty($instance['copyright'])? $instance['copyright']: esc_html__('','mamurjorit');
?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('copyright')); ?>">
            <?php esc_attr_e('copyright','mamurjorit');?>
        </label>
        <input 
        class="widefat"
        id="<?php echo esc_attr($this->get_field_id('copyright')); ?>"
        name="<?php echo esc_attr($this->get_field_name('copyright')); ?>"
        type="text"
        value="<?php echo esc_attr($copyright); ?>">
    </p>


<?php }
public function update($new_instance, $old_instance){
    $instance = array();
    $instance['copyright'] = (!empty($new_instance['copyright']))? strip_tags($new_instance['copyright']):'';
   

    return $instance;
}
}

function mamurjorit_custom_widget(){
    register_widget("google_Map_widget");
    register_widget("footer_copyright_widget");
    /*register_widget('honeyhome_categories');*/

    register_widget('honeyhome_custom_tags_clud');
    register_widget('honeyhome_custom_categories');
    register_widget('honeyhome_custom_recent_post');
   // register_widget('honeyhome_Custom_Search');

}

add_action('widgets_init','mamurjorit_custom_widget');

new mamurjorit_Sidebars;

