<?php
class Mckneely_City_Table {
	public function __construct() {
		add_shortcode( 'cityTable', [ $this, 'city_table_shortcode' ] );
		add_action( 'rest_api_init', [ $this, 'register_routes' ] );
	}

	public function register_routes() {
		register_rest_route( 'cities-data', '/2018', [
			'methods'  => 'GET',
			'callback' => [ $this, 'get_city_table' ],
		] );
	}

	public function get_city_data( string $key, string $order ) {
		$url      = get_stylesheet_directory_uri() . '/json/city-data/2018.json';
		$response = wp_safe_remote_get( $url, [ 'sslverify' => false ] );
		$body     = wp_remote_retrieve_body( $response );
		$cities   = json_decode( $body );

		if ( 'city' === $key ) {
			sort( $cities );
		} else {
			usort( $cities, function( $a, $b ) use ( $key ) {
				if ( $a->$key < $b->$key ) {
					return -1;
				} elseif ( $a->$key > $b->$key ) {
					return 1;
				} else {
					return 0;
				}
			});
		}

		if ( 'ASC' === $order ) {
			return array_reverse( $cities );
		}

		return $cities;
	}

	public function render_table( array $cities ) {
		return require get_stylesheet_directory() . '/partials/mckneely-cities-table.php';
	}

	public function get_city_table( WP_REST_Request $request = null ) {
		$key    = $request['sort_by'] ?? 'city';
		$order  = $request['order'] ?? 'DESC';
		$cities = $this->get_city_data( $key, $order );

		return $this->render_table( $cities );
	}

	public function city_table_shortcode() {
		$table = $this->get_city_table();
		return require get_stylesheet_directory() . '/partials/mckneely-cities-table-header.php';
	}
}
