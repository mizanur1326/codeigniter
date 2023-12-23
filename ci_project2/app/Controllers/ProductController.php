<?php

namespace App\Controllers;

// use App\Controllers\BaseController;

use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\HTTP\RequestInterface;


class ProductController extends ResourceController
{
    protected $Product;
    public function __construct()
    {
        $this->Product = new ProductModel();
    }

    public function index()
    {
        return $this->respond($this->Product->findAll());
    }

    // save new product info
    public function create() {
		// get posted JSON
		$json = json_decode(file_get_contents("php://input", true));
		// $json = $this->request->getJSON();
		
		$name = $json->name;
		$price = $json->price;
		$sale_price = $json->sale_price;
		$sales_count = $json->sales_count;
		$sale_date = $json->sale_date;
		
		$data = array(
			'name' => $name,
			'price' => $price,
			'sale_price' => $sale_price,
			'sales_count' => $sales_count,
			'sale_date' => $sale_date
		);
		
        $this->Product->insert($data);
		
        $response = array(
			'status'   => 201,
			'messages' => array(
				'success' => 'Product created successfully'
			)
		);
		
		return $this->respondCreated($response);
    }


}
