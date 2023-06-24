<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\KamarHelper;
use App\Helpers\SantriHelper;

use App\Traits\GlobalTrait;

class SantriController extends BaseController
{
    use GlobalTrait;

    private $helper;
    private $kamarHelper;

    public function __construct()
    {
        $this->helper       = new SantriHelper;
        $this->kamarHelper  = new KamarHelper;
    }

    public function santri()
    {
        $result = $this->helper->getAll();
        $kamar  = $this->kamarHelper->getAll();

        $data["title"]      = "Data Santri";
        $data["listSantri"] = $result["status"] ? $result["data"]   : [];
        $data["kamar"]      = $kamar["status"]  ? $kamar["data"]    : [];

        return view("admin/data_santri", $data);
    }

    public function kamar()
    {
        $result = $this->kamarHelper->getAll();

        $data["title"]      = "Kamar Santri";
        $data["listKamar"]  = $result["status"] ? $this->kamarHelper->getAll()["data"] : [];

        return view("/admin/kamar", $data);
    }

    public function save()
    {
        $payload = $this->request->getPost();
        $helper = $this->helper->save($payload);
        return redirect()->to("/admin/santri");
    }

    public function update()
    {
        $payload = $this->request->getPost();
        $helper = $this->helper->update($payload, $payload["id"]);
        return redirect()->to("/admin/santri");
    }

    public function delete($id)
    {
        $helper = $this->helper->delete($id);
        return redirect()->to("/admin/santri");
    }

    public function detail($id)
    {
        $data["title"] = "Detail Santri";
        $data["user"] = $this->helper->detail($id)["data"];

        return view("admin/detail", $data);

        if (empty($data["user"])) {
            return redirect()->to("/admin/santri");
        }
    }
}
