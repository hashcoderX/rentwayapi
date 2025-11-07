<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Billalignment;
use App\Models\Booking;
use App\Models\BookingRequest;
use App\Models\Cashflote;
use App\Models\City;
use App\Models\Company;
use App\Models\Companyaccount;
use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\District;
use App\Models\Expenses;
use App\Models\Garentor;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Pnl;
use App\Models\Printlayout;
use App\Models\Province;
use App\Models\User;
use App\Models\Vehical;
use App\Models\Vehicle_has_booking;
use App\Models\Vehicle_has_image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    //
    public function regcompany()
    {
        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $provinces = Province::all();
            $districts = District::all();
            $cities = City::all();
            return view('company.addcomany', compact('provinces', 'districts', 'cities'));
        }
    }

    public function register(Request $request)
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $company = new Company();
        $user = new User();
        // $controllinguser = new User();

        $uploadPath = "companylogo/";

        $companylogofilepath = '';
        $footerfilepath = '';
        $companyheaderfilepath = '';


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companylogofilepath = '';


            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companylogofilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $customercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($customercompressedImage) {
                        $companylogofilepath = $customercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('letterhead')) {
            $file = $request->file('letterhead');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companyheaderfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companyheaderfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $letterheadcompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($letterheadcompressedImage) {
                        $companyheaderfilepath = $letterheadcompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('footer')) {
            $file = $request->file('footer');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $footerfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $footerfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $footercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($footercompressedImage) {
                        $footerfilepath = $footercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        $company->name    = $request->companyname;
        $company->company_code    = $request->company_code;
        $company->reg_no = $request->regno;
        $company->address = $request->address;
        $company->owner_name = $request->ownername;
        $company->contact_no = $request->phone_number;
        $company->mobile_number = $request->mobile_number;
        $company->website = $request->website;
        $company->logo = $companylogofilepath;
        $company->description = '';
        $company->register_date = $today;
        $company->email = $request->email;
        $company->password = Hash::make($request->password);
        $company->payby = $request->payby;
        $company->header = $companyheaderfilepath;
        $company->footer = $footerfilepath;
        $company->currency = $request->currency;
        $company->located_province = $request->province;
        $company->distric = $request->district;
        $company->city = $request->city;

        $success = $company->save();

        if ($success) {
            $companyid = $company->id;
            $user->name = $request->companyname;
            $user->email  = $request->email;
            $user->usertype = 'Admin';
            $user->password = Hash::make($request->password);
            $user->company_id = $companyid;

            $user->save();

            // $controllinguser->name = $request->companyname;
            // $controllinguser->email = 'superadmin.softcodelk@gmail.com';
            // $controllinguser->usertype = 'Admin';
            // $controllinguser->password = Hash::make('XperiaX10@123');
            // $controllinguser->company_id = $companyid;

            // $controllinguser->save();

            // make controlling user 


            $companyAccount = new Companyaccount();
            $companyAccount->account_type = 'main';
            $companyAccount->amount = 0;
            $companyAccount->company_id = $companyid;

            $companyAccount->save();

            $companyAccount2 = new Companyaccount();
            $companyAccount2->account_type = 'advance_account';
            $companyAccount2->amount = 0;
            $companyAccount2->company_id = $companyid;

            $companyAccount2->save();
        }

        return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
        ]);
    }


    public function companylist()
    {
        $companys = Company::paginate(15);
        return view('company.companylist', compact('companys'));
    }

    public function viewCompany(Request $request)
    {
        $companyid = $request->id;
        $company = Company::where('id', $companyid)->first();
        $userlists = User::where('company_id', $companyid)->get();
        return view('company.companydetails', compact('company', 'userlists'));
    }

    public function registerforadvertising(Request $request)
    {
        $now = Carbon::now();
        $today = $now->toDateString();

        $company = new Company();
        $user = new User();

        $uploadPath = "companylogo/";

        $companylogofilepath = '';
        $footerfilepath = '';
        $companyheaderfilepath = '';


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companylogofilepath = '';


            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companylogofilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $customercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($customercompressedImage) {
                        $companylogofilepath = $customercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('letterhead')) {
            $file = $request->file('letterhead');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companyheaderfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companyheaderfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $letterheadcompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($letterheadcompressedImage) {
                        $companyheaderfilepath = $letterheadcompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('footer')) {
            $file = $request->file('footer');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $footerfilepath = '';

            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $footerfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $footercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($footercompressedImage) {
                        $footerfilepath = $footercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        // get province details 
        $provinceId = $request->province;
        $province = Province::where('id', $provinceId)->first();
        $provinseName = $province->name_en;

        // get distric details 
        $districtId = $request->district;
        $district = District::where('id', $districtId)->first();
        $districtName = $district->name_en;

        // get city details 
        $cityId = $request->city;
        $city = City::where('id', $cityId)->first();
        $citytName = $city->name_en;

        $company->name    = $request->companyname;
        $company->company_code    = $request->company_code;
        $company->reg_no = $request->regno;
        $company->address = $request->address;
        $company->owner_name = $request->ownername;
        $company->contact_no = $request->phone_number;
        $company->mobile_number = $request->mobile_number;
        $company->website = $request->website;
        $company->logo = $companylogofilepath;
        $company->description = '';
        $company->register_date = $today;
        $company->email = $request->email;
        $company->password = Hash::make($request->password);
        $company->payby = $request->payby;
        $company->header = $companyheaderfilepath;
        $company->footer = $footerfilepath;
        $company->currency = $request->currency;
        $company->located_province = $provinseName;
        $company->distric = $districtName;
        $company->city = $citytName;

        $success = $company->save();

        if ($success) {
            $companyid = $company->id;
            $user->name = $request->companyname;
            $user->email  = $request->email;
            $user->usertype = 'Advertiser';
            $user->password = Hash::make($request->password);
            $user->company_id = $companyid;

            $user->save();

            $companyAccount = new Companyaccount();
            $companyAccount->account_type = 'main';
            $companyAccount->amount = 0;
            $companyAccount->company_id = $companyid;

            $companyAccount->save();

            $companyAccount2 = new Companyaccount();
            $companyAccount2->account_type = 'advance_account';
            $companyAccount2->amount = 0;
            $companyAccount2->company_id = $companyid;

            $companyAccount2->save();
        }

        return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
        ]);
    }

    public function resetData(Request $request)
    {
        $companyid = $request->companyid;


        Booking::where('company_id', $companyid)->delete();

        Cashflote::where('company_id', $companyid)->delete();
        // customer 
        Customer::where('company_id', $companyid)->delete();
        // customer_accountss 
        CustomerAccount::where('company_id', $companyid)->delete();
        // expenses
        Expenses::where('company_id', $companyid)->delete();
        // garentors
        Garentor::where('company_id', $companyid)->delete();
        // invoices
        Invoice::where('company_id', $companyid)->delete();
        // notifications
        Notification::where('company_id', $companyid)->delete();
        // payments
        Payment::where('company_id', $companyid)->delete();

        // pnls
        Pnl::where('company_id', $companyid)->delete();
        // users
        User::where('company_id', $companyid)->delete();
        // vehicals
        Vehical::where('company_id', $companyid)->delete();
        // vehicle_has_bookings
        Vehicle_has_booking::where('company_id', $companyid)->delete();
        // vehicle_has_images
        Vehicle_has_image::where('company_id', $companyid)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'All data for company ID ' . $companyid . ' has been successfully reset.'
        ]);
    }

    public function updateCompanyStatus(Request $request)
    {
        $company_id = $request->companyid;
        $status = $request->status;

        $company = Company::where('id', $company_id)->first();
        $company->status = $status;

        $company->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update Company Status ' . $company_id . ' has been successfully Status.'
        ]);
    }

    public function updateCompany(Request $request)
    {

        $uploadPath = "companylogo/";

        $companyId = $request->companyid;
        $companyName = $request->companyname;
        $companyaddress = $request->companyaddress;
        $contactno = $request->contactno;
        $mobileno = $request->mobileno;
        $website = $request->website;
        $currency = $request->currency;

        $companylogofilepath = '';
        $footerfilepath = '';
        $companyheaderfilepath = '';

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companylogofilepath = '';
            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companylogofilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $logocompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($logocompressedImage) {
                        $companylogofilepath = $logocompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('header')) {
            $file = $request->file('header');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $companyheaderfilepath = '';
            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $companyheaderfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $headercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($headercompressedImage) {
                        $companyheaderfilepath = $headercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        if ($request->hasFile('footer')) {
            $file = $request->file('footer');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();
            $footerfilepath = '';
            // Allow certain file formats including SVG
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
            if (in_array($fileType, $allowTypes)) {
                if ($fileType === 'svg') {
                    // No compression for SVG, just move the file
                    $footerfilepath = $file->move($uploadPath, $imageUploadPath);
                    $status = 'success';
                    $statusMsg = "SVG file uploaded successfully.";
                } else {
                    // Compress non-SVG images
                    $footercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
                    if ($footercompressedImage) {
                        $footerfilepath = $footercompressedImage;
                        $status = 'success';
                        $statusMsg = "Image compressed successfully.";
                    } else {
                        $statusMsg = "Image compression failed!";
                    }
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, and SVG files are allowed to upload.';
            }
        }

        $company = Company::where('id', $companyId)->first();
        $logopath = $company->logo;
        $headerpath = $company->header;
        $footerpath = $company->footer;
        $agreementsideonepath = '';
        $agreementsidetwopath = '';

        if (!empty($logopath) && file_exists(public_path('companylogo/' . $logopath))) {
            unlink(public_path('companylogo/' . $logopath));
        }

        if (!empty($headerpath) && file_exists(public_path('companylogo/' . $headerpath))) {
            unlink(public_path('companylogo/' . $headerpath));
        }

        if (!empty($footerpath) && file_exists(public_path('companylogo/' . $footerpath))) {
            unlink(public_path('companylogo/' . $footerpath));
        }

        if ($company) {
            $company->name = $companyName;
            $company->address = $companyaddress;
            $company->contact_no = $contactno;
            $company->mobile_number = $mobileno;
            $company->website = $website;
            $company->logo = $companylogofilepath;
            $company->header = $companyheaderfilepath;
            $company->footer = $footerfilepath;
            $company->currency = $currency;

            $company->save();

            return view('setting.companysetting', compact('company'));
        }
    }

    function convert_filesize($bytes, $decimals = 2)
    {
        $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

    function compressImage($source, $destination, $quality)
    {
        // Get image info
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        // Create a new image from file
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                return false; // Unsupported image type
        }

        // Save image
        imagejpeg($image, $destination, $quality);

        // Free up memory
        imagedestroy($image);

        // Return compressed image
        return $destination;
    }

    public function useradd(Request $request)
    {
        $name = $request->name;
        $email = $request->email_user;
        $password = $request->userpassword;
        $userType = 'User';
        $companyid = Auth::user()->company_id;

        $user = new User();

        $user->name = $name;
        $user->email  = $email;
        $user->usertype = $userType;
        $user->password = Hash::make($password);
        $user->company_id = $companyid;

        $user->save();

        return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
        ]);
    }

    public function alignbill()
    {
        if (!Auth::check() || Auth::user()->id == '') {
            return view('index');
        } else {
            $companyid = Auth::user()->company_id;
            $company = Company::where('id', $companyid)->first();

            $agreementpages = Agreement::where('companyid', $companyid)->get();
            return view('setting.billalignment', compact('company', 'agreementpages'));
        }
    }

    public function alignAgreement(Request $request)
    {
        $companyid = Auth::user()->company_id;
        $userid = Auth::user()->id;

        $layoutsize = Printlayout::where('companyid', $companyid)->first();
        $pageheight = $layoutsize->pageheight;



        $positions = $request->all(); // This will retrieve the positions data

        // Process the data as needed, e.g., save to a database
        foreach ($positions as $elementid => $position) {


            $pagenumber = (int) $position['pagenumber']; // Ensure it's an integer
            $top = $position['top']; // Calculate top dynamically
            $left = $position['left'];

            // For debugging or previewing, you can print the values
            echo "Element ID: $elementid | Top: $top | Left: $left<br> | $pagenumber";

            $billelements = new Billalignment();

            if ($pagenumber == '1') {
                $billelements->user_id = $userid;
                $billelements->company_id  = $companyid;
                $billelements->elementid  = $elementid;
                $billelements->element_top_possition  = $top;
                $billelements->element_left_possition  = $left;
                $billelements->display  = 'block';
                $billelements->page_number  = $pagenumber;
                $billelements->value  = '';
                $billelements->save();
            }
            if ($pagenumber == '2') {
                $billelements->user_id = $userid;
                $billelements->company_id  = $companyid;
                $billelements->elementid  = $elementid;
                $billelements->element_top_possition  = $top + 1080;
                $billelements->element_left_possition  = $left;
                $billelements->display  = 'block';
                $billelements->page_number  = $pagenumber;
                $billelements->value  = '';
                $billelements->save();
            }
            if ($pagenumber == '3') {
                $billelements->user_id = $userid;
                $billelements->company_id  = $companyid;
                $billelements->elementid  = $elementid;
                $billelements->element_top_possition  = $top + 2160;
                $billelements->element_left_possition  = $left;
                $billelements->display  = 'block';
                $billelements->page_number  = $pagenumber;
                $billelements->value  = '';
                $billelements->save();
            }
            if ($pagenumber == '4') {
                $billelements->user_id = $userid;
                $billelements->company_id  = $companyid;
                $billelements->elementid  = $elementid;
                $billelements->element_top_possition  = $top + 3240;
                $billelements->element_left_possition  = $left;
                $billelements->display  = 'block';
                $billelements->page_number  = $pagenumber;
                $billelements->value  = '';
                $billelements->save();
            }
        }
        return response()->json(['message' => $positions]);
    }


    public function uploadAgreement(Request $request)
    {
        $request->validate([
            'pagenumber' => 'required|string|max:255',
            'agreementfile' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Max 4MB
            'printing' => 'string|max:255',
        ], [
            'pagenumber.required' => 'The Vehicle ID field is required.',
            'agreementfile.required' => 'Please select an image to upload.',
            'agreementfile.image' => 'The selected file must be an image.',
            'agreementfile.mimes' => 'Only JPG, JPEG, PNG, and GIF formats are allowed.',
            'agreementfile.max' => 'The image size must not exceed 4MB.',
        ]);

        $uploadPath = "companylogo/";
        $layoutsize = $request->printing;

        if ($layoutsize == 'letter') {
            $width  = '2550';
            $height = '3300';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'legal') {
            $width  = '2550';
            $height = '4200';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'tabloid') {
            $width  = '3300';
            $height = '5100';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'a4') {
            $width  = '2480';
            $height = '3508';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'a6') {
            $width  = '1240';
            $height = '1748';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'a5') {
            $width  = '1748';
            $height = '2480';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'a3') {
            $width  = '3508';
            $height = '4961';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'b5') {
            $width  = '2079';
            $height = '2953';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'b4') {
            $width  = '2508';
            $height = '3541';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'b3') {
            $width  = '3541';
            $height = '5008';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'c4') {
            $width  = '2291';
            $height = '3248';
            $dpi    = '300';
            $unit   = 'px';
        } elseif ($layoutsize == 'cs') {
            $width  = '2159';
            $height = '2794';
            $dpi    = '300';
            $unit   = 'px';
        } else {
            $width  = '0';
            $height = '0';
            $dpi    = '0';
            $unit   = 'px';
        }
    }

    public function myAccount()
    {
        return view('frontend.myaccount');
    }

    public function deleteAgreementPage($id, Request $request)
    {
        // Agreements are stored in Agreement model, not Printlayout. Ensure company ownership.
        $query = Agreement::where('id', $id);
        if (Auth::check()) {
            $query->where('companyid', Auth::user()->company_id);
        }

        $agreement = $query->first();

        if (!$agreement) {
            return $this->respondAfterAgreementDelete(false, 'Agreement page not found or inaccessible.', 404);
        }

        // Attempt to remove underlying file if it exists
        if (!empty($agreement->agreement_image)) {
            $filePath = public_path($agreement->agreement_image);
            if (is_file($filePath)) {
                @unlink($filePath); // Suppress errors; failure shouldn't block deletion
            }
        }

        $agreement->delete();
        return $this->respondAfterAgreementDelete(true, 'Agreement page deleted successfully.');
    }

    private function respondAfterAgreementDelete(bool $success, string $message, int $statusCode = 200)
    {
        $payload = ['success' => $success, 'message' => $message];
        if (request()->expectsJson() || request()->ajax()) {
            return response()->json($payload, $statusCode);
        }
        return redirect()->back()->with($success ? 'success' : 'error', $message);
    }
}
