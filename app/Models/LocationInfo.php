<?php
namespace App\Models;

use CodeIgniter\Model;

class LocationInfo extends Model
{
    protected $table = 'location';
    public function getLocationInfo()
    {
        return $this->findAll();
    }
}
