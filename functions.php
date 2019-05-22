<?php

/* 
*  FUNCTIONS FILE FOR: ILLUSTRO; A RESPONSIVE WORDPRESS THEME
*  LAST UPDATED: MARCH 2018
*/

//------------------------------------------------------------------------------------------------


//-----------------------This file adds theme support---------------------------------------------

   // adds theme support- content width //

if ( ! isset( $content_width ) ) {
	$content_width = 1900;
}


   // adds theme support- feedlinks, title tags, navwalker code //

function illustro_setup() {
		
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');
    
   // allows images to be used as icons to represent a post
    
           add_theme_support('post-thumbnails');
    
   // register Custom Navigation Walker 
    
           require_once('wp-bootstrap-navwalker.php');
    
   // registers nav bar ul
    
           register_nav_menus( array(
           'primary' => __( 'Primary Menu', 'illustro' ),
           ) );

   // enables custom headers

        $args = array(
            'flex-width'    => 'true',
            'width'         => 1900,
            'flex-height'   => 'true',
            'height'        => 640,
            'default-image' => get_template_directory_uri() . '/img/header.jpg',
            'uploads'       => true,
        );


            add_theme_support( 'custom-header', $args );

    // enables custom logo
            add_theme_support( 'custom-logo', array(
               'height'      => 75,
               'width'       => 75,
               'flex-width' => true,
              ) );

	}
	
    add_action('after_setup_theme','illustro_setup');

//------------------------------------------------------------------------------------------------


/*=== enques script tags, style tags ===*/
function illustro_scripts() {

    /* stylesheets */
        wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap-3.3.7/css/bootstrap.min.css' );
        wp_enqueue_style( 'illustro-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
        wp_enqueue_style('google-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu'); 

    /* Scripts */
        wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap-3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
    
    /* moves comment reply field, javascript activation */
        if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )  wp_enqueue_script( 'comment-reply' );
    
  }
  add_action('wp_enqueue_scripts','illustro_scripts');

//------------------------------------------------------------------------------------------------

/*=== registers sidebars ===*/

function illustro_sidebars() {

	$args = array(
		'id'            => 'main-sidebar',
		'class'         => 'main-sidebar-area',
		'name'          => __( 'Main Sidebar', 'illustro' ),
		'description'   => __( 'Sidebar Right; Default Layout Sidebar. Featured On: Archive.php, page.php, and single.php', 'illustro' ),
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		'before_widget' => '<div id="%1$s" class= "sidebar-module %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'home-sidebar',
		'class'         => 'home-widget-area',
		'name'          => __( 'Front Page Widget Area', 'illustro' ),
		'description'   => __( 'This is the front page widget area. Please Note: This Widget Area is for Full Width Content, such as featured videos, iframes, etc. Utilize the Custom HTML widget. Featured On: front-page.php', 'illustro' ),
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class= "sidebar-module %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

   }
   add_action( 'widgets_init', 'illustro_sidebars' );

//------------------------------------------------------------------------------------------------

  // enables PHP in widgets
        add_filter('widget_custom_html_content','execute_php',100);
            function execute_php($html){
              if(strpos($html,"<"."?php")!==false){
              ob_start();
              eval("?".">".$html);
              $html=ob_get_contents();
              ob_end_clean();
              }
            return $html;
            }


  // removes brackets around read more epllipsis

        function custom_excerpt_more( $more ) {
                    return '...';
            }
            add_filter( 'excerpt_more', 'custom_excerpt_more' );

            /* shortens length of excerpts */
            function custom_excerpt_length( $length ) {
                return 25;
            }
            add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



  // modifies comment form default input fields

            add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
                  function bootstrap3_comment_form_fields( $fields ) {
                $commenter = wp_get_current_commenter();

                $req      = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

                $fields   =  array(
                    'author' => '<div class="form-group comment-form-author">' . '<label class="sr-only" for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                '<input class="form-control" id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
                    'email'  => '<div class="form-group comment-form-email"><label class="sr-only" for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="Email *"' . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',

                );

                return $fields;
                }

  // modifies comment form textarea field

            add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
                function bootstrap3_comment_form( $args ) {
                    $args['comment_field'] = '<div class="form-group comment-form-comment">
                                <label class="sr-only" for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
                                <textarea class="form-control" id="comment" name="comment" cols="45" placeholder="Comment" rows="8" aria-required="true"></textarea>
                                </div>';
                    $args['class_submit'] = 'btn btn-default'; // since WP 4.1

                    return $args;
                } 

//------------------------------------------------------------------------------------------------

/*=== theme customizer ==*/


function illustro_customizer_register( $wp_customize ) {
    
    // Theme Customizer -- Site Identity
    
            //toggles site icon display in the customizer/
            $wp_customize->get_control( 'display_header_text' )->label = __('Display Site Title or Logo', 'illustro');
            //labels hero image text in the customizer
            $wp_customize->get_control( 'blogdescription' )->label = __('Hero Image Text', 'illustro');
             //renames site favicon area in the customizer
            $wp_customize->get_control( 'site_icon' )->label = __( 'Site Icon aka favicon', 'illustro' );

            //sets priority for site identity secton items
            $wp_customize->get_control( 'blogname' )->priority = 10;
            $wp_customize->get_control( 'display_header_text' )->priority = 20;
            $wp_customize->get_control( 'blogdescription' )->priority = 30;
            $wp_customize->get_control( 'site_icon' )->priority = 40;

    // theme customizer -- colors

        // menu background color setting
            $wp_customize->add_setting( 'header_bg_color', array(
                    'default' => '#202020'

            ) );

        // header background color control -- this is a color picker control
    
            $wp_customize->add_control( 
                    new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', 
                        array(
                            'label' => __('Menu Background Color', 'illustro'),
                            'section' => 'colors',
                            'settings' => 'header_bg_color',
                        )
            ) );


        // header background color setting
    
            $wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';
            $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Brand / Title Color', 'illustro' );

        // home page area colors (radio buttons)

            $wp_customize->add_setting('home_area_colors', array(
                    'default'=> 'value1',
            ));

            $wp_customize->add_control( 'home_area_colors', 
              array(
                'label'		 => __('Home Section Colors', 'illustro' ),
                'section'    => 'colors',
                'settings'   => 'home_area_colors',
                'type'       => 'radio',
                'choices'    => array(
                    'value1' => __( 'Standard', 'illustro' ),
                    'value2' => __( 'Reverse', 'illustro' ),
                    ),
                 )
            );

        // theme customizer -- background image CSS

            $wp_customize->add_section(
                'illustro_homewidget_background',
                array(
                        'title'       => __( 'Home Widget Background', 'illustro' ),
                        'priority'    => 190,
                        'capability'  => 'edit_theme_options',
                        'description' => __( 'Change the background image in Home Widget Area of the Home Page', 'illustro' ),
                )
            );

            $wp_customize->add_setting(
                'illustro_homewidget_background',
                array(
                        'default'      => get_template_directory_uri() . '/img/placeholder-image2.jpg',
                        'transport'    => 'refresh'
                )
            );

            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    'illustro_homewidget_background',
                    array(
                            'label'       => __( 'Background Image', 'illustro' ),
                            'settings'    => 'illustro_homewidget_background',
                            'section'     => 'illustro_homewidget_background',
                            'description' => __( 'Recommended image size is approximately 1600x385 pixels', 'illustro' ),
                    )
                )
            );


        // theme customizer - home page text
            $wp_customize->add_section( 'custom_home_section', array(
                    'title'           => __( 'Home Page Text', 'illustro' ),
                    'description'     => __( 'Add titles to each section of the Home Page.', 'illustro' ),
                    'priority'        => 180,
                    'active_callback' => 'is_front_page',
            ) );

         // control/setting for welcome section 
    
            $wp_customize->add_setting( 'welcome_title', array(
                    'default'           => __( 'Welcome to Our Website! This section can be changed within the customizer to include welcome messages, promotional messages, announcements, etc. The section expands as you add more text', 'illustro' ),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control( 'welcome_title', array(
                    'priority'    => 10,
                    'section'     => 'custom_home_section',
                    'label'       => __( 'Input text for the welcome section ', 'illustro' ),
                    'description' => '',
            ) );

         // control/setting for footer section
            $wp_customize->add_setting( 'footer_title', array(
                    'default'           => __( '&copy; illustro' , 'illustro' ),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control( 'footer_title', array(
                    'priority'    => 10,
                    'section'     => 'custom_home_section',
                    'label'       => __( 'Input a title for the footer section', 'illustro' ),
                    'description' => '',
            ) );




}

add_action( 'customize_register', 'illustro_customizer_register' );

//------------------------------------------------------------------------------------------------

 /*=== adds CSS from theme customizer to wp_head (embedded style outweighs linked style) ===*/


    //current php statement stopped in order to add embedded style
       

    function illustro_customizer_css() {

            ?> 

                <style>

                /*=== Style from The Customizer Colors Section - Header Background Color ===*/

                .navbar {
                        background-color: <?php echo get_theme_mod( 'header_bg_color' ); ?>;
                }

            .navbar-header .navbar-brand { 
                 color: #<?php header_textcolor(); ?>;
                    }

        /*=== alters styles in customizer; radio buttons==*/
                
            <?php if( get_theme_mod('home_area_colors') == 'value2' ) : ?>
                #myFooter {
                    background-color: white;
                    color:#303030;
                    }
                #myFooter li a:hover {
                    color: #303030;
                    text-decoration: none;
                   }
                #myFooter .btn:hover {
                    color: #303030;
                   }
                
                <?php endif; ?>
                
            
        /*=== sets background image for homepage widget area ===*/
                
            <?php if( get_theme_mod( 'illustro_homewidget_background' ) ) : ?>
                    #home-widgets { 
                        background-image: url( "<?php echo get_theme_mod( 'illustro_homewidget_background' ) ?>" );
                }
                <?php else : ?>
                    #home-widgets { 
                        background-image: url( "<?php echo get_template_directory_uri() . '/img/placeholder-image2.jpg'; ?>" ); 
                }
                <?php endif; ?>
                
                
                

            </style>

        <?php  
            
      //new php statement started for use in remainder of document
            
    }
 
    add_action( 'wp_head', 'illustro_customizer_css' );

//------------------------------------------------------------------------------------------------

// Dashboard Footer Customization

function illustro_footer_admin () {

echo '<p>'. __( 'Designed by', 'illustro' ) . ' <a href="https://kfickle.com">Kahela Fickle</a></p>';
}
add_filter('admin_footer_text', 'illustro_footer_admin');