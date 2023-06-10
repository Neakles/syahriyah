<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'm_kamar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Validation
    protected $validationRules = [];
}
