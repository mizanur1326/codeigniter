<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceController extends BaseController
{
    private $services ;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->services = new ServiceModel();
    }

    public function index()
    {
        $data['items'] = $this->services->findAll();
        $data['title'] = "Service List";

        //print_r($data['items']);
        return view('services/index', $data);
    }

    public function create(){
        return view('services/create');
    }

    public function edit($id){
        //echo $id;
        $data = $this->services->find($id);
        //print_r($data);
        return view('services/edit', $data);
    }
    
    public function store(){
        // return $this->request->getVar('product');
        $data = [
            'serviceName' => $this->request->getVar('service'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'image' => $this->request->getFile('image')->getName(),
        ];

        // print_r($data);

        $rules = [
            'serviceName' => 'required|max_length[30]|min_length[3]',
            'description' => 'max_length[30]|min_length[3]',
            'price' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,102400]|ext_in[image,jpg,jpeg,png,webp]'
        ];

        if(! $this->validate($rules)){
            return view('services/create');
        }else{
            $img = $this->request->getFile('image');
            $img->move(WRITEPATH . 'uploads');
            $this->services->insert($data);
            // $session = session();
            // $session->setFlashdata('msg', 'Inserted Successfully');
            $this->response->redirect('/services');
        }

        if($data){
            $this->response->redirect('/services');
        } else {
            // $img = $this->request->getFile('image');
            // $img->move(WRITEPATH . 'uploads');
            $this->services->insert($data);
            $this->response->redirect('create');
        }


        
    }

}
