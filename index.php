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


// Hooks
add_action('slab_init', 'slab_view_init');
add_action('slab_views', 'slab_view_default_locations');


// Init
function slab_view_init($slab) {

	$slab->autoloader->registerNamespace('Slab\View', SLAB_VIEW_DIR . 'src');

	$slab->singleton('Slab\View\ViewFactory', function(){
		$finder = new Slab\View\ViewFinder;
		$views = new Slab\View\ViewFactory($finder);
		do_action('slab_views', $views);
		return $views;
	});
	$slab->alias('view', 'Slab\View\ViewFactory');

}

function slab_view_default_locations($views) {

	$views->addDirectory(get_template_directory());

}
