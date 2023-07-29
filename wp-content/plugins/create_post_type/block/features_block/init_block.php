<?php 
class InitBlock{
    public function __construct()
    {
        add_action('init', [$this, 'reigster_block_example1_01']);
    }

    function reigster_block_example1_01(){
        // die("hello ca nha yeu");
        wp_register_script(
            'gutenbeg_block_example1_01',
            plugin_dir_url( __FILE__ ) . 'src/gutenbeg_block_example1_01.js',
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor')
        );
    
        // die(PROJECT_MANAGEMENT_PATH . 'block/features_block/init_block.php');
        register_block_type('gutenberg-examples/example1-01', array(
            'editor_script' => 'gutenbeg_block_example1_01',
            // 'render_callback' => 'display_block_list_movie',
        ));
    }
}