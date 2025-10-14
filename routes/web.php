<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BacklisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingRequestController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeHasLeaveController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PnlController;
use App\Http\Controllers\PrintlayoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\VehicalController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialAuthController;


Auth::routes(['verify' => true]);  // This automatically adds routes for reset, registration, etc.
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

Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

// Advertiser login 
Route::get('/auth/googlead', [SocialAuthController::class, 'redirectToGoogle'])->name('google.loginadvertizer');
Route::get('/auth/google/callbackad', [SocialAuthController::class, 'handleGoogleCallbackAdvertizer']);


Route::get('/home', [FrontendController::class, 'mainPage'])->name('mainPage');
Route::get('/', [FrontendController::class, 'catViews'])->name('catViews');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('aboutPage');
Route::get('/vehicles', [FrontendController::class, 'vehiclePage'])->name('vehiclePage');
Route::get('/contactus', [FrontendController::class, 'contactPage'])->name('contactPage');
Route::get('/backend', function () {
    return view('index');
});

Route::get('/forgetcustomerpassword', [FrontendController::class, 'forgetCustomerPassword'])->name('forgetCustomerPassword');
Route::post('password/email', [AuthForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// cat view 
Route::get('/getrentwaysystem', [FrontendController::class, 'getRentwaySystem'])->name('getRentwaySystem');
Route::get('/getrides', [FrontendController::class, 'getRides'])->name('getRides');
Route::get('/rentyouvehicle', [FrontendController::class, 'rentWithUs'])->name('rentWithUs');
Route::get('/getjob', [FrontendController::class, 'getJob'])->name('getJob');

Route::get('/getvehicledetailsbyprovince', [FrontendController::class, 'getVehicleByProvince'])->name('getVehicleByProvince');
Route::get('/getvehicledetailsbydistric', [FrontendController::class, 'getVehicleByDitrict'])->name('getVehicleByDitrict');
Route::get('/getvehicledetailsbycity', [FrontendController::class, 'getVehicleByCity'])->name('getVehicleByCity');
Route::get('/getvehicledetailsbydaterange', [FrontendController::class, 'getVehicleByDateRange'])->name('getVehicleByDateRange');

Route::get('/bookingtrip', [FrontendController::class, 'bookingTrip'])->name('bookingTrip');
Route::get('/postadd', [FrontendController::class, 'postAdd'])->name('postAdd');
Route::get('/signupcustomers', [FrontendController::class, 'signupCustomer'])->name('signupCustomer');
Route::get('/signupadvertiser', [FrontendController::class, 'signupAdvertiser'])->name('signupAdvertiser');

Route::post('/postvehicleadvertisment', [AddController::class, 'saveAdd'])->name('saveAdd');
Route::get('/rentvehicleads', [FrontendController::class, 'rentVehicleads'])->name('rentVehicleads');
Route::get('/servicebaseads', [FrontendController::class, 'servicebaseAds'])->name('servicebaseAds');
Route::get('/findambulance', [FrontendController::class, 'findambulanceAds'])->name('findambulanceAds');
Route::get('/findbrakdownservice', [FrontendController::class, 'findBrakedownServiceAds'])->name('findBrakedownServiceAds');
Route::get('/findstarfftransport', [FrontendController::class, 'findstarfftransportAds'])->name('findstarfftransportAds');
Route::get('/schooltransport', [FrontendController::class, 'schooltransportAds'])->name('schooltransportAds');
// Route::get('/bookingtrips', [FrontendController::class, 'bookTrip'])->name('bookTrip'); 

Route::get('/get-districts/{province_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-cities/{district_id}', [LocationController::class, 'getCities']);


Route::post('/postserviceadvertisment', [AddController::class, 'saveServiceAdd'])->name('saveServiceAdd');
// backend posting 
Route::get('/regservicebaseads', [AddController::class, 'backendAddposting'])->name('backendAddposting');
Route::get('/myads', [AddController::class, 'myAds'])->name('myAds');
Route::get('/manageads', [AddController::class, 'manageAds'])->name('manageAds');
Route::get('/alladsadminmanage', [AddController::class, 'allAdsadminmanage'])->name('alladsAdminmanage');
Route::get('/deleteadvertisment', [AddController::class, 'deleteAds'])->name('deleteAds');
Route::get('/getadvertismentdetails', [AddController::class, 'addDetails'])->name('addDetails');

Route::get('/viewadvertisment', [AddController::class, 'viewAds'])->name('viewAds');
Route::post('/updatereview', [AddController::class, 'updateReview'])->name('updateReview');
Route::get('/allads', [AddController::class, 'allAds'])->name('allAds');

Route::get('/getadsbyprovince', [AddController::class, 'searchByProvince'])->name('searchByProvince');
Route::get('/getadsbydistric', [AddController::class, 'searchByDistric'])->name('searchByDistric');
Route::get('/getadsbycity', [AddController::class, 'searchByCity'])->name('searchByCity');
Route::get('/getadsbytype', [AddController::class, 'searchByType'])->name('searchByType');
Route::get('/getadsbyany', [AddController::class, 'searchByAny'])->name('searchByAny');

// school service 
Route::get('/getadsbyprovince_s_service', [AddController::class, 'searchByProvinceSchoolService'])->name('searchByProvinceSchoolService');
Route::get('/getadsbydistric_s_service', [AddController::class, 'searchByDistrichoolService'])->name('searchByDistrichoolService');
Route::get('/getadsbycity_s_service', [AddController::class, 'searchByCitySchoolService'])->name('searchByCitySchoolService');
Route::get('/getadsbyany_s_service', [AddController::class, 'searchByAnySchoolService'])->name('searchByAnySchoolService');

// brakedown service 
Route::get('/getadsbyprovince_brakedown', [AddController::class, 'searchByProvinceBrakedownService'])->name('searchByProvinceBrakedownService');
Route::get('/getadsbydistric_brakedown', [AddController::class, 'searchByDistricBrakedownService'])->name('searchByDistricBrakedownService');
Route::get('/getadsbycity_brakedown', [AddController::class, 'searchByCityBrakedownService'])->name('searchByCityBrakedownService');
Route::get('/getadsbyany_brakedown', [AddController::class, 'searchByAnyBrakedownService'])->name('searchByAnyBrakedownService');

// staff service 
Route::get('/getadsbyprovince_staff_service', [AddController::class, 'searchByProvinceStaffService'])->name('searchByProvinceStaffService');
Route::get('/getadsbydistric_staff_service', [AddController::class, 'searchByDistricStaffService'])->name('searchByDistricStaffService');
Route::get('/getadsbycity_staff_service', [AddController::class, 'searchByCityStaffService'])->name('searchByCityStaffService');
Route::get('/getadsbyany_staff_service', [AddController::class, 'searchByAnyStaffService'])->name('searchByAnyStaffService');

// ambulance service 
Route::get('/getadsbyprovince_ambulance_service', [AddController::class, 'searchByProvinceambulanceService'])->name('searchByProvinceambulanceService');
Route::get('/getadsbydistric_ambulance_service', [AddController::class, 'searchByDistricambulanceService'])->name('searchByDistricambulanceService');
Route::get('/getadsbycity_ambulance_service', [AddController::class, 'searchByCityambulanceService'])->name('searchByCityambulanceService');
Route::get('/getadsbyany_ambulance_service', [AddController::class, 'searchByAnyambulanceService'])->name('searchByAnyambulanceService');



Route::get('/viewadd/{id}/{slug}', [AddController::class, 'viewAdd'])->name('viewAdd');


Route::get('/fleetview/{id}', [FrontendController::class, 'fleetView'])->name('fleetView');
Route::get('/forvehicleowners', [FrontendController::class, 'forVehicleowners'])->name('forVehicleowners');
Route::post('/addbookingrequest', [BookingRequestController::class, 'addBookingRequest'])->name('addBookingRequest');
// Route::post('/customerlogin', [AuthController::class, 'customerLogin'])->name('customerLogin');

// Route::get('/dashboardfr', [AuthController::class, 'rederectDashbord'])
//     ->middleware('auth')
//     ->name('rederectDashbord');

// Show login form only if user is NOT authenticated
Route::middleware('guest')->group(function () {
    Route::get('/customerlogin', function () {
        return view('frontend.customerlogin');
    })->name('customerlogin');

    Route::post('/customerlogin', [AuthController::class, 'customerLogin'])->name('customerLogin');
});

Route::middleware('guest')->group(function () {
    Route::get('/advertizerlogin', function () {
        return view('frontend.advertiserlogin');
    })->name('advertizerlogin');

    Route::post('/advertizerlogin', [AuthController::class, 'advertizerLogin'])->name('advertizerLogin');
});

// Dashboard – accessible ONLY if user is authenticated
Route::middleware('auth')->group(function () {
    Route::get('/dashboardfr', [AuthController::class, 'rederectDashbord'])->name('rederectDashbord');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboardadvertizer', [AuthController::class, 'rederectadvertizerDashbord'])->name('rederectadvertizerDashbord');
});



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/customerlogin');
})->name('logout');

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Done';
});

Route::get('/dashboard', function () {
    if (!Auth::check() || Auth::user()->id == '') {
        return view('index');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registercompany', [CompanyController::class, 'regcompany']);
Route::post('/registercompany', [CompanyController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/candidates', [App\Http\Controllers\HomeController::class, 'regInterviewer'])->name('regInterviewer');
    Route::get('/setting', [App\Http\Controllers\HomeController::class, 'setting'])->name('setting');
    Route::get('/companysetting', [App\Http\Controllers\HomeController::class, 'comapnysetting'])->name('comapnysetting');
    Route::POST('/uploadcompanyaccountbalance', [App\Http\Controllers\HomeController::class, 'updateStartingAmount'])->name('updateStartingAmount');

    Route::POST('/updatedepositamount', [App\Http\Controllers\HomeController::class, 'updatedepositamount'])->name('updatedepositamount');
    Route::POST('/updatewithdrawamount', [App\Http\Controllers\HomeController::class, 'updatewithdrawamount'])->name('updatewithdrawamount');
    Route::POST('/updatedonations', [App\Http\Controllers\HomeController::class, 'updatedonations'])->name('updatedonations');

    Route::post('/registerbranch', [BranchController::class, 'register'])->name('register.branch');

    // department 



    // Candidates Details 


    // user privilages 
    Route::get('/createUserRoll', [App\Http\Controllers\PermitionController::class, 'createUserRoll']);




    Route::post('/registeruser', [CompanyController::class, 'useradd']);
    Route::post('/updatecompnydetails', [CompanyController::class, 'updateCompany']);
    Route::get('/setting/alignbill', [CompanyController::class, 'alignbill']);

    Route::post('/registercompanyforadvertizing', [CompanyController::class, 'registerforadvertising']);

    Route::get('/myaccount', [CompanyController::class, 'myAccount']);

    // end 
    // End 

    // Vehicle  
    Route::get('/addvehicle', [VehicalController::class, 'addvehicle'])->name('addvehicle');
    Route::POST('/savevehicleinitial', [VehicalController::class, 'savevehicle'])->name('savevehicle');
    Route::get('/vehicle/{id}', [VehicalController::class, 'veiwvehicle'])->name('veiwvehicle');
    Route::POST('/updatevehicleduration', [VehicalController::class, 'updatevehicleduration'])->name('updatevehicleduration');
    Route::POST('/updatevehiclerentel', [VehicalController::class, 'updatevehiclerentel'])->name('updatevehiclerentel');
    Route::POST('/updatevehiclephoto', [VehicalController::class, 'uploadphoto'])->name('uploadphoto');
    Route::POST('/updatevehicleaccessories', [VehicalController::class, 'vehicleAccessoriesupdate'])->name('vehicleAccessoriesupdate');
    Route::POST('/updatevehiclebasic', [VehicalController::class, 'updateBasciDetails'])->name('updateBasciDetails');
    // Route::get('/vehicledetails', [VehicalController::class, 'getVehicledetails'])->name('edit');


    Route::get('/vehiclelist', [VehicalController::class, 'viewvehiclelist'])->name('viewvehiclelist');
    Route::get('/vehicledetails/{id}', [VehicalController::class, 'viewvehiclefulldetails'])->name('viewvehiclefulldetails');
    Route::get('/getvehicledetails', [VehicalController::class, 'getVehicleDetails'])->name('getVehicleDetails');
    Route::get('/updatemeeter', [VehicalController::class, 'updatemeeter'])->name('updatemeeter');
    Route::get('/getrentaldetails', [VehicalController::class, 'rentalDetails'])->name('rentalDetails');
    Route::get('/getcardetail', [VehicalController::class, 'getCardetail'])->name('getCardetail');

    // Booking 
    Route::get('/bookvehicle', [BookingController::class, 'bookvehicle'])->name('bookvehicle');
    Route::post('/addbooking', [BookingController::class, 'addregister'])->name('addregister');
    Route::get('/booking/{id}', [BookingController::class, 'viewbooking'])->name('viewbooking');
    Route::get('/viewbooking', [BookingController::class, 'viewbookingdetails'])->name('viewbookingdetails');
    Route::get('/getbookingbydate', [BookingController::class, 'bookingBydate'])->name('bookingBydate');
    Route::get('/getbookingdetails', [BookingController::class, 'bookingDetails'])->name('bookingDetails');
    Route::get('/cancelbooking', [BookingController::class, 'cancelbooking'])->name('cancelbooking');
    Route::get('/ischeckcompletevehicle', [BookingController::class, 'ischeckvehicle'])->name('ischeckvehicle');
    Route::get('/booking/editbooking/{id}', [BookingController::class, 'editBooking'])->name('editBooking');
    Route::post('/updatebooking', [BookingController::class, 'updateBooking'])->name('updateBooking');

    Route::get('/getdetailsbooking', [BookingController::class, 'getbookingdetails'])->name('getbookingdetails');
    Route::get('/bookinglistbyvehicle', [BookingController::class, 'getbookingbyvehicle'])->name('getbookingbyvehicle');
    Route::get('/booking/vehicledetails/{id}', [BookingController::class, 'bookingbyvehicle'])->name('bookingbyvehicle');
    Route::get('/getbookingdetailforprint', [BookingController::class, 'getbookingforPrint'])->name('getbookingforPrint');

    Route::get('/calendar-view', [BookingController::class, 'calendarView']); // View with FullCalendar
    Route::get('/booking-calander', [BookingController::class, 'bookingCalander']); // JSON API

    // End 

    // Invoice 

    Route::get('/newinvoice', [InvoiceController::class, 'newinvoice'])->name('newinvoice');
    Route::post('/saveinvoice', [InvoiceController::class, 'saveinvoice'])->name('saveinvoice');
    Route::post('/advanceinvoice', [InvoiceController::class, 'saveadvanceinvoice'])->name('saveadvanceinvoice');
    Route::get('/viewinvoices', [InvoiceController::class, 'viewPendingInvoice'])->name('viewPendingInvoice');
    Route::get('/getpreinvoicedetails', [InvoiceController::class, 'getPreinvoiceDetails'])->name('getPreinvoiceDetails');
    Route::post('/saveinvoicefinal', [InvoiceController::class, 'completinvoicefinal'])->name('completinvoicefinal');
    Route::get('/viewcompletedinvoice', [InvoiceController::class, 'completedInvoice'])->name('completedInvoice');
    // Route::get('/cancelinvoice', [InvoiceController::class, 'cancelInvoice'])->name('cancelInvoice');  
    Route::get('/cancelinvoicesource', [InvoiceController::class, 'cancelInvoice'])->name('cancelInvoice');
    Route::get('/viewagreement/{id}', [InvoiceController::class, 'viewAgreement'])->name('viewAgreement');
    Route::get('/getinvoicedetail', [InvoiceController::class, 'viewinvoice'])->name('viewinvoice');
    Route::get('/viewinvoicereport/{id}', [InvoiceController::class, 'viewInvoiceReport'])->name('viewInvoiceReport');
    Route::get('/updateodometerafterdeliver', [InvoiceController::class, 'updateOdoMeter'])->name('updateOdoMeter');


    // End  0760735835 / chenukitoursandrent.com



    // Get My client Details 
    Route::get('/clientlists', [CustomerController::class, 'myclientlist'])->name('myclientlist');
    Route::get('/getcustomerdetails', [CustomerController::class, 'customerDetails'])->name('customerDetails');
    Route::get('/customer', [CustomerController::class, 'customer'])->name('customer');
    Route::post('/savecustomer', [CustomerController::class, 'register'])->name('register');
    Route::post('/registerwebcustomer', [CustomerController::class, 'registerWebsiteCustomers'])->name('registerWebsiteCustomers');
    Route::get('/customer/{id}', [CustomerController::class, 'profile'])->name('profile');
    Route::post('/updatecustomer', [CustomerController::class, 'update'])->name('update');
    Route::get('/viewaccount/{id}', [CustomerController::class, 'viewaccount'])->name('viewaccount');
    Route::post('/updatecustomeraccount', [CustomerController::class, 'updateaccount'])->name('updateaccount');
    // End 

    // Payments   
    Route::get('/historypayment', [PaymentController::class, 'viewpayhistory'])->name('viewpayhistory');
    // End 

    // Notification  
    Route::get('/removenotification', [NotificationController::class, 'removeNotification'])->name('removeNotification');
    Route::get('/notifications', [NotificationController::class, 'notification'])->name('notification');
    Route::get('/getnotificationdetails', [NotificationController::class, 'getnotificationdetails'])->name('getnotificationdetails');

    // End 

    // User 
    Route::get('/addnewuser', [WorkerController::class, 'regWorker'])->name('regWorker');
    Route::post('/addsubusers', [WorkerController::class, 'adsubuser'])->name('adsubuser');

    // End 

    // Reports  
    Route::get('/salesreport', [ReportController::class, 'salesreport'])->name('salesreport');
    Route::get('/genarateearningreport', [ReportController::class, 'genarateearningreport'])->name('genarateearningreport');
    Route::get('/vehiclemaintainreport', [ReportController::class, 'vehicleMaintainReport'])->name('vehicleMaintainReport');
    Route::get('/genaratevehiclemaintainreport', [ReportController::class, 'genVehicleMaintainReport'])->name('genVehicleMaintainReport');
    Route::get('/vehicleearningreport', [ReportController::class, 'vehicleEarningReport'])->name('vehicleEarningReport');
    Route::get('/genvehicleearningreport', [ReportController::class, 'genVehicleEarningReport'])->name('genVehicleEarningReport');
    // End   

    Route::get('/blacklist', [BacklisterController::class, 'blacklist'])->name('blacklist');
    Route::post('/saveblacklister', [BacklisterController::class, 'addblacklister'])->name('addblacklister');
    Route::get('/findblacklist', [BacklisterController::class, 'findblacklisterindex'])->name('findblacklisterindex');
    Route::get('/getblacklisterdetails', [BacklisterController::class, 'getblacklisterdetails'])->name('getblacklisterdetails');

    // Expenses 

    Route::get('/addexpenses', [ExpensesController::class, 'expenses'])->name('expenses');
    Route::post('/addexpenses', [ExpensesController::class, 'addExpenses'])->name('addExpenses');
    Route::get('/viewexpenses', [ExpensesController::class, 'viewExpenses'])->name('viewExpenses');
    Route::post('/expenses/filter', [ExpensesController::class, 'filterExpenses'])->name('filterExpenses');
    Route::get('/getexpencedetails', [ExpensesController::class, 'expenseDetail'])->name('expenseDetail');

    Route::get('/pnl', [PnlController::class, 'viewPnl'])->name('viewPnl');
    Route::post('/pnl/filter', [PnlController::class, 'filterPnl'])->name('filterPnl');
    Route::get('/balancesheet', [PnlController::class, 'viewBalanceSheet'])->name('viewBalanceSheet');
    Route::post('/balancesheet/filter', [PnlController::class, 'filterBalanceSheet'])->name('filterBalanceSheet');
    // End 

    Route::get('/managevariable', [SettingController::class, 'manVeriable'])->name('manVeriable');
    // agreement possition 
    Route::post('/saveagreementpossition', [CompanyController::class, 'alignAgreement'])->name('alignAgreement');
    Route::post('/savevariablevisibility', [SettingController::class, 'updateVariablevisibility'])->name('updateVariablevisibility');
    Route::post('/savevariablevalue', [SettingController::class, 'updateVariablevalue'])->name('updateVariablevalue');
    Route::post('/updatepossition', [SettingController::class, 'updatePossition'])->name('updatePossition');
    Route::post('/updatepossitionleft', [SettingController::class, 'updatePossitionLeft'])->name('updatePossitionLeft');

    // 2025.01.21 
    Route::post('/uploadagreement', [CompanyController::class, 'uploadAgreement'])->name('uploadAgreement');

    Route::get('/updatelicenexpdate', [VehicalController::class, 'licenUpdate'])->name('licenUpdate');
    Route::get('/updateinsurance', [VehicalController::class, 'insuranceUpdate'])->name('insuranceUpdate');

    Route::get('/updateavalibility', [VehicalController::class, 'updateAvailibility'])->name('updateAvailibility');



    Route::post('/addprintinglayout', [PrintlayoutController::class, 'setPrintLayout'])->name('setPrintLayout');
    Route::post('/uploadagreementsec', [PrintlayoutController::class, 'uploadAgreementpage'])->name('uploadAgreementpage');

    Route::get('/setting/agreementpage/{id}', [PrintlayoutController::class, 'arrangement'])->name('arrangement');

    Route::get('/managecompany', [CompanyController::class, 'companylist'])->name('companylist');
    Route::get('/viewcompanydetails/{id}', [CompanyController::class, 'viewCompany'])->name('viewCompany');

    Route::get('/resetcompanydata', [CompanyController::class, 'resetData'])->name('resetData');
    Route::get('/updatecompanystatus', [CompanyController::class, 'updateCompanyStatus'])->name('updateCompanyStatus');
});











require __DIR__ . '/auth.php';
