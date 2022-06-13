<?php
require_once  'class.load.php';


if ( ! class_exists( 'WordsearchAdmin', false ) ) {

class WordsearchAdmin {

    protected $loader;
    protected $version;
  
  
    public function __construct() {
        
        $this->loader();
       

        // ---- HOOKS
        $this->kns_hooks();


        // ---- SHORTCODES
        ///$this->loader->run_shortcode('xxx', array($this,'functionName'));
        

        
    }

    //  ----- SETUP INSTALL FEATURES

    private function loader() {
        $this->loader = new WordsearchAdminLoader();
    }

   

    public function run() {
        $this->loader->run();
    }

    //  ---- POST INFO
    public function run_post_id(){
    
        $post = get_post();
       
        if($post){
            return $post->ID;
        }
    }

    //  ---- HOOKS

    public function kns_hooks() {

       $this->loader->add_action( 'admin_enqueue_scripts', $this, 'kns_run_admin_scripts' );
       $this->loader->add_action( 'wp_enqueue_scripts', $this, 'kns_run_frontend_scripts' );
       


    }

    // ---- SCRIPTS (admin)

    public function kns_run_admin_scripts(){
        $screen = get_current_screen();
    }
     // ---- SCRIPTS (frontend)
    public function kns_run_frontend_scripts(){
          $currentTheme = wp_get_theme();
          wp_enqueue_script('jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
                    // aos
          wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
          wp_enqueue_script('aos-js','https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ), null, true);


          // Images Loaded
          wp_enqueue_script('loaded-js', get_stylesheet_directory_uri() . '/js/imagesLoaded.js', array( 'jquery' ), null, true);

          // Draggable
          wp_enqueue_script('tween-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.5/TweenMax.min.js', array( 'jquery' ), null, true);
          wp_enqueue_script('draggable-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/utils/Draggable.min.js', array( 'jquery' ), null, true);


           // Scrolling - history
          wp_enqueue_script('scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.6/jquery.mousewheel.min.js', array( 'jquery' ), null, true);
          wp_enqueue_script('tween-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array( 'jquery' ), null, true);
          wp_enqueue_script('scroll-magic-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array( 'jquery' ), null, true);
          wp_enqueue_script('scroll-magicone-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array( 'jquery' ), null, true);
          wp_enqueue_script('scroll-magictwo-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js', array( 'jquery' ), null, true);
          wp_enqueue_script('scroll-magicthree-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array( 'jquery' ), null, true);
          


          // Font Awesome CDN
          wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/92aeb4a687.js', false, null);
           wp_enqueue_style('font-typekit', 'https://use.typekit.net/lav5bcu.css');

          // Slick Carousel
          wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
          wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), null, true);

           // Main theme stylesheet
          wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/css/style.css', [], $currentTheme->get('Version'), 'screen');

          wp_enqueue_script( 'waypoint-js', get_stylesheet_directory_uri() . '/js/waypoint.js', array( 'jquery' ), null, true);
          

         

          // Main theme script
          wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), null, true);
          wp_localize_script( 'custom-js', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
            
    }

    


    
}
}
