<?php
defined( 'ABSPATH' ) or die();

require_once OGO__PATH . 'admin/customize/inc/customize-helper-functions.php';
require_once OGO__PATH . 'admin/customize/controls/customizer-controls.php';

function ogo_set_defaults(){
    // Child theme set customizer properties
    if( is_child_theme() && get_option('ogo_child_theme_activated') != '1' ){
        update_option('ogo_child_theme_activated', '1');

        $theme_slug = get_option( 'template' );
        $mods       = get_option( "theme_mods_".$theme_slug );

        update_option( "theme_mods_".$theme_slug."-child", $mods );
    }

    if( get_option('ogo_theme_activated') != '1' ){ //Сomment this condition, if you need to remove default customizer properties
        update_option('ogo_theme_activated', '1');

        $settings_default_props = ogo_get_defaults(ogo_customizer_controls());

        foreach( $settings_default_props as $setting_id => $default_value ){
            if( !get_theme_mod($setting_id) ){
                set_theme_mod($setting_id, $default_value);
            }

            // remove_theme_mod($setting_id); //Uncomment this line, if you need to remove default customizer properties 
        }
    }
}
add_action( 'after_setup_theme', 'ogo_set_defaults' );


function ogo_register_customizer( $wp_customize ){

    require_once OGO__PATH . 'admin/customize/class-rb-customizer.php';
    
    ogo_read_options( $wp_customize, ogo_customizer_controls() );
}
add_action( 'customize_register', 'ogo_register_customizer', 10, 2 );


function my_enqueue_customizer_stylesheet() {
    wp_enqueue_style( 'customizer-styles', OGO__URI . 'admin/css/customizer.css', '', OGO__VERSION );
    wp_enqueue_style( 'customizer-styles', OGO__URI . 'admin/css/widgets.css', '', OGO__VERSION );
}
add_action( 'customize_controls_print_styles', 'my_enqueue_customizer_stylesheet' );


function ogo_customizer_css(){
    if( !empty($GLOBALS['data_to_send']) ){
        $live_preview_styles = json_decode($GLOBALS['data_to_send']['ajax_data']);
        $out = $control = $elem = $style = '';

        if( !empty($live_preview_styles) ){
            $out .= "<style type='text/css'>";

            foreach( $live_preview_styles as $key => $value ){
                foreach ($value as $k => $v) {
                    switch($k) {
                        case 'control':
                            $control = $v;
                            break;
                        case 'trigger_class':
                            $elem = $v;
                            break;
                        case 'style_to_change':
                            $style = $v;
                            break;
                        default:
                            break;
                    }
                }

                $out .= $elem."{";
                    $out .= $style.": ".get_theme_mod($control).";";
                $out .= "}";
            }

            $out .= "</style>";
        }

        echo sprintf('%s', $out);
    }
}
add_action( 'wp_head', 'ogo_customizer_css');


function ogo_customizer_control_toggle(){
    wp_enqueue_script( 
        'contextual_controls', 
        get_template_directory_uri() . '/admin/customize/inc/rb_customizer_context.js?v=' . rand(), 
        array( 'customize-controls' ), 
        '',
        false
    );

    wp_localize_script( 'contextual_controls', 'ajax_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    ));
}
add_action( 'customize_controls_enqueue_scripts', 'ogo_customizer_control_toggle' );


function ogo_customizer_preview(){
    wp_enqueue_script(
        'live-preview',
        get_template_directory_uri() . '/admin/customize/inc/rb_customizer.js',
        array( 'jquery', 'customize-preview' ),
        '',
        true
    );

    wp_localize_script( 'live-preview', 'preview_controls', $GLOBALS['data_to_send'] );
}
add_action( 'customize_preview_init', 'ogo_customizer_preview' );

require_once OGO__PATH . 'admin/customize/inc/customizer-ajax-functions.php';

?>