<?php
function settings_init(){
	register_setting(PLUGIN_NAME,'colorpicker');
	$opts = get_option('colorpicker');
	
	add_settings_section(
		'settings-sections',
		__('Settings colorpicker','post-submitter'),
		'settings_section_cb',
		PLUGIN_NAME
	);
	
	add_settings_field(
		'colorpicker',
		__('Select your color','colorpicker'),
		'settings_colorpicker',
		PLUGIN_NAME,
		'settings-sections',
		[
			'name' => 'colorpicker',
			'label_for' => 'colorpicker-settings',
			'class' => 'colorpicker-settings',
			'options' => $opts
		]
	);
}
add_action('admin_init','settings_init');
function settings_section_cb(){
	_e('colorpicker','colorpicker');
}
function settings_colorpicker($args){
    ?>
    <div class="ticker-colors-html-metabox">
    <p>
   <label class="row" for="<?php echo esc_attr($args['label_for']); ?>"><?php esc_html_e('Background Color', 'ticker'); ?></label>
        <input name="colorpicker[<?php echo esc_attr($args['name']); ?>]" id="<?php echo esc_attr($args['label_for']); ?>" type="text" value="<?php echo ($args['options']['colorpicker']) ? esc_attr($args['options']['colorpicker']) : '#fff'; ?>" class="ticker-colorpicker" data-default-color="#fff" >
    </p>
    <?php
}
function settingspage(){
    ?>
    <form action="options.php" method="post">
        <?php
        settings_fields(PLUGIN_NAME); 
        do_settings_sections(PLUGIN_NAME); 
        submit_button(__('Save Settings','colorpicker'),'colorpicker');
        ?>
        
    </form>
    <?php
    }