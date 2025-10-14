<?php

namespace App\Http\Controllers;

use App\Models\Backlister;
use App\Models\Cashflote;
use App\Models\City;
use App\Models\Customer;
use App\Models\CustomerAccount;
use App\Models\District;
use App\Models\Invoice;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

   public function customer()
   {
      if (!Auth::check() || Auth::user()->id == '') {
         return view('index');
      } else {
         $userid = Auth::user()->id;
         $companyid = Auth::user()->company_id;

         $customers = Customer::where('company_id', $companyid)->get();
         return view('clientlist.addcustomer', compact('customers'));
      }
   }

   public function myclientlist()
   {
      if (!Auth::check() || Auth::user()->id == '') {
         return view('index');
      } else {
         $date = Carbon::now()->format('Y-m-d');
         $userid = Auth::user()->id;
         $companyid = Auth::user()->company_id;

         $customers = Customer::where('company_id', $companyid)->paginate(15);

         return view('clientlist.myclientlist', compact('customers'));
      }
   }

   public function register(Request $request)
   {
      $rules = [
         'customername' => 'required|string|max:400',
         'telephone_number' => 'required|string|max:10',
         'customerphoto' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048', // Max size 2MB
         'drivinglicensephoto' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048', // Max size 2MB
         'livingverification' => 'nullable|file|mimes:jpg,jpeg,png,gif|max:2048', // Max size 2MB
      ];

      $request->validate($rules);

      $userid = Auth::user()->id;
      $companyid = Auth::user()->company_id;
      $date = Carbon::now()->format('Y-m-d');

      $customername = $request->customername;
      $nicc = $request->nic;
      $paddress = $request->p_address;
      $taddress = $request->t_address;
      $telephone_number = $request->telephone_number;
      $telephone_number_two = $request->telephone_number_two;
      $telephone_number_three = $request->telephone_number_three;
      $telephone_number_four = $request->telephone_number_four;

      if ($nicc == '') {
         $nic = $telephone_number;
      } else {
         $nic = $nicc;
      }

      $customer = Customer::where('nic', $nic)->where('company_id', $companyid)->first();

      if ($customer) {
         return redirect()->back()->with('message', 'The Customer is already registered!');
      } else {

         $uploadPath = "uploads/";

         // Initialize file path variables to empty strings
         $customerfilepath = '';
         $drivinglicenfilepath = '';
         $verificationfilepath = '';

         if ($request->hasFile('customerphoto')) {
            $file = $request->file('customerphoto');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();

            // Allow certain file formats
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($fileType, $allowTypes)) {
               $customercompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
               if ($customercompressedImage) {
                  $customerfilepath = $customercompressedImage;
               } else {
                  $statusMsg = "Image compression failed!";
               }
            } else {
               $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
         }

         if ($request->hasFile('drivinglicensephoto')) {
            $file = $request->file('drivinglicensephoto');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();

            // Allow certain file formats
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($fileType, $allowTypes)) {
               $drivinglicencompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
               if ($drivinglicencompressedImage) {
                  $drivinglicenfilepath = $drivinglicencompressedImage;
               } else {
                  $statusMsg = "Image compression failed!";
               }
            } else {
               $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
         }

         if ($request->hasFile('livingverification')) {
            $file = $request->file('livingverification');
            $fileName = $file->getClientOriginalName();
            $imageUploadPath = $uploadPath . uniqid() . '.' . $file->getClientOriginalExtension();
            $fileType = $file->getClientOriginalExtension();

            // Allow certain file formats
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($fileType, $allowTypes)) {
               $livingverificationcompressedImage = $this->compressImage($file->getRealPath(), $imageUploadPath, 75);
               if ($livingverificationcompressedImage) {
                  $verificationfilepath = $livingverificationcompressedImage;
               } else {
                  $statusMsg = "Image compression failed!";
               }
            } else {
               $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
         }

         // Create a new customer
         $customer = new Customer();
         $customer->user_id = $userid;
         $customer->company_id = $companyid;
         $customer->full_name = $customername;
         $customer->reg_date = $date;
         $customer->nic = $nic;
         $customer->p_address = $paddress;
         $customer->t_address = $taddress;
         $customer->telephone_no = $telephone_number;
         $customer->telephone_number_two = $telephone_number_two;
         $customer->telephone_number_three = $telephone_number_three;
         $customer->telephone_number_four = $telephone_number_four;
         $customer->driving_licen_photo = $drivinglicenfilepath;
         $customer->livingvarification = $verificationfilepath;
         $customer->customer_photo = $customerfilepath;

         $customer->save();

         $customerid = $customer->id;

         // Create a new customer account
         $customerAccount = new CustomerAccount();
         $customerAccount->company_id = $companyid;
         $customerAccount->user_id = $userid;
         $customerAccount->customer_id = $customerid;
         $customerAccount->accountbalance = 0;

         $customerAccount->save();

         return redirect()->back();
      }
   }

   public function registerWebsiteCustomers(Request $request)
   {

      $customername = $request->customername;
      $address = $request->address;
      $province = $request->province;
      $district = $request->district;
      $city = $request->city;
      $telephone_number = $request->telephone_number;
      $c_email = $request->c_email;
      $c_password = $request->c_password;
      $paddress = $request->p_address;
      $taddress = $request->t_address;
      $telephone_number_two = $request->telephone_number_two;
      $telephone_number_three = $request->telephone_number_three;
      $telephone_number_four = $request->telephone_number_four;
      $nic = $request->nic;

      if (empty($c_email)) {
         $c_email = $telephone_number . "@gmail.com";
      }

      // get province details 
      $provinceId = $request->input('province');
      $province = Province::where('id', $provinceId)->first();
      $provinseName = $province->name_en;

      // get distric details 
      $districtId = $request->input('district');
      $district = District::where('id', $districtId)->first();
      $districtName = $district->name_en;

      // get city details 
      $cityId = $request->input('city');
      $city = City::where('id', $cityId)->first();
      $citytName = $city->name_en;

      $companyid = 0;
      $date = Carbon::now()->format('Y-m-d');


      $customer = Customer::where('nic', $nic)->where('company_id', $companyid)->first();

      if ($customer) {
         return redirect()->back()->with('message', 'The Customer is already registered!');
      } else {
         // Create a new customer

         $user = new User();
         $user->name = $customername;
         $user->email = $c_email;
         $user->usertype = 'customer';
         $user->password =  Hash::make($c_password);
         $user->company_id = 0;

         $user->save();

         $userid = $user->id;

         $customer = new Customer();
         $customer->user_id = $userid;
         $customer->company_id = $companyid;
         $customer->full_name = $customername;
         $customer->reg_date = $date;
         $customer->nic = $nic;
         $customer->p_address = $paddress;
         $customer->t_address = $taddress;
         $customer->telephone_no = $telephone_number;
         $customer->telephone_number_two = $telephone_number_two;
         $customer->telephone_number_three = $telephone_number_three;
         $customer->telephone_number_four = $telephone_number_four;
         $customer->province = $provinseName;
         $customer->distric = $districtName;
         $customer->city = $citytName;

         $customer->save();

         $customerid = $customer->id;

         // Create a new customer account
         $customerAccount = new CustomerAccount();
         $customerAccount->company_id = $companyid;
         $customerAccount->user_id = $userid;
         $customerAccount->customer_id = $customerid;
         $customerAccount->accountbalance = 0;

         $customerAccount->save();

         return response()->json([
            "status" => 200,
            "message" => 'Registration Compleated'
         ]);
      }
   }

   function profile(Request $request)
   {

      if (!Auth::check() || Auth::user()->id == '') {
         return view('index');
      } else {
         $customerId  = $request->id;

         $invoices = Invoice::where('customer_id', $customerId)->orderBy('created_at', 'asc')->paginate(10);;
         $customer = Customer::where('id', $customerId)->first();
         return view('clientlist.customerprofile', compact('customer', 'invoices'));
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

   public function customerDetails(Request $request)
   {
      if (!Auth::check()) {
         return view('index');
      }

      $nic = $request->nic;
      $companyId = Auth::user()->company_id;

      // Check if the customer is blacklisted
      $isBlacklisted = Backlister::where('nic', $nic)->first();

      if ($isBlacklisted) {
         return response()->json([
            'customer' => null,
            'message' => 'He is a Blacklisted Person.'
         ], 200);
      }

      // Fetch customer details
      $customer = Customer::where('nic', $nic)
         ->where('company_id', $companyId)
         ->first();

      if ($customer) {
         return response()->json([
            'customer' => $customer,
            'message' => 'No Bad History.'
         ], 200);
      }

      return response()->json([
         'error' => 'Customer not found'
      ], 404);
   }


   public function update(Request $request)
   {
      $userid = Auth::user()->id;
      $companyid = Auth::user()->company_id;
      $date = Carbon::now()->format('Y-m-d');

      // Validate request
      $request->validate([
         'customerphoto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
         'drivinglicensephoto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
         'livingverification' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
      ]);

      // Retrieve customer record
      $customer = Customer::where('telephone_no', $request->telephone)->where('company_id', $companyid)->first();

      if (!$customer) {
         return response()->json(['message' => 'Customer not found!'], 404);
      }

      // Store updated data
      $updatedData = [
         'full_name' => $request->fullname,
         'nic' => $request->nic,
         'p_address' => $request->permanentaddress,
         't_address' => $request->temporaryaddress,
         'telephone_no' => $request->telephone,
         'telephone_number_two' => $request->telephone_number_two,
         'telephone_number_three' => $request->telephone_number_three,
         'telephone_number_four' => $request->telephone_number_four,
      ];

      // Handle file uploads
      $uploadedImages = [];
      $fields = [
         'customerphoto' => 'customer_photo',
         'drivinglicensephoto' => 'driving_licen_photo',
         'livingverification' => 'livingvarification'
      ];

      foreach ($fields as $inputField => $dbColumn) {
         if ($request->hasFile($inputField)) {
            // Delete old file if exists
            if (!empty($customer->$dbColumn)) {
               $oldFilePath = public_path('uploads/' . basename($customer->$dbColumn));
               if (file_exists($oldFilePath)) {
                  unlink($oldFilePath);
               }
            }

            // Upload new file
            $image = $request->file($inputField);
            $imageName = time() . '_' . $inputField . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            // Store new file path in the database
            $updatedData[$dbColumn] = asset('uploads/' . $imageName);
            $uploadedImages[$dbColumn] = asset('uploads/' . $imageName);
         }
      }

      // Update customer details
      $customer->update($updatedData);

      return response()->json([
         'message' => 'Customer updated successfully!',
         'uploaded_images' => $uploadedImages
      ]);
   }


   public function viewaccount(Request $request)
   {

      if (!Auth::check() || Auth::user()->id == '') {
         return view('index');
      } else {
         $customerid =  $request->id;
         $customer = Customer::where('id', $customerid)->first();
         $customerAccount = CustomerAccount::where('customer_id', $customerid)->first();
         $transactionhistorys = Cashflote::where('customer_id', $customerid)->get();
         return view('clientlist.customeraccount', compact('customer', 'customerAccount', 'transactionhistorys'));
      }
   }

   public function updateaccount(Request $request)
   {

      if (!Auth::check() || Auth::user()->id == '') {
         return view('index');
      } else {

         $userid = Auth::user()->id;
         $companyid = Auth::user()->company_id;
         $date = Carbon::now()->format('Y-m-d H:i:s');



         $customerid = $request->customerid;
         $starttype = $request->starttype;
         $starting_amount = $request->starting_amount;

         $topic = 'Starting Balance';

         $customeraccount = CustomerAccount::where('customer_id', $customerid)->first();
         if ($starttype == 'credit') {
            $accountbalance  = $starting_amount;
            $crediamount =  $starting_amount;
            $debitamount = 0;
            $balance = $starting_amount;
         }
         if ($starttype == 'debit') {
            $accountbalance  = 0 - $starting_amount;
            $crediamount =  0;
            $debitamount = $starting_amount;
            $balance = 0 - $starting_amount;
         }

         $customeraccount->accountbalance = $accountbalance;
         $customeraccount->save();

         $cashflote = new cashflote();
         $cashflote->company_id = $companyid;
         $cashflote->user_id = $userid;
         $cashflote->customer_id = $customerid;
         $cashflote->accountbalance = $balance;
         $cashflote->date_time = $date;
         $cashflote->credit = $crediamount;
         $cashflote->debit = $debitamount;
         $cashflote->note = $topic;
         $cashflote->description = 'Customer account starting balance';

         $cashflote->save();

         return redirect()->back();
      }
   }
}
