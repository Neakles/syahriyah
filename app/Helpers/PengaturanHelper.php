<?php
namespace App\Helpers;

use Throwable;

use App\Models\PengaturanModel;

use App\Traits\GlobalTrait;

use Config\Database;

class PengaturanHelper {
    use GlobalTrait;

    protected $db;
    private $model;
    public function __construct()
    {
        $this->db       = Database::connect();
        $this->model    = new PengaturanModel;
    }

    public function getPengaturan($id){
        $result = $this->model->find($id);
        try {
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

    public function save($payload, $id){
        try {
            $this->db->transBegin();
            $result = $this->model->update($id, $payload);
            $this->db->transCommit();
            return [
                "status"    => true,
                "data"      => $result
            ];
        } catch (Throwable $th) {
            $this->db->transRollback();
            $this->logError($th);
            return [
                "status"    => false,
                "message"   => "Terjadi kesalahan pada server",
                "dev"       => $th->getMessage() . " at line " . $th->getLine()
            ];
        }
    }
}