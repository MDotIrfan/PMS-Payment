<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0003364c64.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>STAR Project Management System</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">PMS STAR</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false"> 
                  Welcome, <?php echo $user['nama']?> <b class="caret"></b>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fa fa-user mx"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i>Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('welcome/logout') ?>"><i class="fa fa-sign-out"></i>Sign Out</a>
              </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Akhir Nav Bar -->

    

    <!-- Start Sidebar -->
    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Charts</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Reports</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Tables</span>
                    </a>
                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Profile</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Settings</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Password</span>
                    </a>
                </div>            
              
            </ul>
        </div> 
    <!-- End Sidebar -->
