<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;



class SigninController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('signin');
    }

    public function login()
    {
        $userModel = new UserModel();

        $session = session();
        $email = $this->request->getVar('email');
        $formPass = $this->request->getVar('password');

        //$formPass = password_hash($formPass, PASSWORD_DEFAULT);

        $data = $userModel->where('email', $email)->first();
        // echo "<pre>";
        // print_r($data);

        if ($data) {
            $dbpass = $data['password'];
            $verified = password_verify($formPass, $dbpass);
            // echo "Valid User";
            if ($verified) {
                //echo "<br>Password Verified";
                $userData = [
                    "name" => $data['name'],
                    "email" => $data['email'],
                    "isLoggedIn" => TRUE
                ];
                $session->set($userData);
                return redirect()->to('/');

            } else {
                $session->setFlashdata('msg', "Password is Incorrect");
                return view('/signin');
            }}else {
            $session->setFlashdata('msg', "Email is Incorrect");
            return view('/signin');
            // echo "Wrong Password";
        }


        // echo "<pre>";
        // print_r($data);


    }



    public function logout()
    {
        session()->destroy();
        return redirect()->to('signin');
    }

}
