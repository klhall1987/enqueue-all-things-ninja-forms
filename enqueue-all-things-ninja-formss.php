<?php

/*
Plugin Name: Enqueue All Things Ninja Forms
Description: Enqueues all styling and scripts for Ninja Forms on every page load.
Version: 1.0
Author: Kenny Hall
Author URI: http://kennyinthewild.com
Text Domain: ninja-forms
*/

function klh_enqueue_all_the_things()
{
    if( version_compare( get_option( 'ninja_forms_version', '0.0.0' ), '3.0', '>' ) || get_option( 'ninja_forms_load_deprecated', FALSE ) ) {

        wp_enqueue_script( 'jquery-ui-datepicker' );

        wp_enqueue_script( 'jquery-qtip', NINJA_FORMS_URL .'js/min/jquery.qtip.min.js',
                    array( 'jquery', 'jquery-ui-position' ) );

        wp_enqueue_script( 'jquery-maskedinput', NINJA_FORMS_URL .'js/min/jquery.maskedinput.min.js',
                    array( 'jquery' ) );

        wp_enqueue_script('jquery-autonumeric', NINJA_FORMS_URL .'js/min/autoNumeric.min.js',
                    array( 'jquery' ) );

        wp_enqueue_script('jquery-char-input-limit', NINJA_FORMS_URL .'js/min/word-and-character-counter.min.js',
                    array( 'jquery' ) );

        wp_enqueue_script('jquery-rating', NINJA_FORMS_URL .'js/min/jquery.rating.min.js',
                    array( 'jquery' ) );

        wp_enqueue_script( 'ninja-forms-display', NINJA_FORMS_URL . 'js/min/ninja-forms-display.min.js?nf_ver=' . NF_PLUGIN_VERSION,
                    array( 'jquery', 'jquery-form', 'backbone', 'underscore' ) );

        wp_enqueue_style( 'ninja-forms-display', NINJA_FORMS_URL .'css/ninja-forms-display.css?nf_ver=' . NF_PLUGIN_VERSION );

        wp_enqueue_style( 'jquery-qtip', NINJA_FORMS_URL .'css/qtip.css' );

        wp_enqueue_style( 'jquery-rating', NINJA_FORMS_URL .'css/jquery.rating.css' );
    } else {

        wp_enqueue_media();
        wp_enqueue_style( 'jBox', Ninja_Forms::$url . 'assets/css/jBox.css' );
        wp_enqueue_style( 'summernote', Ninja_Forms::$url . 'assets/css/summernote.css' );
        wp_enqueue_style( 'codemirror', Ninja_Forms::$url . 'assets/css/codemirror.css' );
        wp_enqueue_style( 'codemirror-monokai', Ninja_Forms::$url . 'assets/css/monokai-theme.css' );
        wp_enqueue_style( 'rating', Ninja_Forms::$url . 'assets/css/rating.css' );


        if( Ninja_Forms()->get_setting( 'opinionated_styles' ) ) {

            if( 'light' == Ninja_Forms()->get_setting( 'opinionated_styles' ) ){
                wp_enqueue_style('nf-display', Ninja_Forms::$url . 'assets/css/display-opinions-light.css');
                wp_enqueue_style( 'nf-font-awesome', Ninja_Forms::$url . 'assets/css/font-awesome.min.css' );
            }

            if( 'dark' == Ninja_Forms()->get_setting( 'opinionated_styles' ) ){
                wp_enqueue_style('nf-display', Ninja_Forms::$url . 'assets/css/display-opinions-dark.css');
                wp_enqueue_style( 'nf-font-awesome', Ninja_Forms::$url . 'assets/css/font-awesome.min.css' );
            }
        } else {
            wp_enqueue_style( 'nf-display', Ninja_Forms::$url . 'assets/css/display-structure.css' );
        }

        wp_enqueue_style( 'pikaday-responsive', Ninja_Forms::$url . 'assets/css/pikaday-package.css' );

        wp_enqueue_script( 'backbone-marionette', Ninja_Forms::$url . 'assets/js/lib/backbone.marionette.min.js', array( 'jquery', 'backbone' ) );
        wp_enqueue_script( 'backbone-radio', Ninja_Forms::$url . 'assets/js/lib/backbone.radio.min.js', array( 'jquery', 'backbone' ) );
        wp_enqueue_script( 'math', Ninja_Forms::$url . 'assets/js/lib/math.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'modernizr', Ninja_Forms::$url . 'assets/js/lib/modernizr.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'moment', Ninja_Forms::$url . 'assets/js/lib/moment-with-locales.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'pikaday', Ninja_Forms::$url . 'assets/js/lib/pikaday.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'pikaday-responsive', Ninja_Forms::$url . 'assets/js/lib/pikaday-responsive.min.js', array( 'jquery' ) );
        $recaptcha_lang = Ninja_Forms()->get_setting( 'recaptcha_lang' );
        wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js?hl=' . $recaptcha_lang, array( 'jquery' ) );
        wp_enqueue_script( 'masked-input', Ninja_Forms::$url . 'assets/js/lib/jquery.maskedinput.min.js', array( 'jquery' ) );

        wp_enqueue_script( 'bootstrap', Ninja_Forms::$url . 'assets/js/lib/bootstrap.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'codemirror', Ninja_Forms::$url . 'assets/js/lib/codemirror.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'codemirror-xml', Ninja_Forms::$url . 'assets/js/lib/codemirror-xml.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'codemirror-formatting', Ninja_Forms::$url . 'assets/js/lib/codemirror-formatting.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'summernote', Ninja_Forms::$url . 'assets/js/lib/summernote.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'jBox', Ninja_Forms::$url . 'assets/js/lib/jBox.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'starrating', Ninja_Forms::$url . 'assets/js/lib/rating.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'nf-global', Ninja_Forms::$url . 'assets/js/min/global.js', array( 'jquery' ) );

        wp_enqueue_script( 'nf-front-end', Ninja_Forms::$url . 'assets/js/min/front-end.js', array( 'jquery', 'backbone', 'backbone-radio', 'backbone-marionette', 'math' ) );

        $data = apply_filters( 'ninja_forms_render_localize_script_data', array(
            'ajaxNonce' => wp_create_nonce( 'ninja_forms_display_nonce' ),
            'adminAjax' => admin_url( 'admin-ajax.php' ),
            'requireBaseUrl' => Ninja_Forms::$url . 'assets/js/',
            'use_merge_tags' => array(),
            'opinionated_styles' => Ninja_Forms()->get_setting( 'opinionated_styles' )
        ));

        foreach( Ninja_Forms()->fields as $field ){
            foreach( $field->use_merge_tags() as $merge_tag ){
                $data[ 'use_merge_tags' ][ $merge_tag ][ $field->get_type() ] = $field->get_type();
            }
        }
            wp_localize_script( 'nf-front-end', 'nfFrontEnd', $data );
    }
}



add_action( 'init', 'klh_enqueue_all_the_things', 9999 );