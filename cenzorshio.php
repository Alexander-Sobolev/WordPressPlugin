<?php
/*
Plugin Name: CenZorShio
Description: Automatic filtering of obscene expressions.
Version: Номер версии плагина, например: 1.0
Author: Sobolev
*/

define('CENSORSHIO_DIR', plugin_dir_path(__FILE__)); // Define the path to the plugin directory

// Function for text filtering
function censorshio_filter_content($content) {
    $profane_words = array('badword1', 'badword2', 'badword3'); // Replace these words with a list of unwanted words
    
    // Iterate through all the words in the list and replace them with asterisks
    foreach ($profane_words as $word) {
        $replacement = str_repeat('******', strlen($word));
        $content = str_ireplace($word, $replacement, $content);
    }
    
    return $content;
}

// Hook to apply filtering to content
add_filter('the_content', 'censorshio_filter_content');
add_filter('widget_text_content', 'censorshio_filter_content');