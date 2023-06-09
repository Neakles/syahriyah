<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Helpers\PengaturanHelper;

use App\Traits\GlobalTrait;

class PengaturanController extends BaseController {
    use GlobalTrait;

    private $helper;
    public function __construct()
    {
        $this->helper       = new PengaturanHelper;
    }

    public function index(){
        $data["title"] = "Pengaturan";
        return view("/admin/pengaturan", $data);
    }
}