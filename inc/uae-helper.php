<?php 
if ( function_exists( 'wpcf7' ) ) {
function contact_form_select(){
    $wpcf7_form_list = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'showposts' => 999,
    ));
    $posts = array();

    if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ){
    foreach ( $wpcf7_form_list as $post ) {
        $options[ $post->ID ] = $post->post_title;
    }
    return $options;
    }
	}
}

function uae_select_ninja_form() {
    global $wpdb;
    $pt_nf_table_name = $wpdb->prefix.'nf3_forms';
    $forms = $wpdb->get_results( "SELECT id, title FROM $pt_nf_table_name" );
    foreach( $forms as $form ) {
        $options[$form->id] = $form->title;
    }
    return $options;
}