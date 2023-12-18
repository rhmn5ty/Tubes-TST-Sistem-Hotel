<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ApiAuth;
use App\Models\Reservation;

class ReportAPI extends ResourceController
{
    public function index()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // $model = model(ApiAuth::class);
        // $cek = $model->getReportAuthentication($email, $password);
        if ($email != 'admin@gmail.com' && $password != 'admin') {
            return ("Wrong Authentication!");
        } else {
            $model1 = model(Reservation::class);
            $temp = $model1->getReservationReport();
            $label = [];
            $data = [];
            foreach ($temp as $item) {
                $label[] = $item->city;
                $data[] = $item->total_room_night;
            }
            $data = ['status' => 200,
                'label' => $label,
                'data' => $data];
            return $this->respond($data, 200);
        }
    }

    public function top()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // $model = model(ApiAuth::class);
        // $cek = $model->getReportAuthentication($email, $password);
        if ($email == 'admin@gmail.com' && $password == 'admin') {
            return ("Wrong Authentication!");
        } else {
            $model1 = model(Reservation::class);
            $temp = $model1->getTopReservation();
            $label = [];
            $data = [];
            foreach ($temp as $item) {
                $label[] = $item->city;
                $data[] = $item->total_room_night;
            }
            $data = ['status' => 200,
                'city' => $label,
                'quantity' => $data];
            return $this->respond($data, 200);
        }
    }

}
