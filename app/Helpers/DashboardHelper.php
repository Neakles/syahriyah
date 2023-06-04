<?php
namespace App\Helpers;

class DashboardHelper {

    private $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function tunggakanSantri(){
        $sql ="SELECT users.* FROM `spp_bulanan`
            LEFT JOIN `users` ON 'users.nis=spp_bulanan.nis'";
        $query = $this->db->query($sql);
        $results = $query->getResult();
        return $results;
    }
}