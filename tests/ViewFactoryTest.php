<?php

use Mockery as m;

use Slab\View\ViewFactory;

/**
 * Test ViewFactory
 *
 * @package default
 * @author Luke Lanchester
 **/
class ViewFactoryTest extends PHPUnit_Framework_TestCase {


	/**
	 * Test can instantiate an empty factory
	 *
	 * @return void
	 **/
	public function testCanInstantiateFactory() {

		$finder = m::mock('Slab\View\ViewFinder');
		$factory = new ViewFactory($finder);

		$this->assertInstanceOf('Slab\View\ViewFactory', $factory);

	}



	/**
	 * Tear down tests
	 *
	 * @return void
	 **/
	public function tearDown() {

		m::close();

	}



}
