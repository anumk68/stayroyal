<!doctype html>
<html lang="en" class="minimal-theme">

<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Favicon -->
<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />

<!-- Plugin Stylesheets -->
<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

<!-- Bootstrap Core CSS -->
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/bootstrap-extended.css') }}" rel="stylesheet" />

<!-- Core Styles -->
<link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" />

<!-- Google Fonts and Icons -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<!-- Loader CSS -->
<link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />

<!-- Theme Styles -->
<link href="{{ asset('admin/assets/css/dark-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/light-theme.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/semi-dark.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/css/header-colors.css') }}" rel="stylesheet" />

<!-- Page Title -->
<title>{{ $metaTitle }}</title>

  <style>
  /* Reset some basics */
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f2f5;
    margin: 0;
    padding: 40px 20px;
    color: #333;
  }

  h2 {
    text-align: center;
    margin-bottom: 40px;
    font-weight: 700;
    font-size: 2rem;
    color: #222;
  }

  button#openPopupBtn {
    display: block;
    margin: 0 auto 40px auto;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 14px 28px;
    border-radius: 8px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button#openPopupBtn:hover {
    background-color: #0056b3;
  }

  /* Popup overlay */
  .popup-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: rgba(0,0,0,0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease forwards;
  }

  /* Popup content */
  .popup-content {
    background: #fff;
    border-radius: 12px;
    width: 380px;
    max-width: 90%;
    padding: 30px 28px 24px 28px;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    position: relative;
    animation: slideDown 0.3s ease forwards;
  }

  /* Close button */
  .close-btn {
    position: absolute;
    top: 14px;
    right: 18px;
    font-size: 26px;
    font-weight: 700;
    color: #999;
    cursor: pointer;
    transition: color 0.3s ease;
  }
  .close-btn:hover {
    color: #333;
  }

  h3 {
    margin-top: 0;
    margin-bottom: 24px;
    font-weight: 700;
    font-size: 1.5rem;
    color: #222;
    text-align: center;
  }

  form label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #555;
  }

  input[type="text"],
  input[type="number"],
  select {
    width: 100%;
    padding: 10px 14px;
    font-size: 1rem;
    border-radius: 6px;
    border: 1.8px solid #ccc;
    margin-bottom: 20px;
    transition: border-color 0.3s ease;
  }
  input[type="text"]:focus,
  input[type="number"]:focus,
  select:focus {
    border-color: #007bff;
    outline: none;
  }

  button[type="submit"] {
    width: 100%;
    background-color: #28a745;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    padding: 14px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button[type="submit"]:hover {
    background-color: #1e7e34;
  }

  /* Animations */
  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-25px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand">
          <div class="mobile-toggle-icon d-xl-none">
              <i class="bi bi-list"></i>
            </div>
            <div class="top-navbar d-none d-xl-block">
            

            </div>
             
            <div class="search-toggle-icon d-xl-none ms-auto">
              <i class="bi bi-search"></i>
            </div>
            <form class="searchbar d-none d-xl-flex ms-auto">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-3">
              <ul class="navbar-nav align-items-center">
              <li class="nav-item dropdown dropdown-large">
              
                <ul class="dropdown-menu dropdown-menu-end">
                
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="pages-user-profile.html">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                           <div class="setting-text ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                           <div class="setting-text ms-3"><span>Setting</span></div>
                         </div>
                       </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="index2.html">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                           <div class="setting-text ms-3"><span>Dashboard</span></div>
                         </div>
                       </a>
                    </li>
                   
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                         <div class="d-flex align-items-center">
                           <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                           <div class="setting-text ms-3"><span>Logout</span></div>
                         </div>
                       </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="projects">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                   <div class="row row-cols-3 gx-2">
                      <div class="col">
                        <a href="ecommerce-orders.html">
                         <div class="apps p-2 radius-10 text-center">
                            <div class="apps-icon-box mb-1 text-white bg-primary bg-gradient">
                              <i class="bi bi-cart-plus-fill"></i>
                            </div>
                            <p class="mb-0 apps-name">Orders</p>
                         </div>
                        </a>
                      </div>
                      <div class="col">
                        <a href="javascript:;">
                        <div class="apps p-2 radius-10 text-center">
                           <div class="apps-icon-box mb-1 text-white bg-danger bg-gradient">
                             <i class="bi bi-people-fill"></i>
                           </div>
                           <p class="mb-0 apps-name">Users</p>
                        </div>
                      </a>
                     </div>
                     <div class="col">
                      <a href="ecommerce-products-grid.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-success bg-gradient">
                          <i class="bi bi-bank2"></i>
                         </div>
                         <p class="mb-0 apps-name">Products</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="component-media-object.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-orange bg-gradient">
                          <i class="bi bi-collection-play-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Media</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="pages-user-profile.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-purple bg-gradient">
                          <i class="bi bi-person-circle"></i>
                         </div>
                         <p class="mb-0 apps-name">Account</p>
                       </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-dark bg-info bg-gradient">
                          <i class="bi bi-file-earmark-text-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Docs</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="ecommerce-orders-detail.html">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-pink bg-gradient">
                          <i class="bi bi-credit-card-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Payment</p>
                      </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-bronze bg-gradient">
                          <i class="bi bi-calendar-check-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Events</p>
                      </div>
                    </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-dark bg-warning bg-gradient">
                          <i class="bi bi-book-half"></i>
                         </div>
                         <p class="mb-0 apps-name">Story</p>
                        </div>
                      </a>
                    </div>
                   </div><!--end row-->
                </div>
              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">Skodash</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
              <a href="{{ url('/dashboard') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>

                <a href="{{ url('/adminroom') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Rooms</div>
                 </a>

                  <a href="{{ url('/bookinglist') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Room Booking</div>
                 </a>

                 <a href="{{ url('/blogscategory') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Blog category</div>
                 </a>

                 <a href="{{ url('/adminblogs') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Blog</div>
                 </a>

                 <a href="{{ url('/setting') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Setting</div>
                 </a>
                 

                   <a href="{{ url('/enquery') }}" class="">
                <div class="parent-icon"><i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Enquery</div>
                 </a>
               
            </li>
         
            </li>
              </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->