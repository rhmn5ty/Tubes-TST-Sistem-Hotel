<?php

namespace App\Controllers;

use App\Models\LocationInfo;
use App\Models\Reservation;
use App\Controllers\DateTime;

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

    public function detail($city)
    {
        session();
        $model = model(LocationInfo::class);
        $data = [
            'location' => $model->getLocationInfo($city),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['location'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Lokasi hotel di ' . $city . ' tidak ditemukan');
        }

        return view('headerCUSTOMER') . view('detailHotel', $data) . view('footer');
    }

    public function reserve($city)
    {
        $model = model(LocationInfo::class);
        $reservationModel = model(Reservation::class);

        if (
            !$this->validate([
                'startDate' => 'required',
                'endDate' => 'required'
            ])
        ) {
            $validation = \Config\Services::validation()->getErrors();
            return redirect()->to('/home_customer/' . $model->getLocationInfo($city)['city'])->withInput()->with('validation', $validation);
        }


        $check_in_date = $this->request->getVar('startDate');
        $check_out_date = $this->request->getVar('endDate');

        // Convert date strings to DateTime objects
        $start_date = new \DateTime($check_in_date);
        $end_date = new \DateTime($check_out_date);

        // Calculate the duration in days
        $duration = $start_date->diff($end_date)->days;

        $total_rooms = $this->request->getVar('roomAmount');

        $room_cost = $model->getLocationInfo($city)['price_per_night'];
        $total_cost = $room_cost * $duration * $total_rooms;

        $reservationModel->save([
            'user_id' => session()->get('user_id'),
            'location_id' => $model->getLocationInfo($city)['location_id'],
            'total_rooms' => $total_rooms,
            'check_in_date' => $check_in_date,
            'total_nights' => $duration,
            'check_out_date' => $check_out_date,
            'total_cost' => $total_cost
        ]);

        session()->setFlashdata('pesan', 'Thankyou, you just successfully made a reservation!');
        return redirect()->to('/home_customer');
    }
}
