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

function ucf_Kuali_scripts() {
    wp_enqueue_style( 'ucf-Kuali-catalog-style','https://ucf.kuali.co/catalog/build/catalog.css', array(), null );
    wp_enqueue_script( 'ucf-Kuali-catalog-script', 'https://ucf.kuali.co/catalog/build/catalog.js', array( 'jquery' ), NULL, true );

} 
add_action( 'wp_enqueue_scripts', 'ucf_Kuali_scripts' );


// Catalog Shortcode
add_shortcode( 'ucf-catalog', 'ucf_catalog_shortcode' );
function ucf_catalog_shortcode() {

    return '<div id="kuali-catalog"></div>
    <script> 
    window.subdomain = "https://ucf.kuali.co";
    window.catalogId = "607e4c7f4a384c001daaa458";
    </script>
    
    ';
}



