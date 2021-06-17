<?php
/*
Plugin Name: UCF Catalog
Description: Embeds the UCF catalog from Kuali
Version: 1.0.0
Author: Provost Communication Team
License: GPL3
GitHub Plugin URI: TheMarkBennett/UCF-kuali-catalog
*/

defined( 'ABSPATH' ) || exit;


//enqueue Kuali scripts
add_action( 'wp_enqueue_scripts', 'ucf_Kuali_scripts' );
function ucf_Kuali_scripts() {
    wp_enqueue_style( 'ucf-Kuali-catalog-style','https://ucf.kuali.co/catalog/build/catalog.css', array(), null );
    wp_enqueue_script( 'ucf-Kuali-catalog-script', 'https://ucf.kuali.co/catalog/build/catalog.js', array( 'jquery' ), NULL, true );

} 



// Catalog Shortcode
add_shortcode( 'ucf-catalog', 'ucf_catalog_shortcode' );
function ucf_catalog_shortcode( $atts ) {

    $default_atts = array(
        "subdomain" => 'ucf',
        "catalog" => '607e4c7f4a384c001daaa458'
        );
        $params = shortcode_atts( $default_atts, $atts );

    return '<div id="kuali-catalog"></div>
    <script> 
    window.subdomain = "https://'. $params['subdomain'] .'.kuali.co";
    window.catalogId = "'. $params['catalog'] .'";
    </script>
    
    ';
}



