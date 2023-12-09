<?php

namespace App\Controllers;

use App\Models\LocationInfo;

class HomeCUSTOMER extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'customer') {
            return redirect()->to('/login');
        }

        $model = model(LocationInfo::class);
        $data['location'] = $model->getLocationInfo();

        return view('headerCUSTOMER') . view('contentCUSTOMER', $data) . view('footer');
    }
}
