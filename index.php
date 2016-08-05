<?php
//http://stackoverflow.com/questions/16388959/url-rewriting-with-php
define( 'INCLUDE_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR);

$rules = array( 
    'picture'   => "/picture/(?'text'[^/]+)/(?'id'\d+)",    // '/picture/some-text/51'
    'album'     => "/album/(?'album'[\w\-]+)",              // '/album/album-slug'
    'category'  => "/category/(?'category'[\w\-]+)",        // '/category/category-slug'
    'page'      => "/page/(?'page'about|contact)",          // '/page/about', '/page/contact'
    'post'      => "/(?'post'[\w\-]+)",                     // '/post-slug'
    'home'      => "/"                                      // '/'
);

$uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
$uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
$uri = urldecode( $uri );

foreach ( $rules as $action => $rule ) {
    if ( preg_match( '~^'.$rule.'$~i', $uri, $params ) ) {
        /* now you know the action and parameters so you can 
         * include appropriate template file ( or proceed in some other way )
         */

        include(INCLUDE_DIR . $action . '.php' );

        // exit to avoid the 404 message 
        exit();
    }
}

// nothing is found so handle the 404 error
include( INCLUDE_DIR . '404.php' );
?>