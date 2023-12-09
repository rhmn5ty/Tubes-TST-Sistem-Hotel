<?php

namespace App\Controllers;

class HomeCUSTOMER extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'customer') {
            return redirect()->to('/login');
        }

        return view('headerCUSTOMER') . view('contentCUSTOMER') . view('footer');
    }
}
