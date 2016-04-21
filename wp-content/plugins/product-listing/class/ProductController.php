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

	private $input;

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
		$this->getInput();

		// Modell metódus hívása.
		switch ($this->method) {
			case 'get':
				$result = $this->handleGet();
				break;
			case 'post':
				$result = $this->handlePost();
				break;
			
			default:
				# code...
				break;
		}

		$trans = $this->getTranslates();
		$serverResponse = array(
			'productData' => $result,
			'translates' => $trans
		);

		echo json_encode( $serverResponse );
	}

	private function getTranslates() {

		// Fordítások lekérése.
		$trans = array( 
			'Name' => __( 'Name', 'productlisting' ),
			'Price' => __( 'Price', 'productlisting' ),
			'Insdate' => __( 'Insdate', 'productlisting' ),
			'Commands' => __( 'Commands', 'productlisting' ),
			'Update' => __( 'Update', 'productlisting' )
		);

		return $trans;		
	}

	private function handleGet() {
		if ( isset($this->input->id) ) {
			return $this->model->get( $this->input->id );
		} else {
			return $this->model->get();					
		}
	}

	private function handlePost() {
		$id = $this->input->data->id;
		$where = array( 'id' => $id );
		$data = array();
		foreach ($this->input->data as $key => $value) {
			$data[$key] = $value;
		}
		return $this->model->update(
			$data,
			$where
		);
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
		$this->input = $input;
	}
}