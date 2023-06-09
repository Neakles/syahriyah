<?php
namespace App\Helpers;

use App\Models\KamarModel;

use App\Traits\GlobalTrait;

use Throwable;

class PengaturanHelper {
    use GlobalTrait;

    private $db;
    private $model;
    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->model    = new KamarModel;
    }

    public function index(){
    }
}