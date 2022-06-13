<?php

class WordsearchAdminLoader {

    protected $actions;
    protected $filters;

    public function __construct() {
        $this->actions = array();
        $this->filters = array();
    }

    public function add_action( $hook, $component, $callback ) {
        $this->actions = $this->add( $this->actions, $hook, $component, $callback );
    }

    public function add_filter( $hook, $component, $callback ) {
        $this->filters = $this->add( $this->filters, $hook, $component, $callback );
    }

    private function add( $hooks, $hook, $component, $callback ) {

        $hooks[] = array(
            'hook'      => $hook,
            'component' => $component,
            'callback'  => $callback
        );

        return $hooks;

    }

    // ---- SHORTCODES

    public function run_shortcode($hook, $array){
        add_shortcode(''.$hook.'', $array);
    }

    public function add_menu($title, $label, $type, $slug, $code, $icon, $position){
        add_menu_page(''.$title.'', ''.$label.'', ''.$type.'', ''.$slug.'', ''.$code.'', ''.$icon.'', $position);
    }

    public function add_submenu($parentslug, $label, $title, $type, $slug, $code){
         
        add_submenu_page(''.$parentslug.'', ''.$label.'', ''.$title.'', ''.$type.'', ''.$slug.'', ''.$code.'');
    }

    

    // ---- CUSTOM POST TYPES


    public function register_post($type, $hook, $name, $supports, $singular , $dashicon, $menuorder, $rewrite){ //$menuposition
       
        register_post_type( ''.$type.'',
            array(
                    'labels' => array(
                        'name'               => __( ''.$name.'', ''.$hook.'' ),
                        'singular_name'      => __( ''.$singular.'', ''.$hook.'' ),
                        'all_items'          => __( 'All '.$name.'', ''.$hook.'' ),
                        'add_new'            => __( 'Add New', ''.$hook.'' ),
                        'add_new_item'       => __( 'Add New '.$name.'', ''.$hook.'' ),
                        'edit'               => __( 'Edit', ''.$hook.'' ),
                        'edit_item'          => __( 'Edit '.$name.'', ''.$hook.'' ),
                        'new_item'           => __( 'New '.$name.'', ''.$hook.'' ),
                        'view'               => __( 'View '.$name.'', ''.$hook.'' ),
                        'view_item'          => __( 'View '.$name.'', ''.$hook.'' ),
                        'search_items'       => __( 'Search '.$name.'', ''.$hook.'' ),
                        'not_found'          => __( 'No '.$name.' found', ''.$hook.'' ),
                        'not_found_in_trash' => __( 'No '.$name.' found in trash', ''.$hook.'' ),
                        'parent'             => __( 'Parent '.$name.'', ''.$hook.'' )
                    ),
                    'description'         => __( 'This is where you can add new '.$name.'.', ''.$hook.'' ),
                    'public'              => true,
                    'show_ui'             => true,
                    'map_meta_cap'        => true,
                    'menu_icon'           => ''.$dashicon.'',
                    'publicly_queryable'  => true,
                    'exclude_from_search' => false,
                    'hierarchical'        => false, 
                    'query_var'           => true,
                    'supports'            => $supports,
                    'has_archive'         => true,
                    'show_in_nav_menus'   => true,
                    'show_in_rest' => true,
                    'menu_position'       => $menuorder,
                    //'taxonomies'          => array(''.$hook.'', 'post_tag'),
                    'rewrite'             => array(
                                            'slug'                       => ''.$rewrite.'',
                                            'with_front'                 => false,
                                            )
                    
                )
            );
    flush_rewrite_rules();
    }

    public function register_scripts($name, $type){
       
        if ($type == 'style'):
            wp_enqueue_style ($name.'_style', plugin_dir_url( __FILE__ ). ''.$name.'.css' );
        endif;

        if ($type == 'external-script_one'):
            wp_enqueue_script ('external_script_one', ''.$name.'' );
        endif;

        if ($type == 'external-script_two'):
            wp_enqueue_script ('external_script_two', ''.$name.'' );
        endif;

        if ($type == 'external-script_three'):
            wp_enqueue_script ('external_script_three', ''.$name.'' );
        endif;

         if ($type == 'external-script_four'):
            wp_enqueue_script ('external_script_four', ''.$name.'' );
        endif;

        if ($type == 'script'):
            wp_enqueue_script ('scripts', ''.$name.'' );
        endif;
        
    }

    // ---- CUSTOM TAXONOMIES

    public function register_taxonomy($type, $name, $singular, $cptype , $reword, $front) {
       
        $labels = array(
            'name'                       => _x( ''.$name.'', 'text_domain' ),
            'singular_name'              => _x( ''.$singular.'', 'text_domain' ),
            'menu_name'                  => __( ''.$name.'', 'text_domain' ),
            'all_items'                  => __( 'All Items', 'text_domain' ),
            'parent_item'                => __( 'Parent Item', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
            'new_item_name'              => __( 'New Item Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Item', 'text_domain' ),
            'edit_item'                  => __( 'Edit Item', 'text_domain' ),
            'update_item'                => __( 'Update Item', 'text_domain' ),
            'view_item'                  => __( 'View Item', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Items', 'text_domain' ),
            'search_items'               => __( 'Search Items', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No items', 'text_domain' ),
            'items_list'                 => __( 'Items list', 'text_domain' ),
            'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
        );
         $rewriter = array(
            'slug'                       => ''.$reword.'',
            'with_front'                 => $front,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'has_archive'                => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewriter,
        );
        register_taxonomy( ''.$type.'', ''.$cptype.'', $args );
       
            
        
    }

    // ---- RUN FUNCTIONS

    public function run_save($postid, $field, $meta){
        if($postid){
                $save_url    = sanitize_text_field( $field );
                update_post_meta( $postid, ''.$meta.'', $save_url );
        } else { // for metaboxes saved external from custom post type
                $post = get_post();
            if($post){
                $save    = sanitize_text_field( $field );
                update_post_meta( $post->ID, ''.$meta.'', $save);
            }
        } 
    }

    public function run_meta_box($postid, $field, $meta, $type, $outputText){
           global $wpdb;
           $metVal   = '';
           $selected = '';

           $resourceCats = get_terms('resourcetax');
           $posts = get_posts(array( 'post_type'=>'post', 'posts_per_page'=>'-1', 'numberposts'=>'-1', 'orderby' => 'post_title', 'order' => 'ASC') );
           $pages = get_posts(array( 'post_type'=>'page', 'posts_per_page'=>'-1', 'numberposts'=>'-1', 'orderby' => 'post_title', 'order' => 'ASC') );
           
            if($postid):
             $metVal   = get_post_meta($postid, ''.$meta.'', true ); 
            endif;

             if ($type == 'img'){
                 $output = $outputText;
                // $output .= '<br/><label>Url of the Image (get from media library)</label>';
                 $output .= '<input type="text" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }

             if ($type == 'url'){
                 $output = $outputText;
                 $output .= '<input type="text" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }
             if ($type == 'iframe'){
                 $output = $outputText;
                 $output .= '<input type="text" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }

             if ($type == 'text'){
                 $output = $outputText;
                 $output .= '<input type="text" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }
             if ($type == 'email'){
                 $output = $outputText;
                 $output .= '<input type="email" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }
             if ($type == 'textarea'){
                 $output = $outputText;
                 $output .= '<textarea  name="'.$field.'" placeholder="" rows="5" class="input full" style="width:100%; padding:10px;">'.$metVal.'</textarea>';
                
             }

             if ($type == 'file'){

                 
                 $file   = get_post_meta($postid, ''.$field.'', true);
                 $query = $wpdb->get_results("SELECT * FROM wp_documents_upload where post_id='".$postid."' and file='".$file."' ");

                 $output = $outputText;
                 $val    = explode(',', $metVal);
                  $output .= '<br><br>';
                  $output .= '<table class="wp-list-table widefat fixed striped posts">';
        
                    $output .= '<thead>';
                    $output .= '<tr>';
                    $output .= '<td>Date Uploaded</td>';
                    $output .= '<td>Download</td>';
                    $output .= '<td>Verified</td>';
                    $output .= '</tr>';
                    $output .= '</thead>';

                    foreach($val as $v){
                       

                        foreach($query as $q){
                             $output .= '<tr>';
                             $output .= '<td>'.date('d/m/Y',time($q->date_submitted)).'</td>';
                             $output .= '<td><a href="'.$file.'">Download File</td>';
                            if($q->verified == 'no'){
                                 $output .= '<td><div data-id="'.$postid.'" data-file="'.$file.'" style="margin: 5px 0 15px; background: #f00; -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); margin: 5px 15px 2px; padding: 6px 14px 6px 20px; text-align:center; color:#fff; position:relative;"><div class="dashicons dashicons-info verify-doc" style="background: rgba(0,0,0,0.3); float: left; position: absolute; left: 0px; padding: 5px 2px; margin-top: -5px;"></div>Verify</div></td>';
                            }else{
                                $output .= '<td><div style="margin: 5px 0 15px; background: green; -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); box-shadow: 0 1px 1px 0 rgba(0,0,0,.1); margin: 5px 15px 2px; padding: 6px 14px 6px 20px; text-align:center; color:#fff; position:relative;"><div class="dashicons dashicons-check" style="background: rgba(0,0,0,0.3); float: left; position: absolute; left: 0px; padding: 5px 2px; margin-top: -5px;"></div>Verified</div></td>';
                            }
                            $output .= '</tr>';
                         }
                       
                        

                    }
                    

                    $output .= '</table>';
                 
                // $output .= '<input type="file" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full" style="width:100%; padding:10px;">';
                
             }
             if ($type == 'date'){
                 $output = $outputText;
                 $output .= '<input type="text" value="'.$metVal.'" name="'.$field.'" placeholder="" class="input full datepicker" style="width:100%; padding:10px;">';
                
             }
             if ($type == 'selectyn'){
                 $output = $outputText;

                 $value = array(
                    'yes'=>'Yes',
                    'no'=>'No'
                    ); 

                 $output .= '<select name="'.$field.'" style="width:100%;">';
                 $output .= '<option value="">Please Select</option>';

                 foreach ($value as $val=>$v):
                    $getID = $val;
                    $vme   = $v;

                    if ($metVal == $getID){ $selected = 'selected'; }else{ $selected = '';};

                    $output  .= '<option value="'.$getID.'" '.$selected.'>'.$vme.'</option>';
                    
                         
                 endforeach;
                 $output .= '</select>';
                
             }
             if ($type == 'select-layout'){
                 $output = $outputText;
                // $output .= '<br/><label>Colour</label>';

                 $value = array(
                    'video'=>'Video',
                    'normal'=>'Normal',
                    
                    ); 

                 $output .= '<select name="'.$field.'" style="width:100%;">';

                 foreach ($value as $val=>$v):
                    $getID = $val;
                    $vme   = $v;

                    if ($metVal == $getID){ $selected = 'selected'; }else{ $selected = '';};

                    $output  .= '<option value="'.$getID.'" '.$selected.'>'.$vme.'</option>';
                    
                         
                 endforeach;
                 $output .= '</select>';
                
             }

             

            echo  $output;
          
    }


    public function run() {

        foreach ( $this->filters as $hook ) {
            add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
        }

        foreach ( $this->actions as $hook ) {
            add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
        }

    }

}
