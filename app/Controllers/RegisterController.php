<?php
namespace App\Controllers;

use App\Models\Login;

class RegisterController extends BaseController
{
    public function index(): string
    {
        return view('register');
    }

    public function register_action()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $username = $this->request->getPost('username');
        $confirm_password = md5($this->request->getPost('confirm_password'));
        $user = $model->isUserRegistered($email);
        if($user){
          session()->setFlashdata('pesan_failed', 'Email already registered');
          return redirect()->to('/register');
        }
        else{
          if($password == $confirm_password){
            $model->saveDataUsers($email, $password, $username);
            session()->setFlashdata('pesan', 'You just successfully made an account!');
            return redirect()->to('/login');
          }
          else{
            session()->setFlashdata('pesan_failed', 'Password doesnt match');
            return redirect()->to('/register');
          }
        }
    }
}