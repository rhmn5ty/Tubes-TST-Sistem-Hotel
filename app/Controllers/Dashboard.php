<?php

namespace App\Controllers;

use App\Models\Reservation;


class Dashboard extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'admin') {
            return redirect()->to('/login');
        }

        $model = model(Reservation::class);
        $data['reservation'] = $model->getReservationReport();

        return view('headerADMIN') . view('dashboard', $data) . view('footer');
    }
}
