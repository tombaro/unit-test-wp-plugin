<?php
/**
 * File test-demo.php
 *
 * @package         Sample_Plugin
 */

namespace UnitTestDemo;

use phpmock\phpunit\PHPMock;

/**
 * Undocumented class
 */
class DemoTest extends \PHPUnit_Framework_TestCase {
	use PHPMock;

	/**
	 * The plugin class to test.
	 *
	 * @var Sample_Plugin
	 */
	private $plugin;

	/**
	 * Set up our test.
	 *
	 * @return void
	 */
	protected function setUp() {
		$this->plugin = new Sample_Plugin();
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function test_demo_get_option() {
		$get_option = $this->getFunctionMock( 'UnitTestDemo', 'get_option' );
		$get_option->expects( $this->once() )
					->with( $this->equalTo( 'demo_foo' ), $this->identicalTo( null ) )
					->willReturn( 'bar' );

		$this->assertEquals( 'bar', $this->plugin->demo_get_option( 'foo' ) );
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function test_demo_get_option_casts_array() {

		$get_option = $this->getFunctionMock( 'UnitTestDemo', 'get_option' );
		$get_option->expects( $this->once() )
					->with( $this->equalTo( 'demo_foo' ), $this->identicalTo( array() ) )
					->willReturn( 'bar' );

		$this->assertEquals( array( 'bar' ), $this->plugin->demo_get_option( 'foo', array() ) );
	}
}
