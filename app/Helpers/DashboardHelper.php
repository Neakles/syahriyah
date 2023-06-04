<?php
namespace App\Helpers;

class DashboardHelper {

    private $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();;
    }
    public function tunggakanSantri(){
        $sql ="SELECT * FROM `kamar_santri` limit 10";
        $query = $this->db->query($sql);
        $results = $query->getResult();
        return $results;
    }
}