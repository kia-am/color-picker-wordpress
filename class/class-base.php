<?php 
class CLORPICKER
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    }
    public function admin_enqueue_scripts($hook)
    {
        wp_enqueue_script('ticker-admin', $this->plugins_url('assets/js/ticker-admin.js'), array('jquery','wp-color-picker'), TICKER_VERSION, true);
        wp_enqueue_style('wp-color-picker');
    }
    public function plugins_url($url)
    {
        return plugins_url('color picker/' . $url);
    }
}
new CLORPICKER();
