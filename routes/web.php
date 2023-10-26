<?php

use App\Models\Customer;
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
    $customers = Customer::all()->map(fn($user) => [
        'cid' => $user->id,
        'fname' => $user->fullname,
        'mobile' => $user->mobileNumber,
        'city' => $user->city,
        'active' => $user->active
    ]);

    return Inertia::render("Customers", [
        'breadcrumb' => [
            'Home',
            'Customers'
        ],
        'customers' => $customers
    ]);
});

Route::post("customer", function () {
    $attr = Request::validate([
        'fname' => 'required',
        'lname' => 'required',
        'mobile' => ['required', 'numeric'],
        'city' => 'required',
    ]);

    Customer::create($attr);

    //return redirect('customers');
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
