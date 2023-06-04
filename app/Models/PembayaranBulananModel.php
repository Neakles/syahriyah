<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranBulananModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'm_pembayaran_bulanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nama", "bulan", "tahun"];

    // Validation
    protected $validationRules = [
        "nama"  => "required",
        "bulan" => "required",
        "tahun" => "required",
    ];
}
