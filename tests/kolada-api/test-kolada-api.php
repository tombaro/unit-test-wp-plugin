<?php
/**
 * File test-kolada-api.php
 *
 * @package         Sample_Plugin
 */

namespace UnitTestDemo;

use phpmock\phpunit\PHPMock;
/**
 * Unit Test class for Kolada API.
 */
class KoladaApi extends \PHPUnit_Framework_TestCase {
	use PHPMock;

	/**
	 * Unit test function get_municipality_data.
	 *
	 * @return void
	 */
	public function test_get_municipality_data() {
		$testvalue = 'lund';

		$expected = 1241;

		$get_m_data = $this->getFunctionMock( 'UnitTestDemo', 'get_municipality_data' );
		$get_m_data->expects( $this->once() )
					->with( $testvalue )
					->willReturn( $expected );

		$this->assertEquals( $expected, get_municipality_data( $testvalue ) );
	}
}
