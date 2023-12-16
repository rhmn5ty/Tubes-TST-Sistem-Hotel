<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Reservation;

class ReportAPI extends ResourceController
{
    public function index($seg1 = null, $seg2 = null)
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'admin') {
            return redirect()->to('/login');
        }

        $model = model(Reservation::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getReportAuthentication($email, $password);
        if ($cek == 0) {
            return ("Wrong Authentication!");
        } else {
            $model1 = model(Reservation::class);
            $data = ['message' => 'success',
                'foodmart' => $model1->getReservationReport()];
            return $this->respond($data, 200);
        }
    }

}
