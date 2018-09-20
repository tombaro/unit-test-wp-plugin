<?php
/**
 * Handle requests to Kolada API
 *
 * @package Sample_Plugin
 */

namespace UnitTestDemo;

/**
 * Require composer.
 */
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use GuzzleHttp\Client;

/**
 * Undocumented class.
 */
class Kolada_API {

	/**
	 * Our client
	 *
	 * @var GuzzleHttp\Client
	 */
	private $client;

	/**
	 * The base uri to api.
	 *
	 * @var string
	 */
	protected $base_uri = 'http://api.kolada.se/v2/';

	/**
	 * Class construct.
	 */
	public function __construct() {
		$this->client = new Client(
			[
				'base_uri' => $this->base_uri,
			]
		);
	}

	/**
	 * Get municipality data by key.
	 *
	 * @param string $key Value to search for.
	 * @return Object The answer.
	 */
	public function get_municipality_data( $key ) {
		$response = $this->client->request(
			'GET',
			'municipality',
			[
				'query' => [
					'title' => $key,
				],
			]
		);

		$id = 0;

		$municipality_object = json_decode( $response->getBody() );
		foreach ( $municipality_object->values as $obj ) {
			$id = $obj->id;
		}

		return $id;
	}
}
