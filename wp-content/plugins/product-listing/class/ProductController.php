<?php

/**
* get: get,
* post: update,
* put: insert,
* delete: delete
*/
class ProductController
{
	
	private $method;

	private $model;

	private $methodPairs = array(
		'get' => 'get',
		'post' => 'update',
		'put' => 'insert',
		'delete' => 'delete'
	);

	function __construct() {

		// Modell példányosítása.
		$this->model = new ProductModel;

		// Metódus meghatározása.
		$this->getMethod();

		// Input adatok össegyűjtése.
		$input = $this->getInput();

		// Modell metódus hívása.
		switch ($this->method) {
			case 'get':
				if ( isset($input->id) ) {
					$result = $this->model->get( $input->id );
				} else {
					$result = $this->model->get();					
				}
				break;
			
			default:
				# code...
				break;
		}
		
		echo json_encode( $result );
		wp_die();
	}

	private function getMethod() {
		$this->method = strtolower( $_SERVER['REQUEST_METHOD'] );
	}

	private function getInput() {
		$input = file_get_contents( 'php://input' );
		if ( strlen($input) < 1 ) {
			$input = new stdClass;
		} else {
			$input = json_decode( $input );			
		}
		if ( count($_GET) > 0 ) {
			foreach ($_GET as $key => $value) {
				$input->{$key} = $value;
			}
		}
		return $input;
	}
}