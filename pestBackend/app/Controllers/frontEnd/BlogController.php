<?php

namespace App\Controllers\FrontEnd;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use CodeIgniter\API\ResponseTrait;

class BlogController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new BlogModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new BlogModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id' . ' ' . $id);
        }
    }
}
