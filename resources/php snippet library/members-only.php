<?php
/*
Send not logged in folks to home page!
*/
add_action('template_redirect', 'members_only');
function members_only(){
    if( is_page('super-secret') && ! is_user_logged_in() ) {
        wp_redirect( home_url() );
        die();
    }
}
?>