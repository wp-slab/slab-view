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

	$child_theme = get_stylesheet_directory();
	$parent_theme = get_template_directory();

	$views->addDirectory($child_theme);

	if($child_theme !== $parent_theme) {
		$views->addDirectory($parent_theme);
	}

}
