<?php

namespace Slab\View;

use InvalidArgumentException;

use Slab\Core\Http\Response;
use Slab\Core\Http\RequestInterface;

/**
 * PHP Template View
 *
 * @package default
 * @author Luke Lanchester
 **/
abstract class BaseView implements ViewInterface {


	/**
	 * Serve the response
	 *
	 * @param Slab\Core\Http\RequestInterface
	 * @return void
	 **/
	public function serve(RequestInterface $request = null) {

		if($request === null) {
			$request = slab('request');
		}

		$response = new Response($this->render());

		$response->headers->set('X-Slab', '1234');

		$response->prepare($request);

		$response->send();

	}



}
