<?php

# LOGO URL
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

# LOGO TITLE
function my_login_logo_url_title() {
    return 'Kensington';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


# LOGO IMAGE AND STYLING
function my_login_logo() { ?>
  <style type="text/css">
    .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/icons/logo.png) !important;
      text-indent: -9999px !important;
      height: 65px !important;
      width: 100% !important;
      background-size: contain !important;
      margin: 0 auto !important;
    }
    .login form {
      background: none !important;
      box-shadow: none !important;
      margin-left: 0 !important;
      margin-top: 20px !important;
      padding: 18px 24px !important;
      border: 1px solid #666 !important;
    }
    .login form .input, .login input[type="text"] {
      font-size: 14px !important;
      margin: 2px 6px 16px 0 !important;
      padding: 6px !important;
      width: 100% !important;
      background: transparent !important;
      color: #333 !important;
      border: 0;
      border-radius: 0;
      border-bottom: red 2px solid;
    }
    .login label {
      color: #333 !important;
      font-size: 14px !important;
    }
    #login_error, .login .message {
      margin: 25px !important;
      max-width: 275px !important;
      padding: 12px !important;
    }
    .login #backtoblog a, .login #nav a, .login h1 a {
      color: #333 !important;
      text-decoration: none !important;
    }
    #login {
      margin: auto !important;
      padding: 10% 0 0 !important;
      width: 320px !important;
    }
    body {
      background: #eaeaea !important;
      color: #333 !important;
      line-height: 1.4em !important;
      min-width: 0 !important;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
