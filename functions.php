<?php
/**
 * BlueOne WP functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link
 *
 * @package WordPress
 * @subpackage BlueOne
 * @since 1.0.0
 *
 */

if ( ! function_exists( 'blueone_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since 1.0
     */
    function blueone_setup() {

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );


    }
endif; // olivewellness_setup
add_action( 'after_setup_theme', 'blueone_setup' );

/*
 * Enqueue scripts and styles.
 */
function blueone_styles_scripts() {

    /** CSS **/

    # Fonts, Fontawesome, fancybox, bootstrap, owl.carousel, slit-slider, animate css
    wp_enqueue_style('blueone_fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700', array(), '', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style('jquery-fancybox', get_template_directory_uri().'/css/jquery.fancybox.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '3.3.1', 'all');
    wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/owl.carousel.css');
    wp_enqueue_style('slit-slider', get_template_directory_uri().'/css/slit-slider.css');
    wp_enqueue_style('animate-css', get_template_directory_uri().'/css/animate.css');

    # Theme style
    wp_enqueue_style('blueone_main_css', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all');
    wp_enqueue_style('blueone-style', get_template_directory_uri().'/style.css');


    /** Javascript **/
    # Modernizer Script for old Browsers
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr-2.6.2.min.js', array(), '2.6.2', false );
    # Main jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri().'/js/jquery-1.11.1.min.js', FALSE, '1.11.1', true);
    wp_enqueue_script('jquery');

    # Twitter Bootstrap, singlePageNav, jquery.fancybox.pack, Google Map API,
    # Owl Carousel, jquery easing, Fullscreen slider, onscroll animation
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '3.3.1', true);
    wp_enqueue_script('singlePageNav', get_template_directory_uri().'/js/jquery.singlePageNav.min.js', array(), null, true );
    wp_enqueue_script('jquery-fancybox-pack', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), null, true );
    wp_enqueue_script('google-map','http://maps.google.com/maps/api/js?sensor=false', array(), null, true );
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array(), null, true );
    wp_enqueue_script('jquery-easing', get_template_directory_uri().'/js/jquery.easing.min.js', array(), null, true );
    wp_enqueue_script('jquery-slitslider', get_template_directory_uri().'/js/jquery.slitslider.js', array(), null, true );
    wp_enqueue_script('jquery-ba-cond', get_template_directory_uri().'/js/jquery.ba-cond.min.js', array(), null, true );
    wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.min.js', array(), null, true );

    # Custom Script
    wp_enqueue_script('blueone-script', get_template_directory_uri().'/js/main.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'blueone_styles_scripts' );

/* Add menu */
function register_blueone_menus() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Top Primary Menu', 'blueone' ),
    ) );
}

add_action( 'init', 'register_blueone_menus' );

/* Define Home Sections */
if( !function_exists('blueone_home_section') ){
    function blueone_home_section(){
        $blueone_home_sections = apply_filters('blueone_home_section',
            array(
                'slider',
                'about',
                'service',
                'portfolio',
                'testimonials',
                'price',
                'social',
                'contact',
                'map'
            )
        );

        return $blueone_home_sections;
    }
}

// Add Custom Post Type for Home Slider, Works, Services, Projects, Testimonials
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'blueone_slides',
        array(
            'labels' => array(
                'name' => __( 'Blueone Slides'),
                'singular_name' => __( 'Blueone Slide'),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Slides',
                'new_item'           => 'New Slide',
                'edit_item'          => 'Edit Slide',
                'all_items'          => 'All Slides',
                'search_items'=> __( 'Search Slides'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'custom-fields'
            )

        )

    );
    register_post_type( 'blueone_works',
        array(
            'labels' => array(
                'name' => __( 'Blueone Works'),
                'singular_name' => __( 'Blueone Work'),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Works',
                'new_item'           => 'New Work',
                'edit_item'          => 'Edit Work',
                'all_items'          => 'All Works',
                'search_items'=> __( 'Search Works'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'custom-fields'
            )

        )

    );
    register_post_type( 'blueone_services',
        array(
            'labels' => array(
                'name' => __( 'Blueone Services'),
                'singular_name' => __( 'Blueone Service'),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Services',
                'new_item'           => 'New Service',
                'edit_item'          => 'Edit Service',
                'all_items'          => 'All Services',
                'search_items'=> __( 'Search Services'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 6,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'custom-fields'
            )

        )

    );
    register_post_type( 'blueone_projects',
        array(
            'labels' => array(
                'name' => __( 'Blueone Projects'),
                'singular_name' => __( 'Blueone Project'),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Projects',
                'new_item'           => 'New Project',
                'edit_item'          => 'Edit Project',
                'all_items'          => 'All Projects',
                'search_items'=> __( 'Search Projects'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 7,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'custom-fields'
            )

        )

    );
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials'),
                'singular_name' => __( 'Testimonial'),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Testimonials',
                'new_item'           => 'New Project',
                'edit_item'          => 'Edit Testimonial',
                'all_items'          => 'All Testimonials',
                'search_items'=> __( 'Search Testimonials'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 8,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'custom-fields'
            )

        )

    );
}

/**
 *  Add Settings Option admin panel for Social Media url In Footer
 **/

function theme_settings_page(){
    if(isset($_POST['soc_thumb_url'])){
        update_option('soc_thumb_url',$_POST['soc_thumb_url'] );
    }
    if(isset($_POST['soc_tw_url'])){
        update_option('soc_tw_url',$_POST['soc_tw_url'] );
    }
    if(isset($_POST['soc_skype_url'])){
        update_option('soc_skype_url',$_POST['soc_skype_url'] );
    }

    if(isset($_POST['soc_dribbble_url'])){
        update_option('soc_dribbble_url',$_POST['soc_dribbble_url'] );
    }
    if(isset($_POST['soc_youtube_url'])){
        update_option('soc_youtube_url',$_POST['soc_youtube_url'] );
    }
    ?>
    <div class="wrap">
        <h1>Social Media URL Panel</h1>
        <form action="" method="post">

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Social Thumb URL</th>
                    <td><input type="url" name="soc_thumb_url" value="<?php echo get_option('soc_thumb_url'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Social Twitter URL</th>
                    <td><input type="url" name="soc_tw_url" value="<?php echo get_option('soc_tw_url'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Social Skype URL</th>
                    <td><input type="url" name="soc_skype_url" value="<?php echo get_option('soc_skype_url'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Social Dribbble URL</th>
                    <td><input type="url" name="soc_dribbble_url" value="<?php echo get_option('soc_dribbble_url'); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Social Youtube URL</th>
                    <td><input type="url" name="soc_youtube_url" value="<?php echo get_option('soc_youtube_url'); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function add_theme_menu_item()
{
    add_menu_page("Social URL Panel", "Social URL Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");
