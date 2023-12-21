<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class BlogController extends BaseController
{
    private $blogs ;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->blogs = new BlogModel();
    }
    public function index()
    {
        $data['items'] = $this->blogs->findAll();
        $data['title'] = "Blog Page";

        //print_r($data['items']);
        return view('blogs/index', $data);
    }
}
