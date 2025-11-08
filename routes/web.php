<?php

use Illuminate\Support\Facades\Route;



// Headless mode: web routes disabled. Use API routes in routes/api.php
Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Rentway API',
        'data' => ['version' => 'v1']
    ]);
});

// Helpful redirects for common paths (headless API lives under /api/v1)
Route::redirect('/vehicles', '/api/v1/vehicles');
Route::redirect('/vehicle/{vehical}', '/api/v1/vehicle/{vehical}');
Route::redirect('/services', '/api/v1/services');



