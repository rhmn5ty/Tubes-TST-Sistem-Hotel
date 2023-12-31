<?php

namespace App\Controllers;

use App\Models\LocationInfo;

class Hotel extends BaseController
{
    public function index()
    {
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'admin') {
            return redirect()->to('/login');
        }

        return view('headerADMIN') . view('addHotel') . view('footer');
    }

    public function add()
    {
        session();
        $userName = session()->get('user_name');
        $userRole = session()->get('user_role');

        if (empty($userName) || empty($userRole) || $userRole !== 'admin') {
            return redirect()->to('/login');
        }


        $model = model(LocationInfo::class);
        $data['location'] = $model->getLocationInfo();

        return view('headerADMIN') . view('addHotel', $data) . view('footer');
    }

    public function save()
    {
        $model = model(LocationInfo::class);

        // if (
        //     !$this->validate([
        //         'city' => 'required|is_unique[location.city]',
        //         'description' => 'required',
        //         'price_per_night' => 'required'
        //     ])
        // ) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/add')->withInput()->with('validation', $validation);
        // }

        $model->save([
            'city' => $this->request->getVar('city'),
            'description' => $this->request->getVar('description'),
            'price_per_night' => $this->request->getVar('price_per_night')
        ]);

        session()->setFlashdata('pesan', 'Thankyou, you just successfully made a reservation!');
        return redirect()->to('/add');
    }

    public function delete($id)
    {
        $model = model(LocationInfo::class);
        $model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/add');
    }

    public function edit($city)
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

        return view('headerADMIN') . view('editHotel', $data) . view('footer');
    }

    public function update($city)
    {
        $model = model(LocationInfo::class);

        // if (
        //     !$this->validate([
        //         'city' => 'required|is_unique[location.city]',
        //         'description' => 'required',
        //         'price_per_night' => 'required'
        //     ])
        // ) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/add')->withInput()->with('validation', $validation);
        // }

        $model->save([
            'id' => $model->getLocationInfo($city)['id'],
            'city' => $model->getLocationInfo($city)['city'],
            'description' => $this->request->getVar('description'),
            'price_per_night' => $this->request->getVar('price_per_night')
        ]);

        session()->setFlashdata('pesan', 'Thankyou, you just successfully edit a hotel details!');
        return redirect()->to('/add');
    }


}
