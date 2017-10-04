<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Portfolio</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <?php
         echo link_tag('public/adminLTE/css/bootstrap.min.css');
         echo link_tag('public/adminLTE/css/AdminLTE.min.css');
         echo link_tag('public/adminLTE/css/skins/skin-blue.min.css');
         echo link_tag('public/adminLTE/css/datatables/dataTables.bootstrap.css');
         echo link_tag('public/adminLTE/plugins/datepicker/datepicker3.css');
         foreach ($CSSFileNames as $CSSFileName) {
              echo link_tag($CSSFileName);
         }
      ?>
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
         <!-- Logo -->
         <a href="<?php echo site_url('Overview/index') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>OF</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Portf</b>olio</span>
         </a>
         <!-- Header Navbar -->
         <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                     <!-- Menu Toggle Button -->
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo base_url();?>public/adminLTE/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">
                        <?php echo $_SESSION['username']; ?>
                        </span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                           <img src="<?php echo base_url();?>public/adminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                           <p>
                              <?php echo $_SESSION['username']; ?> - Web Developer
                              <small>Member since July. 1908</small>
                           </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           <div class="pull-left">
                              <a href="<?php echo site_url('userInfo/index');?>" class="btn btn-default btn-flat">Profile</a>
                           </div>
                           <div class="pull-right">
                              <a href="<?php echo site_url('Login/userLogout');?>" id="UserLogout" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="<?php echo base_url();?>public/adminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p>
                  <?php echo $_SESSION['username']; ?>
                  </p>
                  <!-- Status -->
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
               <div class="input-group">
                  <input autocomplete="off" type="text" name="searchPerson" class="form-control" placeholder="Search student...">
                  <span class="input-group-btn">
                      <button type="submit" id="search-btn" class="btn btn-flat">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
               </div>
               <div id="dropdown-content">
               </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              <li class="header">Menu</li>
              <?php if ($this->session->auth == 'admin') { ?>  <!-- if a admin is loged in show : -->
                <li><a href="<?php echo site_url('Overview/index') ?>"><i class="fa fa-link"></i><span>Overview</span></a></li>
                <li><a href="<?php echo site_url('Upload/index') ?>"><i class="fa fa-link"></i><span>Upload</span></a></li> 
                <li class="treeview">
                <a href="#"><i class="fa fa-share"></i><span>Files</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                  <ul class="treeview-menu">
                   <li><a href="<?php echo site_url('Files/index') ?>"><i class="fa fa-circle-o"></i><span>Overview-Files</span></a></li>
                   <li><a href="<?php echo site_url('Files/FileHistory') ?>"><i class="fa fa-circle-o"></i><span>FileHistory</span></a></li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url('Assignments/index') ?>"><i class="fa fa-link"></i> <span>Assignments (docent)</span></a></li>
                <li><a href="<?php echo site_url('questionnaires/index') ?>"><i class="fa fa-link"></i> <span>Assignments Students</span></a></li>
                <li><a href="<?php echo site_url('Assignments/handedInSubjects') ?>"><i class="fa fa-link"></i> <span>handedInSubjects</span></a></li>
              <?php } else { ?> <!-- if a normal user is loged in show : -->
                <li><a href="<?php echo site_url('questionnaires/index') ?>"><i class="fa fa-link"></i> <span>Assignments Students</span></a></li>    
              <?php } ?>       
            </ul>
            <!-- /.sidebar-menu -->
         </section>
         <!-- /.sidebar -->
      </aside>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Create the tabs -->
         <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
               <h3 class="control-sidebar-heading">Recent Activity</h3>
               <ul class="control-sidebar-menu">
                  <li>
                     <a href="javascript:;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                           <h4 class="control-sidebar-subheading">Feyenoord's Birthday</h4>
                           <p>Will be 109 on July 19th</p>
                        </div>
                     </a>
                  </li>
               </ul>
               <!-- /.control-sidebar-menu -->
            </div>
            <!-- /.tab-pane -->
         </div>
      </aside>
      <!-- /.control-sidebar -->