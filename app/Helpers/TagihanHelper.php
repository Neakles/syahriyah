<?php
namespace App\Helpers;

use App\Models\PembayaranBulananModel;
use App\Traits\GlobalTrait;
use Throwable;

class TagihanHelper {

    use GlobalTrait;

    private $db;
    private $pembayaranBulanan;

    public function __construct()
    {
        $this->db                   = \Config\Database::connect();
        $this->pembayaranBulanan    = new PembayaranBulananModel;
    }
    public function getAll(){
        $result = $this->pembayaranBulanan->findAll();
        return $result;
    }
    public function insert($payload){
        try {
            $this->db->transBegin();
            $result = $this->pembayaranBulanan->insert($payload);
            $this->db->transCommit();
            return [
                "status"    => true,
                "data"      => $result
            ];
        } catch (Throwable $th) {
            $this->logError($th);
            $this->db->transRollback();
            return [
                "status"    => false,
                "message"   => "Terjadi kesalahan pada server",
                "dev"       => $th->getMessage() . " at line " . $th->getLine()
            ];
        }
    }
}