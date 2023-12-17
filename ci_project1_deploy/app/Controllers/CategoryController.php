<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;



class CategoryController extends BaseController
{
    private $category;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->category->findAll();
        $data['title'] = "Category List";
        return view('category/index', $data);
    }


    public function create()
    {
        return view('category/create');
    }

    public function delete($id)
    {
        // echo $id;
        $this->category->where('id', $id);
        $this->category->delete();
        //return redirect("products");
        $this->response->redirect('/category');
        $session = session();
        $session->setFlashdata('msg', 'Category Deleted Successfully');

    }
}
