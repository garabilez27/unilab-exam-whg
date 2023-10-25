<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [LoginController::class, 'index']);

Route::get("/", function () {
    return Inertia::render("Home", [
        'breadcrumb' => [
            'Home'
        ]
    ]);
});

Route::get("customers", function () {
    return Inertia::render("Customers", [
        'breadcrumb' => [
            'Home',
            'Customers'
        ]
    ]);
});

Route::get("orders", function () {
    return Inertia::render("Orders", [
        'breadcrumb' => [
            'Home',
            'Orders'
        ]
    ]);
});

Route::get("items", function () {
    return Inertia::render("Items", [
        'breadcrumb' => [
            'Home',
            'Items'
        ]
    ]);
});

Route::get("skus", function () {
    return Inertia::render("SKUs", [
        'breadcrumb' => [
            'Home',
            'SKUs'
        ]
    ]);
});
