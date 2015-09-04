<?php
/*
Plugin Name: Slab &mdash; View
Plugin URI: http://www.wp-slab.com/components/view
Description: The Slab View component. Create views from templates and files.
Version: 1.0.0
Author: Slab
Author URI: http://www.wp-slab.com
Created: 2015-08-08
Updated: 2015-08-08
Repo URI: github.com/wp-slab/slab-view
Requires: slab-core
*/


// Define
define('SLAB_VIEW_INIT', true);
define('SLAB_VIEW_DIR', plugin_dir_path(__FILE__));
define('SLAB_VIEW_URL', plugin_dir_url(__FILE__));


// Includes
include SLAB_VIEW_DIR . 'functions.php';


// Hooks
add_action('slab_init', 'Slab\View\slab_view_init');
add_action('slab_view_directories', 'Slab\View\slab_view_default_locations');
