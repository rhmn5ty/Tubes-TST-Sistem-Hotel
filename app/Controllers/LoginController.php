<?php
namespace App\Controllers;

use App\Models\Login;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function login_action()
    {
        $model = model(Login::class);
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $user = $model->getDataUsers($email, $password);
        if ($user) {
            session()->set('user_name', $user->name);
            session()->set('user_role', $user->role);
            session()->set('user_id', $user->user_id);

            if ($user->role == 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/home_customer');
            }
        } else {
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
