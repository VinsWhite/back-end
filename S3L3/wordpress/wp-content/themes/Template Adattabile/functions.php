<?php //@author Vincenzo Saccone

//BOOTSTRAP 5 CDN s
// Functions to use Bootstrap CDN 
function load_bootstrap() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('custom-style', get_stylesheet_uri(). './assets/css/custom-css.css');
}

function load_bootstrap_scripts() {
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/script/custom-script.js');
}

// They're useful to add actions to our template
add_action('wp_enqueue_scripts', 'load_bootstrap');
add_action('wp_enqueue_scripts', 'load_bootstrap_scripts');


// CUSTOMIZATION 

//Title of the page 
function my_theme_customize_title($wp_customize) {
    $wp_customize->add_section('title_section', array(
        'title' => __('Head Title', 'my_theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('title_text', array(
        'default' => 'Template Adattabile',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('title_text', array(
        'label' => __('Head Title', 'my_theme'),
        'section' => 'title_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'my_theme_customize_title');

//Nav Bar
function register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu'  => __( 'Footer Menu'),
            'sidebar-menu'  => __( 'Sidebar Menu'),
        )
    );
}

add_action('init', 'register_menus');

class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth > 0) {
            return;
        }
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }
        elseif (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }

        if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }
        elseif (strcasecmp($item->title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }

        // Aggiungi la classe "nav-link" al link
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . ' nav-link"' : ' class="nav-link"';

        $output .= '<li' . $class_names .'>';

        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
}

//------------------------------------------------------------------------
//Background color
function myTheme_customize_register($wp_customize){   
    $wp_customize->add_section('colors', array(       
        'title' => __('Background Color', 'myTheme'),
        'priority' => 30
    ));

    $wp_customize->add_setting('bg_color', array(      
        'default' => '#ffffff',
        'transport' => 'postMessage',                     
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'bg_color', array(
        'label' => __('Background Color', 'myTheme'),
        'section' => 'colors',
        'settings' => 'bg_color',                        
    ))); 
}
add_action('customize_register', 'myTheme_customize_register');



//--------------------------------------------------------------------------
// Middle Section
//H3
function my_theme_customize_h3($wp_customize) {
    $wp_customize->add_section('h3_title', array(
        'title' => __('H3', 'my_theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('h3_text', array(
        'default' => 'Lorem ipsum',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('h3_text', array(
        'label' => __('H3 text', 'my_theme'),
        'section' => 'h3_title',
        'type' => 'text',
    ));
}

add_action('customize_register', 'my_theme_customize_h3');

//Paragraph
function my_theme_customize_p($wp_customize) {
    $wp_customize->add_section('paragraph_title', array(
        'title' => __('Paragraph', 'my_theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('paragraph_text', array(
        'default'=> 'Add a paragraph here',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('paragraph_text', array(
        'label' => __('Paragraph Text', 'my_theme'),
        'section' => 'paragraph_title',
        'type' => 'text',
    ));
}

add_action('customize_register', 'my_theme_customize_p');


//--------------------------------------------------------------------------

// Footer
function my_theme_customize_footer($wp_customize) {
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer', 'my_theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('footer_text', array(
        'default' => '&copy; Copyright ' . date("Y"),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => __('Footer text', 'my_theme'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'my_theme_customize_footer');
