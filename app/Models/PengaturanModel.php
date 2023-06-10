<?php

namespace App\Models;

use CodeIgniter\Model;

use Config\Database;

class PengaturanModel extends Model
{
    // protected $DBGroup          = "default";
    protected $table            = "m_setting";
    protected $primaryKey       = "id";
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = "array";
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;

    // Validation
    protected $validationRules = [];

    protected $db;
}
