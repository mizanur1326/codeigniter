<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;



class ProductController extends BaseController
{

    private $products ;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->products = new ProductModel();
    }

    public function index()
    {
        $data['items'] = $this->products->findAll();
        $data['title'] = "This is my title";

        // print_r($data['products']);
        return view('products/index', $data);
    }

    public function create(){
        return view('products/create');
    }

    public function edit($id){
        //echo $id;
        $data = $this->products->find($id);
        print_r($data);
        return view('products/edit', $data);

    }

    public function update($id){
        //DO SELF
    }
    public function delete($id){
        //echo $id;
        $this->products->where('product_id', $id);
        $this->products->delete();
        //return redirect("products");
        $this->response->redirect('/products');
    }

    public function store(){
        // return $this->request->getVar('product');
        $data = [
            'product' => $this->request->getVar('product'),
            'category' => $this->request->getVar('category'),
            'model' => $this->request->getVar('model'),
            'price' => $this->request->getVar('price'),
            'sku' => $this->request->getVar('sku'),
        ];

        $rules = [
            'product' => 'required|max_length[30]|min_length[3]',
            'price' => 'required|numeric',
            'sku' => 'required|min_length[3]',
        ];

        if(! $this->validate($rules)){
            return view('products/create');
        }else{
            $this->products->insert($data);
            $session = session();
            $session->setFlashdata('msg', 'Inserted Successfully');
            $this->response->redirect('/products');
        }



    }
}
