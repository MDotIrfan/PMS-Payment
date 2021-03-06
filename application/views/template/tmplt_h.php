<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0003364c64.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <title>STAR Project Management System</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ad003c">
        <div class="container-fluid ml-auto">
          <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color: white; font-weight: bold">PMS STAR</a>
          </div>
          <div class="icon ml-auto">
            <h5>
                <i class="fa fa-bell mr-3" aria-hidden="true" data-toggle="tooltip" title="Notification"></i>
                <i class="fa fa-envelope mr-3" aria-hidden="true" data-toggle="tooltip" title="Inbox Messages"></i>
            </h5>
        </div>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false" style="color:white"> 
                  Welcome, <?php if($level['level']=='fl' || $level['level']=='pm' || $level['level']=='finance') {echo $user['nama'];} else {echo $level['username'];}?> <b class="caret"></b>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?php if($level['level']=='fl'){echo base_url('/fl/profile');}else if($level['level']=='pm'){echo base_url('/pm/profile');} else if($level['level']=='finance'){echo base_url('/finance/profile');}?>"><i class="fa fa-user mx"></i>Profile</a>
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
                <?php if($level['level']=='fl'){ ?>
                <a href="<?php echo base_url();?>fl/" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Task</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="<?php echo base_url(); ?>fl/sedangdikerjakan" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Sedang Dikerjakan</span>
                    </a>
                    <a href="<?php echo base_url(); ?>fl/menunggupo" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Menunggu PO</span>
                    </a>
                    <a href="<?php echo base_url(); ?>fl/siapinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Siap Invoice</span>
                    </a>
                    <a href="<?php echo base_url(); ?>fl/sudahinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Sudah di Invoice</span>
                    </a>
                    <a href="<?php echo base_url(); ?>fl/selesaipembayaran" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Selesai Pembayaran</span>
                    </a>
                </div>
                <a href="<?php echo base_url(); ?>fl/laporan" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Laporan</span>
                    </div>
                </a>
                <?php } ?>
                <?php if($level['level']=='pm'){ ?>
                <a href="<?php echo base_url(); ?>pm" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Task</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="<?php echo base_url(); ?>pm/sedangdikerjakan" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Sedang Dikerjakan</span>
                    </a>
                    <a href="<?php echo base_url(); ?>pm/menunggupo" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Menunggu PO</span>
                    </a>
                    <a href="<?php echo base_url(); ?>pm/siapinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Siap Invoice</span>
                    </a>
                    <a href="<?php echo base_url(); ?>pm/sudahinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Sudah di Invoice</span>
                    </a>
                    <a href="<?php echo base_url(); ?>pm/selesaipembayaran" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Selesai Pembayaran</span>
                    </a>
                </div>
                <a href="<?php echo base_url(); ?>pm/laporan" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Laporan</span>
                    </div>
                </a>
                <?php } ?>
                <?php if($level['level']=='admin'){ ?>
                <a href="<?php echo base_url(); ?>admin" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Master Data</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="<?php echo base_url(); ?>admin/finance" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Finance</span>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/freelance" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Freelance</span>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/pekerjaan" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Pekerjaan</span>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/pm" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Project Manager</span>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/user" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">User</span>
                    </a>
                </div>
                <a href="<?php echo base_url(); ?>admin/laporan" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Laporan</span>
                    </div>
                </a>
                <?php } ?>
                <?php if($level['level']=='finance'){ ?>
                <a href="<?php echo base_url(); ?>finance" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                    </div>
                </a>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Files</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="<?php echo base_url(); ?>finance/listpo" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">PO</span>
                    </a>
                    <a href="<?php echo base_url(); ?>finance/listinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Invoice</span>
                    </a>
                </div>
                <a href="<?php echo base_url(); ?>finance/laporan" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-file fa-fw mr-3"></span>
                        <span class="menu-collapsed">Laporan</span>
                    </div>
                </a>
                <!-- <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-tasks fa-fw mr-3"></span>
                        <span class="menu-collapsed">Task</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="<?php echo base_url(); ?>finance/sudahinvoice" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Sudah Invoice</span>
                    </a>
                    <a href="<?php echo base_url(); ?>finance/selesaipembayaran" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Selesai Pembayaran</span>
                    </a>
                </div> -->
                <?php } ?>          
            </ul>
        </div> 
    <!-- End Sidebar -->
