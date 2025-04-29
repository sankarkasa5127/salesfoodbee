<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Settings</title>
    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/custom-style.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar bg-yellow sidebar-dark accordion toggled" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img src="public/img/logo-icon.png" alt="logo">
                </div>
                <div class="sidebar-brand-text mx-1">foodbee.de</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="reservation.html">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Reservation</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="orders.html">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Orders</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider my-0">


             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item active">
                 <a class="nav-link" href="settings.html">
                     <i class="fas fa-fw fa-cog"></i>
                     <span>Settings</span>
                 </a>
             </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="public/img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="public/img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="public/img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="public/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-lg-12 px-0 px-sm-3">
                            <nav>
                                <div class="nav nav-tabs border-bottom-0 settings-tab" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link fx-6 font-weight-sbold active" id="nav-home-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                  <a class="nav-item nav-link fx-6 font-weight-sbold" id="nav-profile-tab" data-toggle="tab" href="#nav-time" role="tab" aria-controls="nav-time" aria-selected="false">Opening Timing</a>
                                  <a class="nav-item nav-link fx-6 font-weight-sbold" id="nav-contact-tab" data-toggle="tab" href="#nav-pickup" role="tab" aria-controls="nav-pickup" aria-selected="false">Pickup & Delivery Settings</a>
                                </div>
                            </nav>
                            <div class="tab-content bg-white shadow" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="hero">
                                                    <img class="img-fluid" src="public/img/banner.jpg">
                                                </div>
                                                <div class="banner-logo">
                                                    <img src="public/img/banner-logo.webp" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4 mb-5 pb-3 px-3">
                                            <div class="col">
                                                <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label">Enter</label>
                                                <input type="file" id="et_pb_contact_brand_file_request_0" class="file-upload">
                                            </div>
                                        </div>
                                        <div class="row mt-5 mb-3 px-3">
                                            <div class="col">
                                                <label for="phone" class="fx-6 text-black font-weight-sbold mb-0">Phone No.</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone no.">
                                            </div>
                                            <div class="col">
                                                <label for="whatsapp" class="fx-6 text-black font-weight-sbold mb-0">Whatsapp No.</label>
                                                <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp no.">
                                            </div>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <div class="col">
                                                <label for="minorder" class="fx-6 text-black font-weight-sbold mb-0">Minimum Order Value</label>
                                                <input type="text" name="minorder" class="form-control" placeholder="10">
                                            </div>
                                            <div class="col">
                                                <label for="mindelivery" class="fx-6 text-black font-weight-sbold mb-0">Minimum Delivery Time</label>
                                                <input type="text" name="mindelivery" class="form-control" placeholder="20">
                                            </div>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <div class="col">
                                                <label for="delcharge" class="fx-6 text-black font-weight-sbold mb-0">Delivery Charges</label>
                                                <input type="text" name="delcharge" class="form-control" placeholder="10.00">
                                            </div>
                                            <div class="col">
                                                <label for="picktime" class="fx-6 text-black font-weight-sbold mb-0">Pickup Time</label>
                                                <input type="text" name="picktime" class="form-control" placeholder="25">
                                            </div>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <div class="col">
                                                <label for="deldist" class="fx-6 text-black font-weight-sbold mb-0">Delivery Distance</label>
                                                <input type="text" name="deldist" class="form-control" placeholder="35.00">
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="row mb-3 px-3">
                                            <div class="col">
                                                <label for="address" class="fx-6 text-black font-weight-sbold mb-0">Address</label>
                                                <textarea name="address" id="address" class="form-control pac-target-input"  placeholder="Enter address"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-5 pb-4 px-3">
                                            <div class="col"><button type="submit" class="btn btn-danger fx-6 font-weight-sbold">Submit</button></div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane n-tab fade" id="nav-time" role="tabpanel" aria-labelledby="nav-time-tab">
                                    <div class="row px-3 pt-3 pb-2">
                                        <div class="col-md-3 col"></div>
                                        <div class="col-md-4 col"><h5 class="fx-2 text-black font-weight-sbold">Slot 1</h5></div>
                                        <div class="col-md-2 col"><h5 class="fx-2 text-black font-weight-sbold">Slot 2</h5></div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="mon" class="fx-6 text-black font-weight-sbold">Monday</label>
                                                <input type="hidden" name="mon" class="form-control" value="Monday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot1" class="form-control" value="01:00">
                                                </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time1" class="form-control" value="15:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot2" class="form-control" value="15:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot3" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount1">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount1" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="1" name="mark1"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Monday</span> <button type="button" class="btn btn-danger fx-6 font-weight-sbold" data-default-value="1">Set Default value</button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="tue" class="fx-6 text-black font-weight-sbold">Tuesday</label>
                                                <input type="hidden" name="tue" class="form-control" value="Tuesday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot4" class="form-control" value="01:01">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time2" class="form-control" value="18:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot5" class="form-control" value="18:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot6" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount2">
                                                <option value="1" selected="">Discount</option>
                                                <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount2" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="2" name="mark2"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Tuesday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="wed" class="fx-6 text-black font-weight-sbold">Wednesday</label>
                                                <input type="hidden" name="wed" class="form-control" value="Wednesday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot7" class="form-control" value="10:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time3" class="form-control" value="10:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot8" class="form-control" value="14:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot9" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount3">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount3" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="3" name="mark3"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Wednesday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="thurs" class="fx-6 text-black font-weight-sbold">Thursday</label>
                                                <input type="hidden" name="thurs" class="form-control" value="Thursday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot10" class="form-control" value="00:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time4" class="form-control" value="14:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot11" class="form-control" value="13:50">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot12" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount4">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount4" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="4" name="mark4"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Thursday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="fri" class="fx-6 text-black font-weight-sbold">Friday</label>
                                                <input type="hidden" name="fri" class="form-control" value="Friday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot13" class="form-control" value="00:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time5" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot14" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot15" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount5">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount5" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="5" name="mark5"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Friday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="sat" class="fx-6 text-black font-weight-sbold">Saturday</label>
                                                <input type="hidden" name="sat" class="form-control" value="Saturday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot16" class="form-control" value="00:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time6" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot17" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot18" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount6">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount6" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="6" name="mark6"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Saturday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <div class="row">
                                            <div class="col-md-1 col-12">
                                                <label for="sun" class="fx-6 text-black font-weight-sbold">Sunday</label>
                                                <input type="hidden" name="sun" class="form-control" value="Sunday">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot19" class="form-control" value="00:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="time7" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot20" class="form-control" value="12:00">
                                            </div>
                                            <div class="col-md-2 col">
                                                <input type="time" name="slot21" class="form-control" value="23:30">
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <select class="form-control" name="discount7">
                                                    <option value="1" selected="">Discount</option>
                                                    <option value="2">Flat</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 col d-none">
                                                <input name="discount7" class="form-control" placeholder="discount" value="15" type="text">
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <input type="checkbox" class="marked" data-id="7" name="mark7"> <span class="fx-6 text-black font-weight-sbold">Mark to show close on Sunday</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3">
                                        <label for="holidays" class="fx-6 text-black font-weight-sbold">Holidays</label>
                                        <div class="">
                                            <div class="holiday"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-dark ml-3 mb-3" type="button"><i class="fas fa-plus"></i></button>
                                    <div class="row mb-5 pb-4 px-3">
                                        <div class="col"><button type="submit" class="btn btn-danger fx-6 font-weight-sbold">Submit</button></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-pickup" role="tabpanel" aria-labelledby="nav-pickup-tab">
                                    <div class="row pt-3 px-3">
                                        <div class="col-md-2 col">
                                            <label for="vat" class="fx-6 text-black font-weight-sbold">Pickup discount</label>
                                        </div>
                                        <div class="col-md-1 col">
                                            <input type="checkbox" class="pickup_discount" name="pickup_discount" checked="">
                                            <!-- <button type="button" class="btn btn-toggle btn-toggle4" data-toggle="button" aria-pressed="false" autocomplete="off">
                                                <div class="handle"></div>
                                            </button> -->
                                        </div>
                                        <div class="col-md-4 input-icons">
                                            <div class="input-group">
                                                <input class="form-control left-border-none" id="icon" placeholder="" type="text" name="pickup_discount_value" value="10">
                                                 <i class="fa fa-percent fx-6 icon text-black pt-2 ml-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col">
                                            <span class="fx-6 text-black font-weight-sbold">Food:</span> <input type="checkbox" class="pickup_food" name="pickup_food" checked="">
                                        </div>
                                        <div class="col-md-1 col">
                                            <span class="fx-6 text-black font-weight-sbold">Drink:</span> <input type="checkbox" class="pickup_drink" name="pickup_drink">
                                        </div>
                                    </div>
                                    <div class="row pt-3 px-3">
                                        <div class="col-md-2 col">
                                            <label for="vat" class="fx-6 text-black font-weight-sbold">Delivery discount</label>
                                        </div>
                                        <div class="col-md-1 col">
                                            <input type="checkbox" class="delivery_discount" name="delivery_discount" checked="">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input class="form-control left-border-none" value="5" type="text" name="delivery_amount_value">
                                                <i class="fa fa-percent icon fx-6 icon text-black pt-2 ml-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col">
                                            <span class="fx-6 text-black font-weight-sbold">Food:</span> <input type="checkbox" class="delivery_food" name="delivery_food">
                                        </div>
                                        <div class="col-md-1 col">
                                            <span class="fx-6 text-black font-weight-sbold">Drink:</span> <input type="checkbox" class="delivery_drink" name="delivery_drink" checked="">
                                        </div>
                                    </div>
                                    <div class="row pt-3 px-3">
                                        <div class="col-md-2 col">
                                            <label for="vat" class="fx-6 text-black font-weight-sbold">Diny discount</label>
                                        </div>
                                        <div class="col-md-1 col">
                                            <input type="checkbox" class="table_discount" name="table_discount">
                                        </div>
                                        <div class="col-md-4 d-none">
                                            <div class="input-group">
                                                <input class="form-control left-border-none" value="" type="text" name="table_discount_value">
                                                <i class="fa fa-percent icon fx-6 icon text-black pt-2 ml-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col d-none">
                                            <span class="fx-6 text-black font-weight-sbold">Food:</span> <input type="checkbox" class="table_food" name="table_food">
                                        </div>
                                        <div class="col-md-1 col d-none">
                                            <span class="fx-6 text-black font-weight-sbold">Drink:</span> <input type="checkbox" class="table_drink" name="table_drink">
                                        </div>
                                    </div>
                                    <div class="form-group pt-3 px-3">
                                        <label for="pre" class="fx-6 text-black font-weight-sbold">Accept Pre Order</label>
                                        <input type="checkbox" name="accept_pre_order" checked="">
                                    </div>
                                    <div class="row pt-3 mb-5 pb-4 px-3">
                                        <div class="col"><button type="submit" class="btn btn-danger fx-6 font-weight-sbold">Submit</button></div>
                                    </div>
                                </div>
                            </div>
                              
                        </div>
                    </div>
                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- <a href="#menu-toggle" class="btn btn-warning settings-icon" id="menu-toggle"><i class="fas fa-fw fa-cog"></i></a> -->
            <!-- Sidebar -->
            <div class="menu-wrap">
                <nav class="menu">
                  <div class="icon-list">
                    <ul class="pl-1 pt-5 text-white">
                        <li class="border-bottom pb-3">
                            <h5 class="fx-6 text-black font-weight-sbold">Restaurant Status</h5>
                            <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
    
                        <li class="py-3 border-bottom">
                            <h5 class="fx-6 text-black font-weight-sbold">Pickup Status</h5>
                            <button type="button" class="btn btn-toggle btn-toggle1" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
    
                        <li class="py-3 border-bottom">
                            <h5 class="fx-6 text-black font-weight-sbold">Delivery Type</h5>
                            <h6 class="fx-6 text-black font-weight-sbold mb-0">Self</h6>
                            <button type="button" class="btn btn-toggle btn-toggle2" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Delivery</h6>
                            <button type="button" class="btn btn-toggle btn-toggle2" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
                        
                        <li class="py-3 border-bottom">
                            <h5 class="fx-6 text-black font-weight-sbold">Payment Type</h5>
                            <h6 class="fx-6 text-black font-weight-sbold mb-0">COD</h6>
                            <button type="button" class="btn btn-toggle btn-toggle3" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Paypal</h6>
                            <button type="button" class="btn btn-toggle btn-toggle2" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
                    </ul>
                  </div>
                  <button class="close-button btn btn-warning" id="close-button"><i class="fas fa-fw fa-cog"></i></button>
                </nav>
              </div>
              <button class="menu-button btn btn-warning" id="open-button"><i class="fas fa-fw fa-cog"></i></button>
            <!-- <div id="sidebar-wrapper">
                <ul class="sidebar-nav pt-5">
                    <li class="border-bottom pb-3">
                        <h5 class="fx-6 text-black font-weight-sbold">Restaurant Status</h5>
                        <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                    </li>

                    <li class="py-3 border-bottom">
                        <h5 class="fx-6 text-black font-weight-sbold">Pickup Status</h5>
                        <button type="button" class="btn btn-toggle btn-toggle1" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                    </li>

                    <li class="py-3 border-bottom">
                        <h5 class="fx-6 text-black font-weight-sbold">Delivery Type</h5>
                        <h6 class="fx-6 text-black font-weight-sbold mb-0">Self</h6>
                        <button type="button" class="btn btn-toggle btn-toggle2" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                        <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Delivery</h6>
                        <button type="button" class="btn btn-toggle btn-toggle2" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                    </li>
                    
                    <li class="py-3 border-bottom">
                        <h5 class="fx-6 text-black font-weight-sbold">Payment Type</h5>
                        <button type="button" class="btn btn-toggle btn-toggle3" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <div class="handle"></div>
                        </button>
                    </li>
                </ul>
            </div> -->
            <!-- /#sidebar-wrapper -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Foodbee Reservation System 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-labelledby="reserveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content outline-1">
            <div class="modal-body">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <div class="special-head">Specialization</div>
                <p class="text-center font-weight-light pt-4 text-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="modal-footer mx-auto border-0">
                <button type="button" class="btn btn-success">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="public/js/main.min.js"></script>

    <script>
        $(document).ready(function() {
$('input[type="file"]').on('click', function() {
    $(".file_names").html("");
  })
if ($('input[type="file"]')[0]) {
	var fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
	fileInput.ondragover = function() {
		this.className = "et_pb_contact_form_label changed";
		return false;
	}
	fileInput.ondragleave = function() {
		this.className = "et_pb_contact_form_label";
		return false;
	}
	fileInput.ondrop = function(e) {
		e.preventDefault();
		var fileNames = e.dataTransfer.files;
		for (var x = 0; x < fileNames.length; x++) {
			console.log(fileNames[x].name);
			$=jQuery.noConflict();
			$('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames[x].name +"</div>");
		}
	}
	$('#et_pb_contact_brand_file_request_0').change(function() {
		var fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
		$('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
		$('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
	});
	}
});

    </script>
    <script>
        (function($) {
        "use strict";
        var openBtn = $("#open-button"),
            colseBtn = $("#close-button"),
            menu = $(".menu-wrap");
        // Open menu when click on menu button
        openBtn.on("click", function() {
            menu.addClass("active");
        });
        // Close menu when click on Close button
        colseBtn.on("click", function() {
            menu.removeClass("active");
        });

        })(jQuery);
    </script>
    <!-- <script>
       $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });

    </script> -->
</body>
</html>