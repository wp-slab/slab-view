<?php

namespace Slab\View;

use InvalidArgumentException;

/**
 * View Factory
 *
 * @package default
 * @author Luke Lanchester
 **/
class ViewFactory {


	/**
	 * @var Slab\View\ViewFinder
	 **/
	protected $finder;


	/**
	 * Constructor
	 *
	 * @param Slab\View\ViewFinder
	 * @return void
	 **/
	public function __construct(ViewFinder $finder) {

		$this->finder = $finder;

	}



	/**
	 * Get a new view
	 *
	 * @param string View name
	 * @param array View data
	 * @return Slab\View\ViewInterface
	 **/
	public function make($name, array $data = null) {

		$file = $this->finder->findFile($name);

		if(!$file) {
			throw new InvalidArgumentException("View not found: $name");
		}

		return new PhpView($file, $data);

	}



	/**
	 * Register a directory of views
	 *
	 * @param string Directory
	 * @param string Optional vendor prefix
	 * @return void
	 **/
	public function addDirectory($dir, $prefix = null) {

		return $this->finder->addDirectory($dir, $prefix);

	}



}
