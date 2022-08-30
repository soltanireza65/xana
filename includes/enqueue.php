<?php
// add_action('admin_enqueue_scripts', 'dw_scripts');
// function dw_scripts($hook) {
//     // wp_enqueue_script('xana_admin_script', plugin_dir_url(__FILE__) . 'resources/dist/admin/js/admin.js', array('jquery'), '1.0', true);
//     // $screen = get_current_screen();
//     // if ('dashboard' === $screen->id) {
//     //     // wp_enqueue_style('dw_style', plugin_dir_url(__FILE__) . 'path/to/style.css', array(), '1.0');
//     // }
//     //wp_enqueue_script('jquery');

//     wp_register_script('xana_admin_script', get_template_directory_uri() . 'resources/dist/admin/js/admin.js', array('jquery'), '', true);

//     wp_enqueue_script('xana_admin_script');
// }

add_action('wp_enqueue_scripts', 'xana_scripts');
function xana_scripts() {
    wp_add_inline_script('jquery', '
      !function(){var i="9BiGFT",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/%22+i,l=localStorage.getItem(%22goftino_%22+i);g.async=!0,g.src=l?s+%22?o=%22+l:s;d.getElementsByTagName(%22head%22)[0].appendChild(g);%7D%22complete%22===d.readyState?g():a.attachEvent?a.attachEvent(%22onload%22,g):a.addEventListener(%22load%22,g,!1);%7D();


    ', 'after');


    if (get_post_type(get_the_ID()) == 'help') {
        wp_register_script('help_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/help/Single.js', [], '1.1', true);
        wp_enqueue_script('help_script');
        wp_localize_script('help_script', 'xana', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('ajax_nonce'),
            "site_url" => get_site_url(),
        ]);
    }
    // if (is_post_type_archive('help')) {
    //     wp_register_script('help_archive_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/help/Archive.js', [], '1.1', true);
    //     wp_enqueue_script('help_archive_script');
    //     wp_localize_script('help_archive_script', 'xana', [
    //         'ajaxUrl' => admin_url('admin-ajax.php'),
    //         'ajax_nonce' => wp_create_nonce('ajax_nonce'),
    //         "site_url" => get_site_url(),
    //     ]);
    // }
    // if (is_account_page()) {
    //     wp_register_script('downloads_script', XANA__PLUGIN_URL . '/resources/dist/js/pages/downloads/Downloads.js', [], '1.1', true);
    //     wp_enqueue_script('downloads_script');
    //     wp_localize_script('downloads_script', 'xana', [
    //         'ajaxUrl' => admin_url('admin-ajax.php'),
    //         'ajax_nonce' => wp_create_nonce('ajax_nonce'),
    //         "site_url" => get_site_url(),
    //     ]);
    // }
}




// inline script via wp_print_scripts
function shapeSpace_print_scripts() {

?>
    <script type="text/javascript">
          
    </script>

<?php

}
add_action('wp_print_scripts', 'shapeSpace_print_scripts');
