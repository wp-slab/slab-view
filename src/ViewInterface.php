<?php

namespace Slab\View;

use Slab\Core\Http\ResponseInterface;

/**
 * View Interface
 *
 * @package default
 * @author Luke Lanchester
 **/
interface ViewInterface extends ResponseInterface {


	/**
	 * Set data
	 *
	 * @param string|array Key or array of keys
	 * @param mixed Value
	 * @return void
	 **/
	public function set($key, $value = null);


	/**
	 * Bind a value
	 *
	 * @param string Key
	 * @param mixed Reference to bound value
	 * @return void
	 **/
	public function bind($key, &$value);


	/**
	 * Render final view content
	 *
	 * @return void
	 **/
	public function render();


}
