<?php

namespace Slab\View;

use InvalidArgumentException;

/**
 * View Finder
 *
 * @package default
 * @author Luke Lanchester
 **/
class ViewFinder {


	/**
	 * @var array View directories
	 **/
	protected $directories = [];


	/**
	 * @var array Memoized map of names to files
	 **/
	protected $_files = [];


	/**
	 * Register a directory of views
	 *
	 * @param string Directory
	 * @param string Optional vendor prefix
	 * @return void
	 **/
	public function addDirectory($dir, $prefix = null) {

		$dir = rtrim($dir, '/');

		if(!is_dir($dir)) {
			throw new InvalidArgumentException("View directory not found: $dir");
		}

		if(!array_key_exists($prefix, $this->directories)) {
			$this->directories[$prefix] = [];
		}

		$this->directories[$prefix][] = $dir;

	}



	/**
	 * Find a file for the given name
	 *
	 * @param string Name
	 * @return string File
	 **/
	public function findFile($name) {

		if(empty($name)) {
			return null;
		}

		if(array_key_exists($name, $this->_files)) {
			return $this->_files[$name];
		}

		$pos = strpos($name, ':');

		if($pos === false) {
			$prefix = null;
		} else {
			$prefix = substr($name, 0, $pos);
			$name = substr($name, $pos + 1);
		}

		if(empty($this->directories[$prefix])) {
			return $this->_files[$name] = null;
		}

		$dirs = $this->directories[$prefix];

		foreach($dirs as $dir) {

			$file = "$dir/$name.php";

			if(is_file($file)) {
				return $this->_files[$name] = $file;
			}

		}

		return $this->_files[$name] = null;

	}



}
