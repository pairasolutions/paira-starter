<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Disable CSS/JS Cache
 */

function test() {
    echo 'form out';
}

function wpse_84670_time_as_version( $url ) {
    return add_query_arg( array( 'ver' => time() ), $url );
}

add_filter( 'script_loader_src', 'wpse_84670_time_as_version' );
add_filter( 'style_loader_src', 'wpse_84670_time_as_version' );

if ( !function_exists( 'test' ) ) {

    function test() {
        echo 'form dev.';
    }

}
