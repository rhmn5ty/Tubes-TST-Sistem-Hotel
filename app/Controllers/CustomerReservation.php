<?php

namespace App\Controllers;

use App\Models\LocationInfo;
use App\Models\Reservation;

class CustomerReservation extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');
        $user_id = session()->get('user_id');

        if (empty($userName) || empty($userRole) || $userRole !== 'customer') {
            return redirect()->to('/login');
        }

        $model = model(Reservation::class);
        $data['reservation'] = $model->getUserReservation($user_id);

        return view('headerCUSTOMER') . view('reservationCUSTOMER', $data) . view('footer');
    }
}
