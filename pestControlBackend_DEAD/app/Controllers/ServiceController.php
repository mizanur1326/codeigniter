<?php

namespace App\Controllers;

use App\Filters\Cors;
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
   
    public function store(){
        //return $this->request->getVar('description');
        $data = [
            'serviceName' => $this->request->getVar('service'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'image' => $this->request->getFile('image')->getName(),
        ];

         
        //  return print_r($data);

        $rules = [
            'service' => 'required|max_length[30]|min_length[3]',
            'description' => 'required|max_length[30]|min_length[3]',
            'price' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,102400]|ext_in[image,jpg,jpeg,png,webp]'
        ];

        if(! $this->validate($rules)){
            return view('services/create');
        }else{
            $img = $this->request->getFile('image');
            $img->move(WRITEPATH . 'uploads');
            $this->services->insert($data);
            $session = session();
            $session->setFlashdata('msg', 'Inserted Successfully');
            $this->response->redirect('/services');
        }       
    }

    public function edit($id){
        //echo $id;
        $data = $this->services->find($id);
        //print_r($data);
        return view('services/edit', $data);
    }

    public function update($id){
        // $this->products = new ProductModel(); 
        $data = [
            'serviceName' => $this->request->getVar('service'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            //'image' => $this->request->getFile('image')->getName(),        //////IMAGE PORE KORBO
        ];
        $this->services->update($id, $data);
        $this->response->redirect('/services');
        $session = session();
        $session->setFlashdata('msg', 'Update Successfully');
    }


    public function delete($id){
        //echo $id;
        $this->services->where('id', $id);
        $this->services->delete();
        //return redirect("services");
        $this->response->redirect('/services');
        $session = session();
        $session->setFlashdata('msg', 'Deleted Successfully');
    }

}
