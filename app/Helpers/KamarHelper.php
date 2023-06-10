<?php
namespace App\Helpers;

use App\Models\KamarModel;

use App\Traits\GlobalTrait;

use Throwable;

class KamarHelper {
    use GlobalTrait;

    private $db;
    private $model;
    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->model    = new KamarModel;
    }

    public function getAll(){
        try {
            $result = $this->model->orderBy("nama ASC, gender ASC")->findAll();
            return [
                "status"    => true,
                "data"      => $result
            ];
        } catch (Throwable $th) {
            $this->logError($th);
            return [
                "status"    => false,
                "message"   => "Terjadi kesalahan pada server",
                "dev"       => $th->getMessage() . " at line " . $th->getLine()
            ];
        }
    }
    
}