<?php

namespace Slab\View;

use InvalidArgumentException;

/**
 * PHP Template View
 *
 * @package default
 * @author Luke Lanchester
 **/
class PhpView extends BaseView {


	/**
	 * @var array View data
	 **/
	protected $data = [];


	/**
	 * Constructor
	 *
	 * @param string File
	 * @param array Data
	 * @return void
	 **/
	public function __construct($file, array $data = null) {

		$this->setFile($file);

		if($data !== null) {
			$this->set($data);
		}

	}



	/**
	 * Set view file
	 *
	 * @param string File
	 * @return void
	 **/
	public function setFile($file) {

		if(!is_file($file)) {
			throw new InvalidArgumentException("View file not found: $file");
		}

		$this->file = $file;

	}



	/**
	 * Set data
	 *
	 * @param string|array Key or array of keys
	 * @param mixed Value
	 * @return void
	 **/
	public function set($key, $value = null) {

		if(is_array($key)) {
			foreach($key as $k => $v) {
				$this->data[$k] = $v;
			}
		} else {
			$this->data[$key] = $value;
		}

	}



	/**
	 * Bind a value
	 *
	 * @param string Key
	 * @param mixed Reference to bound value
	 * @return void
	 **/
	public function bind($key, &$value) {

		$this->data[$key] =& $value;

	}



	/**
	 * Render final view content
	 *
	 * @return void
	 **/
	public function render() {

		// global $wp_query, $wpdb;

		extract($this->data, EXTR_SKIP);

		ob_start();

		include $this->file;

		return ob_get_clean();

	}



}
