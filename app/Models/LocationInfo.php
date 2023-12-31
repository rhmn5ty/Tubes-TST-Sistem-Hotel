<?php
namespace App\Models;

use CodeIgniter\Model;

class LocationInfo extends Model
{
    protected $table = 'location';
    protected $allowedFields = ['city', 'description', 'price_per_night'];
    public function getLocationInfo($city = false)
    {
        if ($city == false) {
            return $this->findAll();
        }

        return $this->where(['city' => $city])->first();

    }
}
