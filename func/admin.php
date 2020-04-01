<?php
// ========================================//
// DEFINICOES DE MENU DE PAINEL
// ========================================// 
function ciar_menu_adm(){
    global $menu, $submenu;

    $menu[5][0] = 'Notícias';

  
    unset($submenu['themes.php'][6]); // remove customize
    unset($submenu['themes.php'][8]); // remove editor
    remove_submenu_page('themes.php','theme-editor.php');
    

    // RESTRINGINDO ITENS DO MENU LATERAL PARA LIMPAR AREA
    $current_user = wp_get_current_user();
    if ($current_user->user_login !== 'afcwebdesign') {
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
    }

}
add_action( 'admin_menu', 'ciar_menu_adm', 999 );


// ========================================//
// MOSTRA PAINEL DO ACF PRO
// ========================================// 
$current_user = wp_get_current_user();
if ($current_user->ID === 3) { add_filter('acf/settings/show_admin', 'ciar_mostra_acfmenu'); }
function ciar_mostra_acfmenu( $show ) { return current_user_can('manage_options'); }


// ========================================//
// REMOVE CUSTOMIZADOR
// ========================================// 
function ciar_remove_customize() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('customize');
}
add_action( 'wp_before_admin_bar_render', 'ciar_remove_customize' );


// ========================================//
// CSS
// ========================================// 
function ciar_admin_css() {
    echo '<style>';
    echo '</style>';
}
add_action( 'admin_head', 'ciar_admin_css' );



// ========================================//
// REMOVER ICONES DE BARRA ADMIN
// ========================================//
function my_admin_bar_render() {
    global $wp_admin_bar;

      // $wp_admin_bar->remove_menu('wp-logo');       
      // $wp_admin_bar->remove_menu('about');         
      // $wp_admin_bar->remove_menu('wporg');         
      $wp_admin_bar->remove_menu('documentation'); 
      $wp_admin_bar->remove_menu('support-forums');
      $wp_admin_bar->remove_menu('feedback');      
      // $wp_admin_bar->remove_menu('site-name');  
      // $wp_admin_bar->remove_menu('view-site');     
      // $wp_admin_bar->remove_menu('updates');       
      // $wp_admin_bar->remove_menu('comments');   
      $wp_admin_bar->remove_menu('customize');   
      // $wp_admin_bar->remove_menu('new-content');   
      $wp_admin_bar->remove_menu('w3tc');          
      // $wp_admin_bar->remove_menu('jetpack');       
      // $wp_admin_bar->remove_menu('my-account'); 

      $current_user = wp_get_current_user();
      if ($current_user->user_login !== 'afcwebdesign') {
        $wp_admin_bar->remove_menu('wppaginasinstantaneas_flush');
      }

}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render', 999 );