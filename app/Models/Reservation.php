<?php
namespace App\Models;

use CodeIgniter\Model;

class Reservation extends Model
{
    protected $table = 'reservation';
    protected $allowedFields = ['user_id', 'location_id', 'total_rooms', 'check_in_date', 'total_nights', 'check_out_date', 'total_cost'];
    public function getUserReservation($user_id)
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT city, total_rooms, check_in_date, total_nights, check_out_date, total_cost 
                        FROM reservation r JOIN location l ON l.id = r.location_id 
                        WHERE user_id = "' . $user_id . '"';
        $query = $db->query($queryString);
        $result = $query->getResult();
        return ($result) ? $result : null;
    }

    public function getReservationReport()
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT city, SUM(total_rooms * total_nights) AS total_room_night
                        FROM reservation r JOIN location l ON l.id = r.location_id
                        GROUP BY city
                        ORDER BY l.id';
        $query = $db->query($queryString);
        $result = $query->getResult();
        return ($result) ? $result : null;
    }

    public function getTopReservation()
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT city, SUM(total_rooms * total_nights) AS total_room_night
                        FROM reservation r JOIN location l ON l.id = r.location_id
                        GROUP BY city
                        ORDER BY total_room_night DESC
                        LIMIT 1';
        $query = $db->query($queryString);
        $result = $query->getResult();
        return ($result) ? $result : null;
    }

}
