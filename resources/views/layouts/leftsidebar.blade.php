@php

use App\Models\Company;

$companyid = Auth::user()->company_id;

//$companydetails = Company::where('id',$companyid)->first();
//$companylogo = $companydetails->logo;
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar" style="height: 1720px;">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html">
            <img src="{{ asset('maincompanylogo/logo.png') }}" alt="" width="100%" height="auto">
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html">
            <img src="{{ asset('maincompanylogo/logo.png') }}" alt="" width="100%" height="auto">
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">

                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <!-- <span>{{ Auth::user()->company_id }}</span> -->
                        <span>{{ Auth::user()->usertype }}</span>
                    </div>
                </div>

            </div>
        </li>
        <!-- <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li> -->
        @if (Auth::user()->usertype == 'Admin')
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addnewuser"> New User </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addvehicle"> Register New Vehicle </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehiclelist"> Vehicle List </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cvpool"> CV Pool </a></li> -->

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle Booking</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/bookvehicle">Book Vehicle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewbooking"> Veiw My All Booking</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/bookinglistbyvehicle"> Booking list by vehicle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/calendar-view"> Calander </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Notifications</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/notifications"> My Notifications </a></li>

                </ul>
            </div>
        </li>



        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/newinvoice"> Create New Invoice </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewinvoices">View Pending Invoice</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewcompletedinvoice">View Completed Invoice</a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cancelinvoice">Cancel Invoice</a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">My Customer List</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/customer"> Register Customer </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/clientlists"> View My Customer List </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Expenses</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addexpenses"> Add Expenses </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewexpenses"> View Expenses </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/advancepayments">Advance Payment History </a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/historypayment"> Payment History </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/advancepayments">Advance Payment History </a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/salesreport"> Sales Report </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/pnl"> P&L Report </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/balancesheet"> Balance Sheet </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehiclemaintainreport"> Vehicle Maintain Report </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehicleearningreport"> Vehicle Earning Report </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Backlist</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/blacklist"> Add Backlist </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/findblacklist"> Find Blacklist </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/setting">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Setting</span>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/managevariable"> Manage Variable</a></li>
                </ul>
            </div>
        </li>
        
        @endif

        @if (Auth::user()->usertype == 'superAdmin')

        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addnewuser"> New User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewuserslist"> Users List </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addvehicle"> Register New Vehicle </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehiclelist"> Vehicle List </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cvpool"> CV Pool </a></li> -->

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle Booking</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/bookvehicle">Book Vehicle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewbooking"> Veiw My Booking</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Notifications</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/notifications"> My Notifications </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/newinvoice"> Create New Invoice </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewinvoices">View pending Invoice</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewcompletedinvoice">View completed Invoice</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">My Customer List</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/clientlists"> View My Customer List </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/historypayment"> Payment History </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="/setting">
                <span class="menu-icon">
                    <i class="mdi mdi-settings"></i>
                </span>
                <span class="menu-title">Setting</span>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/registercompany">Add Company </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/managevariable"> Manage Variable</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/regservicebaseads">Service Base Ads</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/addgloblevehicle">Add globle Vehicles</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/manageads">Manage Advertisments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/alladsadminmanage">All Advertisments AM</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/managecompany">Manage Company</a></li>
                </ul>
            </div>
        </li>



        @endif

        @if (Auth::user()->usertype == 'cashier')
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/vehiclelist"> Vehicle List </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cvpool"> CV Pool </a></li> -->

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle Booking</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/bookvehicle">Book Vehicle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewbooking"> Veiw My Booking</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/newinvoice"> Create New Invoice </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewinvoices">View pending Invoice</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">My Customer List</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/clientlists"> View My Customer List </a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/historypayment"> Payment History </a></li>
                </ul>
            </div>
        </li>
        @endif

        @if (Auth::user()->usertype == 'manager')
        <li class="nav-item menu-items">
            <a class="nav-link" href="/dashboard">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addnewuser"> New User </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addvehicle"> Register New Vehicle </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehiclelist"> Vehicle List </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cvpool"> CV Pool </a></li> -->

                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Vehicle Booking</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/bookvehicle">Book Vehicle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewbooking"> Veiw My All Booking</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/bookinglistbyvehicle"> Booking list by vehicle</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">Notifications</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/notifications"> My Notifications </a></li>

                </ul>
            </div>
        </li>



        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/newinvoice"> Create New Invoice </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewinvoices">View Pending Invoice</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewcompletedinvoice">View Completed Invoice</a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/cancelinvoice">Cancel Invoice</a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">My Customer List</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/customer"> Register Customer </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/clientlists"> View My Customer List </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Expenses</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addexpenses"> Add Expenses </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/viewexpenses"> View Expenses </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/advancepayments">Advance Payment History </a></li> -->
                </ul>
            </div>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/historypayment"> Payment History </a></li>
                    <!-- <li class="nav-item"> <a class="nav-link" href="/advancepayments">Advance Payment History </a></li> -->
                </ul>
            </div>
        </li>

        <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/salesreport"> Sales Report </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/pnl"> P&L Report </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/balancesheet"> Balance Sheet </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/vehiclemaintainreport"> Vehicle Maintain Report </a></li>
                </ul>
            </div>
        </li> -->

        <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Backlist</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/blacklist"> Add Backlist </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/findblacklist"> Find Blacklist </a></li>
                </ul>
            </div>
        </li>

        <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-table-large"></i>
                </span>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/managevariable"> Manage Variable</a></li>
                                   </ul>
            </div>
        </li> -->



        @endif

    </ul>
</nav>