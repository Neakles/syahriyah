<?php
namespace App\Helpers;

use App\Models\SantriModel;
use App\Traits\GlobalTrait;

use Throwable;

class SantriHelper {
    use GlobalTrait;

    private $db;
    private $model;
    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->model    = new SantriModel();
    }

    public function getAll(){
        try {
            $result = $this->model->getSantri();
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

    public function detail($id){
        try {
            $result = $this->model->getSantri($id);
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