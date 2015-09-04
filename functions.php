<?php

namespace Slab\View;

/**
 * Initialize Slab View
 *
 * @return void
 **/
function slab_view_init($slab) {

	$slab->autoloader->registerNamespace('Slab\View', SLAB_VIEW_DIR . 'src');

	$slab->singleton('Slab\View\ViewFactory', function($slab){
		$finder = $slab->make('Slab\View\ViewFinder');
		$views = new ViewFactory($finder);
		do_action('slab_view_directories', $views);
		return $views;
	});

	$slab->alias('view', 'Slab\View\ViewFactory');

}


/**
 * Add default view directories for WordPress
 *
 * @param Slab\View\ViewFactory
 * @return void
 **/
function slab_view_default_locations($views) {

	// @todo parent theme support
	$views->addDirectory(get_template_directory());

}
