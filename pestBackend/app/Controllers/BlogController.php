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

    public function delete($id){
        //echo $id;
        $this->blogs->where('id', $id);
        $this->blogs->delete();
        //return redirect("blogs");
        $this->response->redirect('/blogs');
        $session = session();
        $session->setFlashdata('msg', 'Deleted Successfully');
    }


    public function create(){
        return view('blogs/create');
    }

    
    public function update($id){
        // $this->products = new ProductModel(); 
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
        ];
        $this->blogs->update($id, $data);
        $this->response->redirect('/blogs');
        $session = session();
        $session->setFlashdata('msg', 'Update Successfully');
    }

    public function store(){
        //return $this->request->getVar('description');
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
        ];

         
        //  return print_r($data);

        $rules = [
            'title' => 'required|max_length[100]|min_length[3]',
            'description' => 'required|max_length[1000]|min_length[3]',
            
        ];

        if(! $this->validate($rules)){
            return view('blogs/create');
        }else{
            $this->blogs->insert($data);
            $session = session();
            $session->setFlashdata('msg', 'Inserted Successfully');
            $this->response->redirect('/blogs');
        }       
    }

    public function edit($id){
        //echo $id;
        $data = $this->blogs->find($id);
        //print_r($data);
        return view('blogs/edit', $data);
    }



}
