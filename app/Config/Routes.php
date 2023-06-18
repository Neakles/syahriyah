<?php

namespace Config;

use App\Controllers\Admin;

use App\Controllers\Admin\PengaturanController;
use App\Controllers\Admin\SantriController;

use App\Controllers\Pembayaran;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system"s routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . "Config/Routes.php")) {
    require SYSTEMPATH . "Config/Routes.php";
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace("App\Controllers");
$routes->setDefaultController("Home");
$routes->setDefaultMethod("index");
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don"t want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don"t have to scan directories.

// View index
$routes->get("/", "Home::index");

// Routes for User
$routes->get("/profile", "User::profile");
$routes->post("/profile/(:num)", "User::updateProfile/$1");
// $routes->get("/pembayaran", "User::pembayaran", ["filter" => "role:user"]);

// Routes for Admin
$routes->group("admin", function ($routes) {
    $routes->get("/",               [Admin::class, "index"],        ["filter" => "role:admin"]);
    $routes->get("index",           [Admin::class, "index"],        ["filter" => "role:admin"]);
    $routes->get("laporan",         [Admin::class, "laporan"],      ["filter" => "role:admin"]);

    $routes->get("santri/(:num)",   [Admin::class, "laporan_syahriah/$1"],  ["filter" => "role:admin"]);
    $routes->get("pembayaran",      [Pembayaran::class, "index"],           ["filter" => "role:admin"]);

    $routes->get(
        "spp_bulanan/(:num)/(:num)",
        [Pembayaran::class, "spp_bulanan/$1/$1"],
        [
            "filter" => "role:admin",
        ]);
    
    // Tagihan
    $routes->group("tagihan", function ($routes) {
        // Pengaturan
        $routes->group("pengaturan", function ($routes) {
            $routes->post("save",   [PengaturanController::class, "save"]);
            $routes->get("/",       [PengaturanController::class, "index"]);
        });

        $routes->get("/",   [Admin::class, "tagihan"],      ["filter" => "role:admin"]);
    });
        
    // Santri
    $routes->group("santri", function ($routes) {
        $routes->post("save",           [SantriController::class, "save"],      ["filter" => "role:admin"]);
        $routes->post("update",         [SantriController::class, "update"],    ["filter" => "role:admin"]);
        $routes->get("detail/(:num)",   [SantriController::class, "detail/$1"], ["filter" => "role:admin"]);
        $routes->get("kamar",           [SantriController::class, "kamar"],     ["filter" => "role:admin"]);
        $routes->get("/",               [SantriController::class, "santri"],    ["filter" => "role:admin"]);
    });
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . "Config/" . ENVIRONMENT . "/Routes.php")) {
    require APPPATH . "Config/" . ENVIRONMENT . "/Routes.php";
}
