<?php

/**
 * Undocumented class
 */
class KoladaApiGetMunicipalityCest {
	/**
	 * Undocumented function
	 *
	 * @param ApiTester $i Our user.
	 * @return void
	 */
	public function _before( ApiTester $i )	{
	}

	/**
	 * Undocumented function
	 *
	 * @param ApiTester $i Our user.
	 * @return void
	 */
	public function _after( ApiTester $i) {
	}

	// Our tests.

	/**
	 * Undocumented function
	 *
	 * @param ApiTester $i Our user.
	 * @return void
	 */
	public function get_municipality_via_api( ApiTester $i ) {
		$i->haveHttpHeader( 'Content-Type', 'application/x-www-form-urlencoded' );
		$i->sendGET( '/municipality', [ 'title' => 'lund' ] );
		$i->seeResponseCodeIs( \Codeception\Util\HttpCode::OK ); // 200
		$i->seeResponseIsJson();
		$i->seeResponseContainsJson(
			[
				'values' => [
					'id' => '1281',
					'title' => 'Lund',
					'type' => 'K',
				],
			]
		);
	}
}
