<?php
use DB;
$google_details   = Home::get_google_details(); 
        $gm_client_id=$google_details[0]->sm_gl_client_id;
        $gm_client_secret_key=$google_details[0]->sm_gl_sec_key;
        define('CLIENT_ID', $gm_client_id);
        /* Google App Client Secret */
        define('CLIENT_SECRET', $gm_client_secret_key);
        /* Google App Redirect Url */
        define('CLIENT_REDIRECT_URL', url('google_login'));
/* Google App Client Id */
/*define('CLIENT_ID', '803492427490-pru94hnfvh242rbv222k9olo1d73od1n.apps.googleusercontent.com');

/* Google App Client Secret */
/*define('CLIENT_SECRET', 'HB7lPHJBPgYaIxOFi1WnnnpP');*/

/* Google App Redirect Url */
/*define('CLIENT_REDIRECT_URL', 'http://localhost/LaravelSingleVendor_v1.0/google_login');*/

?>