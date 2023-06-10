<?php

namespace App\Models;

use CodeIgniter\Model;

use Config\Database;

class SantriModel extends Model
{
    // protected $DBGroup          = "default";
    protected $table            = "m_users";
    protected $primaryKey       = "id";
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = "array";
    protected $useSoftDeletes   = true;
    protected $protectFields    = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = "datetime";
    protected $createdField  = "created_at";
    protected $updatedField  = "updated_at";
    protected $deletedField  = "deleted_at";

    // Validation
    protected $validationRules = [];

    public function getSantri($id = null){
        $arrSelect = [
            "mu.id",
            "mu.nis",
            "mu.fullname",
            "mu.no_telp",
            "mu.wali",
            "mu.no_wali",
            "mu.thn_masuk",
            "mu.user_image",
            "mu.username",
            "mu.email",
            "mu.kategori",
            "mu.gender",
            "mu.m_kamar_id",
            "mk.nama AS kamar_nama",
            "mk.gender AS kamar_jenis"
        ];
        $select = implode(", ", $arrSelect);
        $result = $this->db->table($this->table . " AS mu")
            ->select($select)
            ->join("m_kamar mk", "mu.m_kamar_id = mk.id");
        if($id != null)
            $result = $result->where("mu.id", $id);

        $result = $result->orderBy("fullname", "ASC")->get();
        if($id != null){
            $result = $result->getFirstRow();
        }else{
            $result = $result->getResult();
        }
        return $result;
    }
}
