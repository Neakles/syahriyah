<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Helpers\PengaturanHelper;

use App\Traits\GlobalTrait;

class PengaturanController extends BaseController {
    use GlobalTrait;

    private $helper;
    private $id;
    public function __construct()
    {
        $this->helper   = new PengaturanHelper;
        $this->id       = 1;
    }

    public function index(){
        $helper = $this->helper->getPengaturan($this->id);
        $data["title"]      = "Pengaturan";
        $data["pengaturan"] = $helper["status"] ? $helper["data"] : [];
        return view("/admin/pengaturan", $data);
    }

    public function save(){
        $payload = [
            "harga_normal"  => $this->request->getPost("harga_normal"),
            "harga_khusus"  => $this->request->getPost("harga_khusus")
        ];
        $helper = $this->helper->save($payload, $this->id);
        return redirect()->to('/admin/tagihan');
    }
}