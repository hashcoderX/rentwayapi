<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ForceJsonResponse;
use App\Http\Controllers\Api\V1\AuthController as ApiAuthController;
use App\Http\Controllers\Api\V1\VehicleController as ApiVehicleController;
use App\Http\Controllers\Api\V1\BookingController as ApiBookingController;
use App\Http\Controllers\Api\V1\AdvertiserController as ApiAdvertiserController;
use App\Http\Controllers\Api\V1\ServiceController as ApiServiceController;
use App\Http\Controllers\Api\V1\BlacklistController as ApiBlacklistController;
use App\Http\Controllers\Api\V1\AdController as ApiAdController;
use App\Http\Controllers\Api\V1\CustomerController as ApiCustomerController;
use App\Http\Controllers\Api\V1\CompanyController as ApiCompanyController;
use App\Http\Controllers\Api\V1\NotificationController as ApiNotificationController;
use App\Http\Controllers\Api\V1\PaymentController as ApiPaymentController;
use App\Http\Controllers\Api\V1\ExpenseController as ApiExpenseController;
use App\Http\Controllers\Api\V1\InvoiceController as ApiInvoiceController;
use App\Http\Controllers\Api\V1\ReportController as ApiReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Swagger UI route (only local/staging) - serve HTML without forced JSON
if (app()->environment(['local','staging'])) {
    Route::get('/docs', function() {
        return view('l5-swagger::index');
    })->name('swagger.docs')->withoutMiddleware([ForceJsonResponse::class]);
}

Route::prefix('v1')->group(function () {
    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('/login', [ApiAuthController::class, 'login'])->middleware('throttle:login');
        Route::post('/register', [ApiAuthController::class, 'register'])->middleware('throttle:login');
        Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);
        Route::middleware('auth:sanctum')->get('/me', [ApiAuthController::class, 'me']);
    });

    // Public: browse vehicles and services
    Route::get('/vehicles', [ApiVehicleController::class, 'index']);
    Route::get('/vehicle/{vehical}', [ApiVehicleController::class, 'show']); // implicit binding on Vehical id
    Route::get('/services', [ApiServiceController::class, 'index']);

    // Protected: management endpoints
    Route::middleware(['auth:sanctum','throttle:sensitive'])->group(function () {
        // Ads CRUD
        Route::get('/ads', [ApiAdController::class, 'index']);
    Route::post('/ads', [ApiAdController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/ads/{ad}', [ApiAdController::class, 'show']);
    Route::put('/ads/{ad}', [ApiAdController::class, 'update'])->middleware('userrole:admin|manager');
    Route::delete('/ads/{ad}', [ApiAdController::class, 'destroy'])->middleware('userrole:admin|manager');

        // Customers CRUD
        Route::get('/customers', [ApiCustomerController::class, 'index']);
    Route::post('/customers', [ApiCustomerController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/customers/{customer}', [ApiCustomerController::class, 'show']);
    Route::put('/customers/{customer}', [ApiCustomerController::class, 'update'])->middleware('userrole:admin|manager');
    Route::delete('/customers/{customer}', [ApiCustomerController::class, 'destroy'])->middleware('userrole:admin|manager');
        // Vehicles CRUD
    Route::post('/vehicles', [ApiVehicleController::class, 'store'])->middleware('userrole:admin|manager');
    Route::put('/vehicles/{vehical}', [ApiVehicleController::class, 'update'])->middleware('userrole:admin|manager');
    Route::delete('/vehicles/{vehical}', [ApiVehicleController::class, 'destroy'])->middleware('userrole:admin|manager');

        // Bookings CRUD
        Route::get('/bookings', [ApiBookingController::class, 'index']);
    Route::post('/bookings', [ApiBookingController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/bookings/{booking}', [ApiBookingController::class, 'show']);
    Route::put('/bookings/{booking}', [ApiBookingController::class, 'update'])->middleware('userrole:admin|manager');
    Route::delete('/bookings/{booking}', [ApiBookingController::class, 'destroy'])->middleware('userrole:admin|manager');

        // Advertisers CRUD (assuming Company)
        Route::get('/advertisers', [ApiAdvertiserController::class, 'index']);
        Route::post('/advertisers', [ApiAdvertiserController::class, 'store']);
        Route::get('/advertisers/{company}', [ApiAdvertiserController::class, 'show']);
        Route::put('/advertisers/{company}', [ApiAdvertiserController::class, 'update']);
        Route::delete('/advertisers/{company}', [ApiAdvertiserController::class, 'destroy']);

    // Companies CRUD (separate management endpoints)
    Route::get('/companies', [ApiCompanyController::class, 'index']);
    Route::post('/companies', [ApiCompanyController::class, 'store'])->middleware('userrole:admin');
    Route::get('/companies/{company}', [ApiCompanyController::class, 'show']);
    Route::put('/companies/{company}', [ApiCompanyController::class, 'update'])->middleware('userrole:admin');
    Route::delete('/companies/{company}', [ApiCompanyController::class, 'destroy'])->middleware('userrole:admin');

        // Services requests
    Route::post('/services/request', [ApiServiceController::class, 'requestService']);

        // Blacklist
    Route::get('/blacklist', [ApiBlacklistController::class, 'index']);
    Route::post('/blacklist', [ApiBlacklistController::class, 'store'])->middleware('userrole:admin');

        // Notifications
        Route::get('/notifications', [ApiNotificationController::class, 'index']);
        Route::get('/notifications/{notification}', [ApiNotificationController::class, 'show']);
        Route::delete('/notifications/{notification}', [ApiNotificationController::class, 'destroy']);

        // Payments
        Route::get('/payments', [ApiPaymentController::class, 'index']);
    Route::post('/payments', [ApiPaymentController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/payments/{payment}', [ApiPaymentController::class, 'show']);
    Route::delete('/payments/{payment}', [ApiPaymentController::class, 'destroy'])->middleware('userrole:admin|manager');

        // Expenses
        Route::get('/expenses', [ApiExpenseController::class, 'index']);
    Route::post('/expenses', [ApiExpenseController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/expenses/{expense}', [ApiExpenseController::class, 'show']);
    Route::put('/expenses/{expense}', [ApiExpenseController::class, 'update'])->middleware('userrole:admin|manager');
    Route::delete('/expenses/{expense}', [ApiExpenseController::class, 'destroy'])->middleware('userrole:admin|manager');

        // Invoices
        Route::get('/invoices', [ApiInvoiceController::class, 'index']);
    Route::post('/invoices', [ApiInvoiceController::class, 'store'])->middleware('userrole:admin|manager');
        Route::get('/invoices/{invoice}', [ApiInvoiceController::class, 'show']);

        // Reports
        Route::get('/reports/summary', [ApiReportController::class, 'summary']);
    });
});
