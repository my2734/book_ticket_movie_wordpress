<?php 

class BlockDemo{
    function __construct()
    {
        // add_action('init',[ $this, 'gutenberg_block_register_block' ] );
        die("hello ca nha yeu");
    }

    function gutenberg_block_register_block(){
        
    }
}

new BlockDemo();