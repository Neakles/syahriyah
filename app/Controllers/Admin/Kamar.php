<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin;

use App\Helpers\KamarHelper;

use App\Traits\GlobalTrait;

class Kamar extends Admin
{
    use GlobalTrait;

    protected   $db;
    private     $kamarHelper;

    public function __construct()
    {
        $this->db           = \Config\Database::connect();
        $this->kamarHelper  = new KamarHelper;
    }

    public function index()
    {
        $data["title"]  = "Data Santri";
        $data["listKamar"]   = $this->kamarHelper->getAll();
        // $result         = $this->kamarHelper->getAll();
        // return view("/admin/index", $data);
    }
}
