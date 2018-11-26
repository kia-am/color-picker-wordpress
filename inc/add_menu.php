<?php
function add_page(){
	add_menu_page(
		__('Color picker','color picker'),
		__('Color picker','color picker'),
		'manage_options',
		'color picker',
		'settingspage',
		PLUGIN_URL.'/'.IMG_DIR.'/colorpicker.jpg',
		99
	);
	
	add_submenu_page(
		'color picker',
		__('Color picker','post-submitter'),
		__('Settings','post-submitter'),
		'manage_options',
		'color picker',
		'settingspage'
	);

}
add_action('admin_menu','add_page');

function add_action_links($links){
	$links[] = '<a href="'.esc_url(admin_url('admin.php?page='.PLUGIN_NAME)).'">'.esc_html__('Settings','post-submitter').'</a>';
	return $links;
	
}
add_filter('plugin_action_links_'.BASE_PLUGIN_DIR,'add_action_links');