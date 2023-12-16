<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ApiAuth;
use App\Models\Reservation;

class ReportAPI extends ResourceController
{
    public function index($seg1 = null, $seg2 = null)
    {

        $model = model(ApiAuth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getReportAuthentication($email, $password);
        if ($cek == 0) {
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

    public function top($seg1 = null, $seg2 = null)
    {

        $model = model(ApiAuth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getReportAuthentication($email, $password);
        if ($cek == 0) {
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
                'label' => $label,
                'data' => $data];
            return $this->respond($data, 200);
        }
    }

}
