<?php

namespace App\Controllers\FrontEnd;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use CodeIgniter\API\ResponseTrait;

class ServiceController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $model = new ServiceModel;
        $data = $model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new ServiceModel;
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id' . ' ' . $id);
        }
    }
}
