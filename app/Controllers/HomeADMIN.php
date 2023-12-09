<?php

namespace App\Controllers;

class HomeADMIN extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'admin') {
            return redirect()->to('/login');
        }

        return view('headerADMIN') . view('contentADMIN') . view('footer');
    }
}
